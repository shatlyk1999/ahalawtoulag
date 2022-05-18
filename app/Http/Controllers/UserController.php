<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($name = null)
    {
        // $name = 'Aman';
        return view('user/show', [
            'username' => $name
        ]);
    }



    public function list()
    {
        $users = [
            'kamil',
            'kemal',
            'jemal',
            'nemal',
            'mal',
        ];

            return view('user.list', compact('users'));
    }
}







