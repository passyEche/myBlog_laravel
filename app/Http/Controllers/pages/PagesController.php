<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome To My Blog App";
        return view('pages.index', [
            'title' => $title
        ]);
    }

    public function about(){
        $title = 'About us';
        return view('pages.about', [
            'title' => $title
        ]);
    }

    public function service(){
        $data = array(
            'title' => 'Services', 
            'services' => ['WebDesign', 'Progammer', 'FullStacker', 'Graphic Design']
        );
        // dd($data);
        return view('pages.services', [
            'title' => $data['title'],
            'services' => $data['services']

        ]);
    }
}
