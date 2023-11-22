<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Suport\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$ar_event = DB:: tabel('event')->get(); //Query Bulilder
        if (request()->is('data_mentor')){
        $ar_event = Event::all();//eloquent
        return view('backend.assets.event', compact('ar_event'));
        }else{
            $ar_event = Event::all();//eloquent
            return view('frontend.event', compact('ar_event'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
