<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'html_content',
    ];

    /**
     * Get all pages using the template.
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
