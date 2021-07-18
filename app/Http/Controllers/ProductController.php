<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
class ProductController extends Controller
{
    public function index()
    {
        return view('product');
    }
}
