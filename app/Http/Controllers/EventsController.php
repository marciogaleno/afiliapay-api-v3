<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {
        Event::create($request->all());
    }

    public function list(Request  $request)
    {
        return Event::all();
    }
}
