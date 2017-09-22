<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    
    public function index()
    {
        return view('admin.index');
    }

    public function menu()
    {
        return view('admin.menu');
    }
    public function top()
    {
        return view('admin.top');
    }
    public function main()
    {
        return view('admin.main');
    }


}
