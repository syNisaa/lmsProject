<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class CourseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_course = DB::table('course as c')
        ->select('c.nama', 'k.nama as jenis', 'm.nama as mentor', 'c.deskripsi', 'c.level')
        ->join('kategori as k', 'c.kategori_id', '=', 'k.id')
        ->join('mentor as m', 'c.mentor_id', '=', 'm.id')
        ->get();
        
        return $ar_course;
    }

    public function headings(): array
    {
        return ["Nama Course", "Kategori", "Nama Mentor", "Deskripsi",
                "Level Course"];
    }
}
