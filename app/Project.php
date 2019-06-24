<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
	use SoftDeletes;
    protected $fillable = [
        'title_ar', 'title_en','description_ar', 'description_en', 'link','main_image',
    ];
	
	public static function projects()
    {
        return static::pluck('title_ar', 'id');
    }
}
