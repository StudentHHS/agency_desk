<?php
namespace App\Command\Financial;

use App\Entity\Financial\Invoice;
use App\Entity\Financial\InvoiceLine;
use App\Entity\Financial\InvoiceState;
use App\Entity\Project\ActualWork;
use App\Entity\User\Customer;
use App\Entity\User\CustomerAddress;
use App\Entity\User\Employee;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Gedmo\Sluggable\Util\Urlizer;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;


class GenerateInvoiceCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('financial:generate:invoices')
            ->setDescription('Generates invoices');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Set locale for correct month names
        setlocale(LC_TIME, 'nl_NL');

        // Get current date
        $oToday = new \DateTime('now');

        /** @var EntityManager $oEm */
        $oEm = $this->getContainer()->get('doctrine')->getEntityManager();

        // ====== Regular maintenance invoice (1st Monday of the month) ======

        if($oToday->format('j') == 1)
        {
            $oLastMonth = new \DateTime('-1 month');

            // Loop through customers
            $aCustomers = $oEm->getRepository('AgencyDeskDBBundle:User\Customer')->findAll();

            /** @var Customer $oCustomer */
            foreach ($aCustomers as $oCustomer)
            {
                // Make sure this customer has no credit hours
                if ($oCustomer->getCreditcards()->count() == 0)
                {
                    // Get actual work from past month
                    $aActualWork = $oEm->getRepository('AgencyDeskDBBundle:Project\ActualWork')->getWorkLogByCustomerMonth($oCustomer->getId(), $oLastMonth->format('n'));

                    // Make sure there are work hours to be invoiced
                    if (sizeof($aActualWork) > 0)
                    {
                        $iLastInvoiceNr = 0;
                        $aInvoices = $oEm->getRepository('AgencyDeskDBBundle:Financial\Invoice')->findBy(array(), array('created' => 'DESC'), 100);

                        /** @var Invoice $oExistingInvoice */
                        foreach($aInvoices as $oExistingInvoice)
                        {
                            if($oExistingInvoice->getInvoiceNr() > $iLastInvoiceNr)
                            {
                                $iLastInvoiceNr = $oExistingInvoice->getInvoiceNr();
                            }
                        }

                        // Create the invoice
                        $oInvoice = new Invoice();
                        $oInvoice->setInvoiceNr(($iLastInvoiceNr + 1));
                        $oInvoice->setCustomer($oCustomer);
                        $oInvoice->setDate(new \DateTime('now'));
                        $oInvoice->setState($oEm->getRepository('AgencyDeskDBBundle:Financial\InvoiceState')->findOneBy(array('state' => 'new')));
                        $oEm->persist($oInvoice);

                        // Calculate the total invoice
                        $dInvoiceTotal = 0.00;
                        $iTotalSeconds = 0;
                        $dHourlyRate = (null !== $oCustomer->getHourlyRate()) ? $oCustomer->getHourlyRate() : 75;

                        /** @var ActualWork $oActualWork */
                        foreach ($aActualWork as $oActualWork)
                        {
                            if (null !== $oActualWork->getBegin() && null !== $oActualWork->getEnd() && null === $oActualWork->getInvoice())
                            {
                                $oInterval = $oActualWork->getBegin()->diff($oActualWork->getEnd());
                                $iHours = $oInterval->h;
                                $iMinutes = $oInterval->i;
                                $iSeconds = $oInterval->s;

                                $iTotalSeconds += ($iSeconds + ($iMinutes * 60) + ($iHours * 3600));
                                $dInvoiceTotal += ((($iSeconds + ($iMinutes * 60) + ($iHours * 3600)) / 3600) * $dHourlyRate);

                                $oActualWork->setInvoice($oInvoice);
                            }
                        }

                        // Determine period
                        $sMonth = date('F', mktime(0, 0, 0, $oLastMonth->format('n')));
                        $iYear = $oLastMonth->format('Y');
                        $iLastDay = cal_days_in_month(CAL_GREGORIAN, $oLastMonth->format('n'), $iYear);

                        $oInvoiceLine = new InvoiceLine();
                        $oInvoiceLine->setInvoice($oInvoice);
                        $oInvoiceLine->setQuantity(1);
                        $oInvoiceLine->setDescription('Onderhoudswerkzaamheden in de periode 1 ' . $sMonth . ' ' . $iYear . ' t/m ' . $iLastDay . ' ' . $sMonth . ' ' . $iYear . '<br />' . $this->sec2hms($iTotalSeconds) . ' uur &agrave; &euro; ' . number_format($dHourlyRate, 2, ',', '.') . ' (zie bijlage voor specificatie)');
                        $oInvoiceLine->setPrice($dInvoiceTotal);
                        $oInvoiceLine->setVatTariff($oEm->getRepository('AgencyDeskDBBundle:System\VatTariff')->findOneBy(array('title' => 'BTW-hoog')));
                        $oEm->persist($oInvoiceLine);

                        $oEm->flush();

                    }
                }
            }
        }

        // ====== @TODO Upgrade credit card (whenever credit becomes negative) ======

        // ====== @TODO Domain registration renewal invoice (March 1st, June 1st, September 1st, December 1st) ======

        // ====== @TODO Service renewal invoice (when service renewal date < 60 days) ======

    }

    protected function sec2hms ($sec, $padHours = true)
    {
        $hms = "";
        $hours = intval(intval($sec) / 3600);
        $hms .= ($padHours)
              ? str_pad($hours, 2, "0", STR_PAD_LEFT). ':'
              : $hours. ':';
        $minutes = intval(($sec / 60) % 60);
        $hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT);
        return $hms;
    }

}


