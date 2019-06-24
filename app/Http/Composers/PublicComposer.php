<?php

namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use DB;
class PublicComposer
{
	public function compose(View $view)
	{
		/*$view->with('products',Product::all());
		//$view->with('catygoriess',DB::table('catygories')
          //          ->whereBetween('id', [1, rand(1, 10)])->get());
		$view->with('filters',Filter::all());
		$view->with('profils',Product_Filter::all());*/
	}
}