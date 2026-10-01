<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producte;
use App\Models\Categoria;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create(['nom' => 'Anells']);
        Categoria::create(['nom' => 'Collarets']);
        Categoria::create(['nom' => 'Arracades']);
        Categoria::create(['nom' => 'Braçalets']);
        Categoria::create(['nom' => 'Penjolls']);

       Producte::create([
    'nom' => 'Anell de Diamants',
    'descripcio' => 'Anell elegant amb diamant central en or blanc 18k',
    'preu' => 1250.00,
    'stock' => 5,
    'categoria_id' => 1,
    'foto' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Diamond_ring.jpg/640px-Diamond_ring.jpg',
]);

Producte::create([
    'nom' => 'Collar de Perles',
    'descripcio' => 'Collar clàssic de perles naturals cultivades',
    'preu' => 320.00,
    'stock' => 8,
    'categoria_id' => 2,
    'foto' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Pearl_necklace.jpg/640px-Pearl_necklace.jpg',
]);

Producte::create([
    'nom' => 'Arracades de Safir',
    'descripcio' => 'Arracades amb safirs naturals blaus en or blanc 18k',
    'preu' => 890.00,
    'stock' => 3,
    'categoria_id' => 3,
    'foto' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/Sapphire_earrings.jpg/640px-Sapphire_earrings.jpg',
]);
    }
}