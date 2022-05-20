<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured',
        'user_id'
    ];

    public function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function scopeFilter($query, $filters)
    {
        if ( ! empty($filters) ) {
            if ( $month = $filters['month'] ) {
                 $query->whereMonth('created_at', Carbon::parse($month)->month);
            }

            if ( $year = $filters['year'] ) {
                $query->whereYear('created_at', $year);
            }
        }
    }
}
