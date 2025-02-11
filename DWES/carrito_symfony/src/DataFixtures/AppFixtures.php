<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoria1 = new Categoria();
        $categoria1->setNombre('Componentes');
        $categoria1->setDescripcion('Componentes de hardware para ordenadores');
        $manager->persist($categoria1);

        $categoria2 = new Categoria();
        $categoria2->setNombre('Periféricos');
        $categoria2->setDescripcion('Dispositivos periféricos para ordenadores');
        $manager->persist($categoria2);

        $categoria3 = new Categoria();
        $categoria3->setNombre('Móviles');
        $categoria3->setDescripcion('Smartphones, tablets y accesorios');
        $manager->persist($categoria3);

        $categoria4 = new Categoria();
        $categoria4->setNombre('Electrónica');
        $categoria4->setDescripcion('Electrodomésticos y dispositivos electrónicos');
        $manager->persist($categoria4);

        $categoria5 = new Categoria();
        $categoria5->setNombre('Gaming');
        $categoria5->setDescripcion('Productos para jugadores profesionales y amateurs');
        $manager->persist($categoria5);

        $categoria6 = new Categoria();
        $categoria6->setNombre('Accesorios');
        $categoria6->setDescripcion('Accesorios variados para tecnología y electrónica');
        $manager->persist($categoria6);

        $manager->flush();

        $this->addReference('categoria1', $categoria1);
        $this->addReference('categoria2', $categoria2);
        $this->addReference('categoria3', $categoria3);
        $this->addReference('categoria4', $categoria4);
        $this->addReference('categoria5', $categoria5);
        $this->addReference('categoria6', $categoria6);

    }
}
