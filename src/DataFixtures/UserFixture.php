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

        //CREATING USERS//
        $this->createMany(1, 'users', function($i) {
            $user = new User();
            $user->setEmail(sprintf('user%d@dsj.nl', $i));
            $user->setFirstName($this->faker->firstName);
            $user->setLastname($this->faker->lastName);
            $user->getSalt();

            //CHANGE ROLE FOR USER(S)//
            $user->setRoles(['ROLE_USER']);

            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'user123'
            ));

            $user->setNewsletter(true);
            $user->setActive(true);
            $user->getCreated();
            $user->getUpdated();
            $user->setGender('m');

            return $user;
        });

        //CREATING ADMINS//
        $this->createMany(1, 'admins', function($i) {
            $user1 = new User();
            $user1->setEmail(sprintf('admin%d@dsj.nl', $i));
            $user1->setFirstName($this->faker->firstName);
            $user1->setLastname($this->faker->lastName);
            $user1->getSalt();
            //CHANGE ROLE FOR ADMIN(S)//
            $user1->setRoles(['ROLE_ADMIN']);
            $user1->setPassword($this->passwordEncoder->encodePassword(
                $user1,
                'admin123'
            ));
            $user1->setNewsletter(true);
            $user1->setActive(true);
            $user1->getCreated();
            $user1->getUpdated();
            $user1->setGender('m');

            return $user1;
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

