<?php

namespace App\Http\View\Composers;

use App\User;
use App\Category;

use Illuminate\View\View;

class SettingComposer
{
   
  
    public function compose(View $view)
    {
    	$categories = Category::all();
        $view->with('categories',$categories);
    }
}
