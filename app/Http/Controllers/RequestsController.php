<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RequestsController extends Controller
{
    public function listRequest($station)
    {
        $getRequests = ModelsRequest::query()->orderBy('created_at', 'desc')->paginate(5)->withQueryString();
        // dd(Auth::check());
        $getNameStation = Station::select('name')->where('id', $station)->first();

       return view('requests', ['getRequests' => $getRequests], ['getNameStation' =>$getNameStation]);
    }

    public function sort(Request $getsort)
    {
        // dd($getsort->sort_station_name);
        switch ($getsort->sort_date) {
            case 'new':
                $getsortreq = ModelsRequest::select()->join('stations', 'stations.id', '=', 'requests.station_id')->latest('requests.created_at')->where('requests.status', $getsort->sort_status)->where('stations.name',$getsort->sort_station_name)->paginate(5)->withQueryString();
                break;

            case 'old':
                $getsortreq = ModelsRequest::select()->join('stations', 'stations.id', '=', 'requests.station_id')->oldest('requests.created_at')->where('requests.status', $getsort->sort_status)->where('stations.name', $getsort->sort_station_name)->paginate(5)->withQueryString();
                break;

            default:
                return back();
                break;
        }
        $getStations = Station::select()->get();
        // dd ($getStations->all());
        return view('requests', ['getRequests' => $getsortreq], ['getStations'=>$getStations]);


    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desk' => 'required',
            'title' => 'required|max:254',
            'station' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }
        $validated = $validator->validate();
        $validated = Arr::add($validated, 'service', Auth::user()->firstname);
        $validated = Arr::add($validated, 'comment', $request->comment);
        $validated = Arr::add($validated, 'user_id', Auth::user()->id);
        $validated = Arr::add($validated, 'station_id', $request->station);
        ModelsRequest::query()->create($validated);
        return redirect()->route('main');
    }

    public function single($getRequest)
    {
        $singleRequest = ModelsRequest::select('requests.created_at AS create', 'stations.name AS station_name', 'users.firstname AS user_name', 'title', 'desk', 'comment', 'service', 'status', 'users.number_phone AS user_number', 'requests.id AS id')->join('users', 'users.id', '=', 'requests.user_id')->join('stations', 'stations.id', '=', 'requests.station_id')->where('requests.id', $getRequest)->first();
        // dd($singleRequest);
        return view('single', ['SingleRequest' => $singleRequest]);
    }

    public function towork(ModelsRequest $SingleRequest)
    {
        $update = ModelsRequest::find($SingleRequest->id);
        if ($update->status == 'в ожидании') {
            $update->update(['status' => 'в работе']);
        } elseif ($update->status == 'в работе') {
            $update->update(['status' => 'завершено']);
        } elseif ($update->status == 'завершено') {
            $update->update(['status' => 'в работе']);
        }
        $station = $SingleRequest;
        // return redirect()->route('requests.listRequest', $station->station_id);
        return redirect()->back()->back();
    }
}
