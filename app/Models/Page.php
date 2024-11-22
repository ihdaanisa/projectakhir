<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'name', 'template_id',
    ];

    /**
     * Get the project that owns the page.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the template used by the page.
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * Get all elements for the page.
     */
    public function elements()
    {
        return $this->hasMany(Element::class);
    }

    /**
     * Get the statistics for the page.
     */
    public function statistics()
    {
        return $this->hasOne(Statistic::class);
    }
}
