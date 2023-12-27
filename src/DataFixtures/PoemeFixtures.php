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
                'nom_auteur' => 'Auteur1',
                'prenom_auteur' => 'Prénom1',
            ],
            [
                'titre' => 'Éclats de lune',
                'contenu' => 'La lune éclaire la nuit d\'une lueur mystique, révélant des secrets enfouis dans l\'ombre.',
                'nom_auteur' => 'Auteur2',
                'prenom_auteur' => '',
            ],
            [
                'titre' => 'La danse des étoiles',
                'contenu' => 'Les étoiles dansent dans le ciel nocturne, éclairant la voie des rêves.',
                'nom_auteur' => 'Auteur3',
                'prenom_auteur' => 'Prénom1',
            ],
            [
                'titre' => 'Le murmure du ruisseau',
                'contenu' => 'Le ruisseau chuchote des secrets entre les pierres, portant des mystères anciens.',
                'nom_auteur' => 'Auteur4',
                'prenom_auteur' => 'Prénom2',
            ],
            [
                'titre' => 'Les vagues de l\'océan',
                'contenu' => 'Les vagues de l\'océan chantent une mélodie infinie, berçant les rêves des navigateurs.',
                'nom_auteur' => 'Auteur5',
                'prenom_auteur' => '',
            ],
            [
                'titre' => 'Le jardin secret',
                'contenu' => 'Au fond du jardin secret, les fleurs racontent des histoires oubliées par le temps.',
                'nom_auteur' => 'Auteur6',
                'prenom_auteur' => '',
            ],
            [
                'titre' => 'L\'aube du jour',
                'contenu' => 'L\'aube éclaire le ciel d\'une douce lumière, annonçant un nouveau commencement.',
                'nom_auteur' => 'Auteur7',
                'prenom_auteur' => 'Prénom3',
            ],
            [
                'titre' => 'Les ailes du silence',
                'contenu' => 'Dans le silence, les pensées prennent leur envol, portées par des ailes invisibles.',
                'nom_auteur' => 'Auteur8',
                'prenom_auteur' => 'Prénom3',
            ],
            [
                'titre' => 'La mer infinie',
                'contenu' => 'La mer s\'étend à l\'infini, cachant des histoires inexplorées au fond de ses vagues.',
                'nom_auteur' => 'Auteur9',
                'prenom_auteur' => 'Prénom4',
            ],
            [
                'titre' => 'Le jardin des souvenirs',
                'contenu' => 'Au cœur du jardin des souvenirs, les fleurs du passé épanouissent des moments précieux.',
                'nom_auteur' => 'Auteur10',
                'prenom_auteur' => '',
            ],
        ];

        foreach($dataPoeme as $data)
        {
            $poeme = new Poeme();
            $poeme->setTitre($data['titre']);
            $poeme->setContenu($data['contenu']);
            $poeme->setNomAuteur($data['nom_auteur']);
            $poeme->setPrenomAuteur($data['prenom_auteur']);

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