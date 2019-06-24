<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
	use SoftDeletes;
	
    protected $fillable = [
        'title_ar', 'title_en', 'percent',
    ];
	
	
	public static function skills()
    {
        return static::pluck('title_ar', 'id');
    }
	
	
}
