<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    protected $table ='event';
    protected $fillable =['nama'];

    public $timestamps = false;

   public function Course(): BelongsTo
    {
        return $this->BelongsTo(Course::class);
    }
}
