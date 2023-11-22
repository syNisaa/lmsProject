<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;

class Kategori extends Model
{
    use HasFactory; 
    //mengarahkan ke tabel kategori
    protected $table = 'kategori';
    protected $fillable = ['nama'];

    public $timestamps = false;

    public function course(): HasMany
    {
        return $this->HasMany(Course::class);
    }
}
