<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Catalog extends BaseController
{
	public function index()
	{
		return d($this);
	}
}
