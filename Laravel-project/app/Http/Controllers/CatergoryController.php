<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class catergoryController extends Controller
{
    public function index() {
        return view('categorys.category');
    }
}
