<?php

namespace App\Exports;

use App\Models\Mentor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class MentorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_mentor = DB::table('mentor')
        ->select('nama', 'email', 'jenis_kelamin', 'skill', 'alamat', 'no_hp')
        ->get();

        return $ar_mentor;
    }
    public function headings(): array
    {
        return ["Nama mentor", "Email", "Gender", "Skill",
                "Alamat","No HP"];
    }
}
