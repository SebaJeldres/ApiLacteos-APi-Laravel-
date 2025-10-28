<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\controllers\Controller;


class userController extends Controller
{
    public function index()
    {
        return "Lista de usuarios desde el controller";
    }

}
