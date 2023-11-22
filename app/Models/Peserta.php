<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;

class Peserta extends Model
{
    use HasFactory; 
    //mengarahkan ke tabel peserta
    protected $table = 'peserta';
    protected $fillable = ['nama','email','jenis_kelamin','alamat','no_hp','foto','user_id'];

    public $timestamps = false;

    public function course(): HasMany
    {
        return $this->HasMany(Course::class);
    }
}
