<?php

namespace App\Http\Api;

use Illuminate\Contracts\Cache\Factory;

class PostsController extends Controller
{

    //契约
    public function index(Factory $cache)
    {
        var_dump($cache->set('test',100,1));
        var_dump($cache->get('test'));
//        var_dump(request()->user());
    }
}