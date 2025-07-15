<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $pwdHasher;

    public function __construct(UserPasswordHasherInterface $pwdHasher)
    {
        $this->pwdHasher = $pwdHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_BE');

        for($i = 0; $i < 10; $i++){
            $user = new User([
                "firstName" => $faker->firstName(),
                "lastName" => $faker->lastName(),
                "birthday" => $faker->dateTimeBetween('-65 years', '-18 years'),
                "email" => "user".$i. "@mail.com"
            ]);

            $pwdHashed = $this->pwdHasher->hashPassword($user,'Password');
            $user->setPassword($pwdHashed);
            
            $manager->persist($user);
        }

        for($i = 10; $i < 20; $i++){
            $admin = new User([
                "firstName" => $faker->firstName(),
                "lastName" => $faker->lastName(),
                "birthday" => $faker->dateTimeBetween('-65 years', '-18 years'),
                "email" => "admin".$i. "@mail.com"
            ]);

            $pwdHashed = $this->pwdHasher->hashPassword($admin,'Password');
            $admin->setPassword($pwdHashed);

            $manager->persist($admin);
        }

        $manager->flush();
    }
}
