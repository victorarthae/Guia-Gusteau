<?php

namespace App\Http\Controllers;

use Validator;
use Request;
use App\Http\Requests;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = Request::all();
        print_r($input);
    }
}
