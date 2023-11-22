<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;

class Mentor extends Model
{
    use HasFactory; 
    //mengarahkan ke tabel mentor
    protected $table = 'mentor';
    protected $fillable = ['nama','email','jenis_kelamin','skill','deskripsi','alamat','no_hp','foto','user_id'];

    public $timestamps = false;

    public function course(): HasMany
    {
        return $this->HasMany(Course::class);
    }
}
