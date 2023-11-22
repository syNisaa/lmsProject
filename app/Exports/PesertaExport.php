<?php

namespace App\Exports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class PesertaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_peserta = DB::table('peserta')
        ->select('nama', 'email', 'jenis_kelamin', 'alamat', 'no_hp')
        ->get();

        return $ar_peserta;
    }
    public function headings(): array
    {
        return ["Nama mentor", "Email", "Gender",
                "Alamat","No HP"];
    }
}
