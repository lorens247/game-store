<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Populateproducts extends Seeder
{
	public function run()
	{
		$faker = Factory::create();

		for ($i=0; $i < 100; $i++) {
			$data = [
					'title' => $faker->words(2, true), //nb, asText
					'description' => $faker->words(50, true), //nb, asText
					'price' => $faker->randomFloat(1,0,50), //nbMaxDecimals, min, max
			];

			$this->db->table('products')->insert($data);  
		}
	}
}

