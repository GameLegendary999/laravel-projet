<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'name' => 'Cyberpunk 2077',
                'description' => 'Un RPG d\'action et d\'aventure en monde ouvert se déroulant dans Night City, une mégapole futuriste obsédée par le pouvoir, la beauté et les modifications corporelles.',
                'price' => 59.99,
                'genre' => 'RPG',
                'image' => null
            ],
            [
                'name' => 'The Witcher 3: Wild Hunt',
                'description' => 'Incarnez Geralt de Riv, un chasseur de monstres professionnel à la recherche de l\'enfant de la prophétie dans un vaste monde ouvert riche en marchands, en villains et en dangers.',
                'price' => 39.99,
                'genre' => 'RPG',
                'image' => null
            ],
            [
                'name' => 'Elden Ring',
                'description' => 'Un jeu d\'action-RPG développé par FromSoftware. Explorez un vaste monde fantastique créé en collaboration avec George R.R. Martin.',
                'price' => 49.99,
                'genre' => 'Action RPG',
                'image' => null
            ],
            [
                'name' => 'Counter-Strike 2',
                'description' => 'Le jeu de tir tactique le plus populaire au monde, maintenant avec une technologie améliorée et des graphismes de nouvelle génération.',
                'price' => 0.00,
                'genre' => 'FPS',
                'image' => null
            ],
            [
                'name' => 'Baldur\'s Gate 3',
                'description' => 'Rassemblez votre groupe et retournez dans les Royaumes Oubliés pour une histoire d\'amitié, de trahison, de sacrifice, de survie et de la séduction du pouvoir absolu.',
                'price' => 59.99,
                'genre' => 'RPG',
                'image' => null
            ],
            [
                'name' => 'Hogwarts Legacy',
                'description' => 'Découvrez votre héritage et décidez du sort du monde des sorciers. Votre héritage est ce que vous en faites.',
                'price' => 44.99,
                'genre' => 'Action Adventure',
                'image' => null
            ],
            [
                'name' => 'Grand Theft Auto V',
                'description' => 'Quand un jeune dealer, un braqueur à la retraite et un psychopathe terrifiant se retrouvent mêlés aux pires éléments du monde criminel...',
                'price' => 29.99,
                'genre' => 'Action',
                'image' => null
            ],
            [
                'name' => 'Red Dead Redemption 2',
                'description' => 'L\'Amérique, 1899. L\'ère des hors-la-loi et des pistoleros touche à sa fin. Incarnez Arthur Morgan et la bande de Dutch van der Linde.',
                'price' => 39.99,
                'genre' => 'Action Adventure',
                'image' => null
            ]
        ];

        foreach ($games as $gameData) {
            Game::create($gameData);
        }
    }
}
