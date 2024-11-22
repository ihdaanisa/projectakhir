<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id', 'views', 'unique_visitors',
    ];

    /**
     * Get the page that owns the statistics.
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
