<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Suport\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          //$ar_quiz = DB:: tabel('quiz')->get(); //Query Bulilder
          $ar_quiz = Quiz::all();//eloquent
          return view('backend.assets.quiz', compact('ar_quiz'));
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
