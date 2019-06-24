<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlPanelController extends Controller
{
    public function index()
    {
    	return view('backend.control.control');
    }
}
