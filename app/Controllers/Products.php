<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Products extends BaseController
{
	public function index()
	{
		/** @var \App\Models\Products $productsModel */
		$productsModel = model('Products');

		return view('products/index', [
			'products' => $productsModel->paginate(10), //perPage
			'pager' => $productsModel->pager,
		]);
	}

	
}
