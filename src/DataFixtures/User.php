<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class User extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new \App\Entity\User();
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEmail('flo@hotmail.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'toto'
        ));
        $manager->persist($user);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            User::class,
        ];
    }

}
