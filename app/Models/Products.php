<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class Products extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'products';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'title','description','price'
	];

	protected $validationRules = [
		'title' => [
			'rules' => 'required|min_length[10]',
			'errors'=> [
				'required' =>'The title is required field',
				'min_length' =>'The title needs at least 10 characters',
			]
		],
		'description' => [
			'rules' => 'required|min_length[50]',
			'errors'=> [
				'required' =>'The description is required field',
				'min_length' =>'The description needs at least 50 characters',
			]
		],
		'price' => [
			'rules' =>'required|decimal',
			'errors'=> [
				'required' =>'This price is required field',
				'decimal' =>'This price field is a decimal',
			]
		],
	];

	/**
	 * @return ValidationInterface
	 */
	public function getValidation(): ValidationInterface
	{
		return $this->validation;
	}
}
