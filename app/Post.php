<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = ['id'];

    public function comments()
    {
    	return $this->hasMany(Comment::class); // Comment::class is  similar to this App/Comment
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    // query scope from PostController filterMonthYear
    public function scopeFilterMonthYear($query, $filterParam)
    {
    	if($month = $filterParam['month'])
        {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filterParam['year'])
        {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archive()
    {
    	return self::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->get();
    }
}
