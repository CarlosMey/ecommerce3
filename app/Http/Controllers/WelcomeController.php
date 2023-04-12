<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    public function __invoke(){

        $categories = Category::all();



        return view('welcomee', compact('categories'));
    }
}
