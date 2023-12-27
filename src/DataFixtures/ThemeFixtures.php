<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ThemeFixtures extends Fixture
{
    public const AMOURPASSION = 'THEME_AMOURPASSION';
    public const NATUREPAYSAGE = 'THEME_NATUREPAYSAGE';
    public const MELANCOLIESOLITUDE = 'THEME_MELANCOLIESOLITUDE';
    public const VOYAGEDECOUVERTE = 'THEME_VOYAGEDECOUVERTE';
    public const REVEIMAGINAIRE = 'THEME_REVEIMAGINAIRE';

    public const THEMES = [
        self::AMOURPASSION => [
            'nom' => 'Amour et passion',
        ],
        self::NATUREPAYSAGE => [
            'nom' => 'Nature et paysages',
        ],
        self::MELANCOLIESOLITUDE => [
            'nom' => 'Mélancolie et solitude',
        ],
        self::VOYAGEDECOUVERTE => [
            'nom' => 'Voyages et découvertes',
        ],
        self::REVEIMAGINAIRE => [
            'nom' => 'Rêves et imaginaire',
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach($this::THEMES as $code => $attributes)
        {
            $theme = new Theme();
            $theme->setNomTheme($attributes['nom']);

            $manager->persist($theme);

            $this->addReference($code, $theme);
        }

        $manager->flush();
    }
}