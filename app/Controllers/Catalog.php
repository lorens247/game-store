<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;
use Faker\Factory;


class Catalog extends BaseController
{
	public function index()
	{
		$faker = Factory::create();

		$db = Database::connect();

		d($db->query('show databases')->getResultArray());
		
		$products = [
			[
			'title' => $faker->words(2, true), //nb, asText
			'description' => $faker->words(50, true), //nb, asText
			'price' => $faker->randomFloat(1,0,50), //nbMaxDecimals, min, max
			],
			[
			'title' => $faker->words(2, true), //nb, asText
			'description' => $faker->words(50, true), //nb, asText
			'price' => $faker->randomFloat(1,0,50), //nbMaxDecimals, min, max
			],
			[
			'title' => $faker->words(2, true), //nb, asText
			'description' => $faker->words(50, true), //nb, asText
			'price' => $faker->randomFloat(1,0,50), //nbMaxDecimals, min, max
			]
		];

		
		return view('catalog/index', compact('products')); //name
	} 
}
