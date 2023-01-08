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
        $title = $request -> get("title");
        log::debug("イベント名: ".$title);
        return to_route("events.create") -> with("success", $title."を登録しました");
    }
}
