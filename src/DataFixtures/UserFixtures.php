<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encode;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encode = $encoder;
    }

    /**
     * @param ObjectManager $manager
     * @param PasswordEncoderInterface $passwordEncoder
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user
            ->setEmail("dreidemyromain@gmail.com")
            ->setPassword($this->encode->encodePassword($user, "roro"))
        ;

        $manager->persist($user);

        $manager->flush();
    }
}
