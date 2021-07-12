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
		helper ('form');

		/** @var \App\Models\Products $productsModel */
		$productsModel = model('Products');  
		
		$entity = $productsModel->find($id);

		if(!$entity) {
			throw PageNotFoundException::forPageNotFound();
		} 

		if ($this->request->getMethod() === 'post') {
			if ($productsModel->update($entity['id'], $this->request->getPost())) {
				return redirect()->to('/products/index');
			}
		}
		return view('products/edit', [
			'validation' => $productsModel->getValidation(),
			'entity' => $entity
		]); 
	}

	public function delete(int $id)
	{
		helper ('form');

		/** @var \App\Models\Products $productsModel */
		$productsModel = model('Products');  
		
		$entity = $productsModel->find($id);

		if(!$entity) {
			throw PageNotFoundException::forPageNotFound();
		} 

		$productsModel->delete($id);
		
		return redirect()->to('products/index');
	}
}
