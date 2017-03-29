<?php

/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  Testing
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Lex\TreeBundle\Entity\Tree;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Load Tree test data in the database.
 *
 * @category LoadDataFixture
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 *
 * @codeCoverageIgnore
 */
class LoadTreeData extends AbstractFixture implements ContainerAwareInterface, FixtureInterface, OrderedFixtureInterface
{
    /**
     * The Container.
     *
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * Load dialogues.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        //transport;1;1;44
        $transport = new Tree();
        $transport->setName('transport');
        $transport->setLevel(1);
        $transport->setLeft(1);
        $transport->setRight(44);
        $manager->persist($transport);


        //aérien;2;2;21
        $aerien = new Tree();
        $aerien->setName('aérien');
        $aerien->setLevel(2);
        $aerien->setLeft(2);
        $aerien->setRight(21);
        $manager->persist($aerien);

        //planeur;3;3;4
        $planeur = new Tree();
        $planeur->setName('planeur');
        $planeur->setLevel(3);
        $planeur->setLeft(3);
        $planeur->setRight(4);
        $manager->persist($planeur);

        //parachute;3;5;6
        $parachute = new Tree();
        $parachute->setName('parachute');
        $parachute->setLevel(3);
        $parachute->setLeft(5);
        $parachute->setRight(6);
        $manager->persist($parachute);

        //hélicoptère;3;7;8
        $helicoptere = new Tree();
        $helicoptere->setName('hélicoptère');
        $helicoptere->setLevel(3);
        $helicoptere->setLeft(7);
        $helicoptere->setRight(8);
        $manager->persist($helicoptere);

        //fusée;3;9;10
        $fusee = new Tree();
        $fusee->setName('fusée');
        $fusee->setLevel(3);
        $fusee->setLeft(9);
        $fusee->setRight(10);
        $manager->persist($fusee);

        //ulm;3;11;12
        $ulm = new Tree();
        $ulm->setName('ulm');
        $ulm->setLevel(3);
        $ulm->setLeft(11);
        $ulm->setRight(12);
        $manager->persist($ulm);

        //avion;3;13;20
        $avion = new Tree();
        $avion->setName('avion');
        $avion->setLevel(3);
        $avion->setLeft(13);
        $avion->setRight(20);
        $manager->persist($avion);

        //militaire;4;14;15
        $militaire = new Tree();
        $militaire->setName('militaire');
        $militaire->setLevel(4);
        $militaire->setLeft(14);
        $militaire->setRight(15);
        $manager->persist($militaire);

        //tourisme;4;16;17
        $tourisme = new Tree();
        $tourisme->setName('tourisme');
        $tourisme->setLevel(4);
        $tourisme->setLeft(16);
        $tourisme->setRight(17);
        $manager->persist($tourisme);

        //civil;4;18;19
        $civil = new Tree();
        $civil->setName('civil');
        $civil->setLevel(4);
        $civil->setLeft(18);
        $civil->setRight(19);
        $manager->persist($civil);

        //terrestre;2;22;35
        $terrestre = new Tree();
        $terrestre->setName('terrestre');
        $terrestre->setLevel(2);
        $terrestre->setLeft(22);
        $terrestre->setRight(35);
        $manager->persist($terrestre);

        //vélo;3;23;24
        $velo = new Tree();
        $velo->setName('vélo');
        $velo->setLevel(3);
        $velo->setLeft(23);
        $velo->setRight(24);
        $manager->persist($velo);

        //voiture;3;25;26
        $voiture = new Tree();
        $voiture->setName('voiture');
        $voiture->setLevel(3);
        $voiture->setLeft(25);
        $voiture->setRight(26);
        $manager->persist($voiture);

        //camion;3;27;28
        $camion = new Tree();
        $camion->setName('camion');
        $camion->setLevel(3);
        $camion->setLeft(27);
        $camion->setRight(28);
        $manager->persist($camion);

        //moto;3;29;34
        $moto = new Tree();
        $moto->setName('moto');
        $moto->setLevel(3);
        $moto->setLeft(29);
        $moto->setRight(34);
        $manager->persist($moto);

        //side-car;4;30;31
        $sidecar = new Tree();
        $sidecar->setName('side-car');
        $sidecar->setLevel(4);
        $sidecar->setLeft(30);
        $sidecar->setRight(31);
        $manager->persist($sidecar);

        //trail;4;32;33
        $trail = new Tree();
        $trail->setName('trail');
        $trail->setLevel(4);
        $trail->setLeft(32);
        $trail->setRight(33);
        $manager->persist($trail);

        //marin;2;36;43
        $marin = new Tree();
        $marin->setName('marin');
        $marin->setLevel(2);
        $marin->setLeft(36);
        $marin->setRight(43);
        $manager->persist($marin);

        //planche;3;37;38
        $planche = new Tree();
        $planche->setName('planche à voile');
        $planche->setLevel(3);
        $planche->setLeft(37);
        $planche->setRight(38);
        $manager->persist($planche);

        //paquebot;3;39;40
        $paquebot = new Tree();
        $paquebot->setName('paquebot');
        $paquebot->setLevel(3);
        $paquebot->setLeft(39);
        $paquebot->setRight(40);
        $manager->persist($paquebot);

        //voilier;3;41;42
        $voilier = new Tree();
        $voilier->setName('voilier');
        $voilier->setLevel(3);
        $voilier->setLeft(41);
        $voilier->setRight(42);
        $manager->persist($voilier);
        
        $manager->flush();
    }

    /**
     * Order of these data to be load.
     *
     * @return int
     */
    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }

    /**
     * Set Container to retrieve Environment data.
     *
     * @param ContainerInterface $container Container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
