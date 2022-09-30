<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class ApiHttpException extends Exception
{
    public function report()
    {

    }

    public function render(Request $request)
    {

    }
}