<?php

namespace App\DataFixtures;

//use App\Entity\ApiToken;
use App\Entity\User\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function loadData(ObjectManager $manager)
    {
        // use ($manager) --> after function(..)

        $this->createMany(1, 'admins', function($i) {
            $user = new User();
            $user->setEmail(sprintf('admin%d@dsj.nl', $i));
            $user->setFirstName($this->faker->firstName);
            $user->setLastname($this->faker->lastName);
            $user->getSalt();

            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'admin123'
            ));

            $user->setNewsletter(true);
            $user->setActive(true);
            $user->getCreated();
            $user->getUpdated();
            $user->setGender('m');

            return $user;
        });

        $manager->flush();

//            if ($this->faker->boolean) {
//                $user->setTwitterUsername($this->faker->userName);
//            }
//
//            $user->setPassword($this->passwordEncoder->encodePassword(
//                $user,
//                'engage'
//            ));
//
//            $apiToken1 = new ApiToken($user);
//            $apiToken2 = new ApiToken($user);
//            $manager->persist($apiToken1);
//            $manager->persist($apiToken2);
//
//            return $user;
//        });
//
//        $this->createMany(3, 'admin_users', function($i) {
//            $user = new User();
//            $user->setEmail(sprintf('admin%d@thespacebar.com', $i));
//            $user->setFirstName($this->faker->firstName);
//            $user->setRoles(['ROLE_ADMIN']);
//
//            $user->setPassword($this->passwordEncoder->encodePassword(
//                $user,
//                'engage'
//            ));
//
//            return $user;
//        });


    }
}

