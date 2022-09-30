<?php

namespace App\Http\Admin;

class IndexController extends Controller
{
    public function index()
    {
        return view('index.index');
    }
}