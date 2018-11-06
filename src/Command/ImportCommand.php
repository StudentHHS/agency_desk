<?php
namespace App\Command;

use App\Entity\User\Customer;
use App\Entity\User\CustomerAddress;
use App\Entity\User\Employee;
use Doctrine\Common\Persistence\Mapping\MappingException;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
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


class ImportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('import:olddb')
            ->setDescription('Imports data from old database');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var EntityManager $oEmOld  */
        $oEmOld = $this->getContainer()->get('doctrine')->getManager('old');
        $oOldConnection = $oEmOld->getConnection();
        $oOldConnection->getConfiguration()->setSQLLogger(null);

        /** @var EntityManager $oEm  */
        $oEm = $this->getContainer()->get('doctrine')->getManager();
        $oConnection = $oEm->getConnection();
        $oConnection->getConfiguration()->setSQLLogger(null);

        $aEntities = array(
            'customer',
        );

        $output->writeln("Import start");

        if (in_array('customer', $aEntities)) {
            $output->writeln("Starting import for entity CUSTOMER");

            try {
                $query = $oOldConnection->prepare("SELECT * FROM `client`");
            } catch (DBALException $e) {
            }
            $query->execute();
            $aResults = $query->fetchAll();

            foreach ($aResults as $i => $aResult) {
                $output->writeln("CUSTOMER " . $i);
                /** @var Customer $oCustomer */
                $oCustomer = $oEm->getRepository("App:User\Customer")->findOneByTitle($aResult['client_name']);

                if ($oCustomer == NULL) {
                    try {
                        $oStatement = $oConnection->prepare("INSERT INTO `customer` (
                            `name`,
                            `taxnumber`,
                            `old_id`,
                            `active`,
                            `created`,
                            `updated`
                            ) VALUES (:v1, :v2, :v3, :v4, :v5, :v6)");
                    } catch (DBALException $e) {
                    }

                    $oStatement->bindValue('v1', $aResult['client_name']);
                    $oStatement->bindValue('v2', $aResult['vat_number']);
                    $oStatement->bindValue('v3', $aResult['id']);
                    $oStatement->bindValue('v4', 1);
                    $oStatement->bindValue('v5', date('Y-m-d H:i:s'));
                    $oStatement->bindValue('v6', date('Y-m-d H:i:s'));
                    $oStatement->execute();

                    $customer_id = $oConnection->lastInsertId();
                } else {
                    $customer_id = $oCustomer->getId();

                    try {
                        $oStatement = $oConnection->prepare(
                            "UPDATE `customer` SET
                                `name` = :v1,
                                `active` = :v2,
                            WHERE `id` = '" . $oCustomer->getId() . "'"
                        );
                    } catch (DBALException $e) {
                    }
                    $oStatement->bindValue('v1', $aResult['client_name']);
                    $oStatement->bindValue('v2', 1);

                    $oStatement = NULL;
                    $oCustomer = NULL;
                    try {
                        $oEm->clear();
                    } catch (MappingException $e) {
                    }
                }

//                $output->writeln("generating address for customer " . $i);
//
//                foreach(array('billing', 'shipping') as $sType)
//                {
//                    $oStatement = $oConnection->prepare("INSERT INTO `address` (
//                        `country_id`,
//                        `title`,
//                        `address`,
//                        `housenumber`,
//                        `zipcode`,
//                        `city`,
//                        `contact_email`,
//                        `contact_phone`,
//                        `updated`,
//                        `created`,
//                        `active`
//                        ) VALUES (
//                        :v2, :v3, :v8, :v9, :v11, :v13, :v14, :v15, :v18, :v19, :v20)");
//
//                    $sCountryCode = $oOldConnection->fetchColumn("SELECT `identifier` FROM `country` WHERE `id` = '" . $aResult[$sType.'_country_id'] . "'", array(1), 0);
//                    $oCountry = $oEm->getRepository('AgencyDeskDBBundle:System\Country')->findOneByCode($sCountryCode);
//                    $oStatement->bindValue('v2', ($oCountry !== null ? $oCountry->getId() : null));
//                    $oStatement->bindValue('v3', $aResult['client_name']);
//                    $oStatement->bindValue('v8', $aResult[$sType.'_street']);
//                    $oStatement->bindValue('v9', (empty($aResult[$sType.'_street_nr']) ? null : $aResult[$sType.'_street_nr']));
//                    $oStatement->bindValue('v11', $aResult[$sType.'_zipcode']);
//                    $oStatement->bindValue('v13', $aResult[$sType.'_city']);
//                    $oStatement->bindValue('v14', $aResult['email']);
//                    $oStatement->bindValue('v15', $aResult['telephone']);
//                    $oStatement->bindValue('v18', date('Y-m-d H:i:s'));
//                    $oStatement->bindValue('v19', date('Y-m-d H:i:s'));
//                    $oStatement->bindValue('v20', 1);
//                    $oStatement->execute();
//
//                    $address_id = $oConnection->lastInsertId();
//                    $oCustomerAddress = new CustomerAddress();
//                    $oCustomerAddress->setAddress($oEm->getRepository('AgencyDeskDBBundle:User\Address')->find($address_id));
//                    $oCustomerAddress->setCustomer($oEm->getRepository('AgencyDeskDBBundle:User\Customer')->find($customer_id));
//                    $oCustomerAddress->setType($oEm->getRepository('AgencyDeskDBBundle:User\AddressType')->findOneByType($sType));
//                    $oEm->persist($oCustomerAddress);
//                    $oEm->flush();
//
//                }


                try {
                    $query = $oOldConnection->prepare("SELECT * FROM `contact` WHERE `client_id` = '" . $aResult['id'] . "'");
                } catch (DBALException $e) {
                }
                $query->execute();
                $aContacts = $query->fetchAll();

                foreach($aContacts as $aContact)
                {
                    try {
                        $oStatement = $oConnection->prepare("INSERT INTO `user` (
                            `gender`,
                            `firstname`,
                            `prefix`,
                            `lastname`,
                            `email`,
                            `updated`,
                            `created`,
                            `active`,
                            `salt`,
                            `password`,
                            `newsletter_optin`
                            ) 
                            VALUES 
                            (
                            :v1, :v2, :v3, :v4, :v5, :v6, :v7, :v8, :v9, :v10, :v11
                        )");
                    } catch (DBALException $e) {
                    }

                    $oStatement->bindValue('v1', (!empty($aContact['gender']) ? $aContact['gender'] : 'm'));
                    $oStatement->bindValue('v2', $aContact['first_name']);
                    $oStatement->bindValue('v3', $aContact['last_name_prefix']);
                    $oStatement->bindValue('v4', $aContact['last_name']);
                    $oStatement->bindValue('v5', $aContact['email']);
                    $oStatement->bindValue('v6', date('Y-m-d H:i:s'));
                    $oStatement->bindValue('v7', date('Y-m-d H:i:s'));
                    $oStatement->bindValue('v8', 1);
                    $oStatement->bindValue('v9', sha1($aContact['id'].date('Y-m-d H:i:s')));
                    $oStatement->bindValue('v10', '');
                    $oStatement->bindValue('v11', 1);
                    $oStatement->execute();

                    $contact_id = $oConnection->lastInsertId();

                    $oEmployee = new Employee();
                    $oEmployee->setCustomer($oEm->getRepository('AgencyDeskDBBundle:User\Customer')->find($customer_id));
                    $oEmployee->setUser($oEm->getRepository('AgencyDeskDBBundle:User\User')->find($contact_id));
                    try {
                        $oEm->persist($oEmployee);
                    } catch (ORMException $e) {
                    }
                    try {
                        $oEm->flush();
                    } catch (OptimisticLockException $e) {
                    } catch (ORMException $e) {
                    }
                }


            }

            $output->writeln("END import for entity CUSTOMER");
        }
        try {
            $oEm->clear();
        } catch (MappingException $e) {
        }

    }
}

