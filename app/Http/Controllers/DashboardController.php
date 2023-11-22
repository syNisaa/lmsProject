<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Mentor;
use App\Models\Course;
use App\Models\Kategori;
use App\Models\Peserta;

class DashboardController extends Controller
{
    public function index(): view
    {
        //query u/ mendapatkan jml kategori gedung
        $ar_program = Course::where('kategori_id', 7)->count();
        $ar_uiux = Course::where('kategori_id', 2)->count();
        $ar_jaringan = Course::where('kategori_id', 6)->count();
        $ar_fullstak = Course::where('kategori_id', 1)->count();
        $ar_softskill = Course::where('kategori_id', 5)->count();
        $jml = Course::count();
        $jml_peserta = Peserta::count();
        $jml_mentor = Mentor::count();
        $jml_kategori = Kategori::count();

        $grafik_bar = DB::table('course')
        ->join('kategori', 'kategori.id', '=', 'course.kategori_id')
        ->select('kategori.id', 'kategori.nama', DB::raw('COUNT(course.kategori_id) as jml'))
        ->groupBy('kategori.id', 'kategori.nama')
        ->get();


        $grafik_pie = DB::table('course')
        ->join('kategori', 'kategori.id', '=', 'course.kategori_id')
        ->select('kategori.id', 'kategori.nama', DB::raw('COUNT(course.kategori_id) as jml'))
        ->groupBy('kategori.id', 'kategori.nama')
        ->get();


        return view('backend.dashboard', 
        compact('ar_program','ar_uiux','ar_jaringan','ar_fullstak','ar_softskill',
        'grafik_bar','grafik_pie','jml','jml_peserta','jml_mentor','jml_kategori'));
    
    }
}
