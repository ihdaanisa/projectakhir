<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id', 'type', 'content', 'position',
    ];

    /**
     * Get the page that owns the element.
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
