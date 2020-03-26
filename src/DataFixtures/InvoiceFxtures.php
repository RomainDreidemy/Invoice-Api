<?php

namespace App\DataFixtures;

use App\Entity\Invoice;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class InvoiceFxtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $invoice = (new Invoice())
            ->setName("Facture pour EURO CCVP")
            ->setDateCreated(new \DateTime('2020-02-29'))
            ->setDateModified(new \DateTime('2020-03-01'))
            ->setStatus(1)
            ->setUser($manager->getRepository(User::class)->findOneBy(['email' => 'dreidemyromain@gmail.com']))
        ;

        $manager->persist($invoice);
        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [
            UserFixtures::class
        ];
    }
}
