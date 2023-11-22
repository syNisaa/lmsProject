<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;
    protected $table ='course';
    protected $fillable =['nama','deskripsi','level','kategori_id','mentor_id','foto'];

    public $timestamps = false;
    
    public function event(): HasMany
    {
        return $this->HasMany(Event::class);
    }
    public function peserta(): BelongsTo
    {
        return $this->BelongsTo(Peserta::class);
    }
    public function mentor(): BelongsTo
    {
        return $this->BelongsTo(Mentor::class);
    }
    public function kategori(): BelongsTo
    {
        return $this->BelongsTo(Kategori::class);
    }
}
