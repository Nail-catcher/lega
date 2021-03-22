<?php
namespace App\Providers;

use App\Category;
use App\Basket;
use App\News;
use App\Eat;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Undercategories;
use Illuminate\Http\Request;
use Cookie;
class ComposerServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        // .....
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Request $request) {
      
        
        View::composer(
            'profile', 'App\Http\ViewComposers\ProfileComposer'
        );
       
        View::composer('*', function($view) {
            $news=News::where('carousel', '=', 1)->orderBy('updated_at', 'desc')->take(4)->get();
            $eats=Eat::where('carousel', '=', 1)->orderBy('id', 'desc')->take(3)->get();
            $carousel=$news->merge($eats);
            $carousel = (array)$carousel;        
            shuffle($carousel);
            $carousel =$carousel[0];
            shuffle($carousel);
                $view->with(['items' => Category::roots(),'cookies'=>Cookie::get(),'underitems' => undercategories::roots(), 'carousel' => $carousel]);
        });
        
    }
}
