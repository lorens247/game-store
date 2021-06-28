<?php

namespace App\Controllers;

class Catalog extends BaseController
{
	public function index()
	{
		/** @var \App\Models\Products $productsModel */
		$productsModel = model('Products');

		$products = $productsModel
			->orderBy('id','DESC')  //orderBy direction
			->findAll(6) //limit
		;
		
		return view('catalog/index', compact('products')); //name
	} 
}
