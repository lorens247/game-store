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
		helper ('form'); //filename
		
		if ($this->request->getMethod() === 'post') {
			$validationResult = $this->validate([
				'title' => 'required|min_length[10]',
				'description' => 'required|min_length[50]',
				'price' => 'required|decimal',
			]);

			if ($validationResult) {
				/** @var \App\Models\Products $productsModel */
				$productsModel = model('Products');  //name

				$productsModel->save($this->request->getPost());

				return redirect()->to('/products/index'); //url
			};

			return view('products/add', ['validation' => $this->validator]); //name
		}

		return view ('products/add'); //name
	}

	public function edit(int $id)
	{
		return view ('products/edit'); //name
	}

	public function delete(int $id)
	{
		
	}
}
