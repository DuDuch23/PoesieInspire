<?php

namespace App\DataFixtures;

use App\Entity\Poeme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PoemeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $dataPoeme = [
            [
                'titre' => 'Le chant du vent',
                'contenu' => 'Le vent murmure doucement à travers les arbres, portant avec lui des histoires anciennes.',
                'nomAuteur' => 'Auteur1',
                'prenomAuteur' => 'Prénom1',
            ],
            [
                'titre' => 'Éclats de lune',
                'contenu' => 'La lune éclaire la nuit d\'une lueur mystique, révélant des secrets enfouis dans l\'ombre.',
                'nomAuteur' => 'Auteur2',
                'prenomAuteur' => '',
            ],
            [
                'titre' => 'La danse des étoiles',
                'contenu' => 'Les étoiles dansent dans le ciel nocturne, éclairant la voie des rêves.',
                'nomAuteur' => 'Auteur3',
                'prenomAuteur' => 'Prénom1',
            ],
            [
                'titre' => 'Le murmure du ruisseau',
                'contenu' => 'Le ruisseau chuchote des secrets entre les pierres, portant des mystères anciens.',
                'nomAuteur' => 'Auteur4',
                'prenomAuteur' => 'Prénom2',
            ],
            [
                'titre' => 'Les vagues de l\'océan',
                'contenu' => 'Les vagues de l\'océan chantent une mélodie infinie, berçant les rêves des navigateurs.',
                'nomAuteur' => 'Auteur5',
                'prenomAuteur' => '',
            ],
            [
                'titre' => 'Le jardin secret',
                'contenu' => 'Au fond du jardin secret, les fleurs racontent des histoires oubliées par le temps.',
                'nomAuteur' => 'Auteur6',
                'prenomAuteur' => '',
            ],
            [
                'titre' => 'L\'aube du jour',
                'contenu' => 'L\'aube éclaire le ciel d\'une douce lumière, annonçant un nouveau commencement.',
                'nomAuteur' => 'Auteur7',
                'prenomAuteur' => 'Prénom3',
            ],
            [
                'titre' => 'Les ailes du silence',
                'contenu' => 'Dans le silence, les pensées prennent leur envol, portées par des ailes invisibles.',
                'nomAuteur' => 'Auteur8',
                'prenomAuteur' => 'Prénom3',
            ],
            [
                'titre' => 'La mer infinie',
                'contenu' => 'La mer s\'étend à l\'infini, cachant des histoires inexplorées au fond de ses vagues.',
                'nomAuteur' => 'Auteur9',
                'prenomAuteur' => 'Prénom4',
            ],
            [
                'titre' => 'Le jardin des souvenirs',
                'contenu' => 'Au cœur du jardin des souvenirs, les fleurs du passé épanouissent des moments précieux.',
                'nomAuteur' => 'Auteur10',
                'prenomAuteur' => '',
            ],
        ];

        foreach($dataPoeme as $data)
        {
            $poeme = new Poeme();
            $poeme->setTitre($data['titre']);
            $poeme->setContenu($data['contenu']);
            $poeme->setNomAuteur($data['nomAuteur']);
            $poeme->setPrenomAuteur($data['prenomAuteur']);

            $themeReference = array_rand(ThemeFixtures::THEMES);
            $poeme->setTheme($this->getReference($themeReference));

            $manager->persist($poeme);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return[
            ThemeFixtures::class,
        ];
    }
}