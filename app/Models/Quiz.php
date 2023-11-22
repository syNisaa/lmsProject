<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    use HasFactory;
    protected $table ='quiz';
    protected $fillable =['materi_id','pertanyaan','jawaban','sekor','durasi_waktu'];

    public $timestamps = false;
    
    public function course(): BelongsTo
    {
        return $this->BelongsTo(Course::class);
    }
}
