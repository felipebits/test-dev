<?php

use Illuminate\Database\Seeder;
use App\Car;

class CarsSeeder extends Seeder
{
    private $carros = [

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->carros as $carro){
            Car::create($carro);
        }
    }
}
