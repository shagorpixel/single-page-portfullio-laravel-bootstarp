<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Main;
use App\Models\Portfullio;
use App\Models\Service;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
       $main =  Main::first();
       $services = Service::all();
       $portfullios = Portfullio::all();
       $abouts = About::all();
        return view('pages.index',compact('main','services','portfullios','abouts'));
    }
    public function dashboard(){
        return view('pages.dashboard.index');
    }
    public function main(){
        return view('pages.dashboard.main');
    }
}
