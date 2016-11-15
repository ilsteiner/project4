<?php

namespace CharDB\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function __invoke() {
    	$characters = Characters::all();
    }
}
