<?php

namespace App\Http\Api;

class PostsController extends Controller
{
    public function index()
    {
        var_dump(request()->user());
    }
}