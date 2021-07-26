<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Register extends BaseController
{
	public function index()
	{
		if (session('isLoggedIn')) { //val
			return redirect()->to('/products');  //url
		}
		
		helper('form');

		if ($this->request->getMethod() ==='post') {
			/** @var \App\Models\Users $users */
			$users = model('Users'); //name

			$user = [
				'login'		=> $this->request->getPost('login'),
				'password'	=> $this->request->getPost('password'),
			];

			if (!$users->save($user)) {
				return redirect()->back()->withInput()->with('errors', $users->errors());
			}

			return redirect()->to('/login')->with(
				'message','The user has been created.' //key, messages
			);
		}
		
		return view('register/index');
	}
}
