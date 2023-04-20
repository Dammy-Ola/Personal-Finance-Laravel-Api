<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Income extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'description', 'date', 'income_source_id'];

    protected $dates = ['date'];

    public function income_source(): BelongsTo
    {
        return $this->belongsTo(IncomeSource::class);
    }
}
