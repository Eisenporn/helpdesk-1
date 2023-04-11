<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function main()
    {
        // $stations = Station::query()->orderBy('name', 'asc')->get();
        // return view('main', ['stations' => $stations]);
        $getRequests = ModelsRequest::query()->orderBy('created_at', 'desc')->paginate(5)->withQueryString();
        $getStations = Station::select()->get();
        return view('requests', ['getRequests' => $getRequests], ['getStations'=>$getStations]);
    }

    public function add()
    {
        $stations = Station::query()->orderBy('name', 'asc')->get();
        // dd(Auth::user());
        return view('add', ['stations' => $stations], ['user' => Auth::user()]);
    }

    public function signin()
    {
        return view('signin');
    }

    public function signup()
    {
        return view('signup');
    }


}
