<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{

    public function create()
    {
        return view("events.create");
    }


    public function store(Request $request)
    {
        log::debug("イベント名: ".$request -> get("title"));
        return to_route("events.create");
    }
}
