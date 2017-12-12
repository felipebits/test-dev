<?php

use Illuminate\Database\Seeder;
use App\CarBrand;

class CarBrandsSeeder extends Seeder
{
    private $marcas = [
        ['name' => 'Chevrolet'],
        ['name' => 'Fiat'],
        ['name' => 'Volkswagen'],
        ['name' => 'Hyundai'],
        ['name' => 'Toyota'],
        ['name' => 'Ford'],
        ['name' => 'Renault'],
        ['name' => 'Honda'],
        ['name' => 'Nissan'],
        ['name' => 'Jeep'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->marcas as $marca){
            CarBrand::create($marca);
        }
    }
}
