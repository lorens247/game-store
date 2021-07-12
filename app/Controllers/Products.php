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

	public function add()
	{
		helper('form'); //filenames
		
		/** @var \App\Models\Products $productsModel */
		$productsModel = model('Products');  //name
		
		if ($this->request->getMethod() === 'post') {
			if ($productsModel->save($this->request->getPost())) {
				return redirect()->to('/products/index'); //url
			}
		}
	
		return view ('products/add', [
			'validation' => $productsModel->getValidation()
		]);	
	}

	public function edit(int $id)
	{
	
	}

	public function delete(int $id)
	{
		
	}
}
