<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Category;
use App\Http\Requests\FiltrateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeAdvertisementController extends Controller
{
    public function index()
    {
        $activeAdv = Advertisement::with(['category', 'user' ,'advimages'])->whereStatus('active')->orderBy('created_at', 'desc')->paginate(6);
        return view('home')-> with(compact('activeAdv'));
    }

}
