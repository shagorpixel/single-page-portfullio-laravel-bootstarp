<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Main;
use App\Models\Portfullio;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Team;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
       $main =  Main::first();
       $services = Service::latest()->take(3)->get();
       $portfullios = Portfullio::all();
       $abouts = About::all();
       $teamMembers = Team::all();
        return view('pages.index',compact('main','services','portfullios','abouts','teamMembers'));
    }
    public function service(){
        $services = Service::all();
        return view('pages.servicepage',compact('services'));
    }

    public function singleService( $category){
       $SingleCategory = ServiceCategory::where('slug',$category)->first();

       return view('pages.categoryservice',compact('SingleCategory'));
    }

    public function dashboard(){
        $services = Service::all();
        return view('pages.dashboard.index',compact('services'));
    }
    public function main(){
        return view('pages.dashboard.main');
    }
}
