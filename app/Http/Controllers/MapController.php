<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Input;
use Redirect;
use Session;

class MapController extends Controller
{
    public function index(){
    	return view('appoint.contact');
    }
}
