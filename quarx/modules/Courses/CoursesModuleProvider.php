<?php

namespace Quarx\Modules\Courses;

use Illuminate\Routing\Router;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Blade;

class CoursesModuleProvider extends ServiceProvider
{
   
    public function register()
    {
        // Publishes
       $this->publishes([
          __DIR__.'/Publishes/database/migrations' => base_path('database/migrations'),
       ], 'migrations');
        
        $this->publishes([
//            __DIR__.'/Publishes/app' => base_path('app'),
//            __DIR__.'/Publishes/routes' => base_path('routes'),
            __DIR__.'/Publishes/database/seeds' => base_path('database/seeds'),
//            __DIR__.'/Publishes/resources' => base_path('resources'),
        ], 'seeds');

        
        // Load events
        $this->app->events->listen('eloquent.saved: Quarx\Modules\Courses\Models\Course', 'Quarx\Modules\Courses\Models\Course@afterSaved');

        // Load Routes
        $this->app->router->group(['middleware' => ['web']], function ($router) {
            require __DIR__.'/Routes/web.php';
        });

        // View namespace
        $this->app->view->addNamespace('courses', __DIR__.'/Views');

        
        // Configs
        $this->app->config->set('quarx.modules.courses', include(__DIR__.'/config.php'));
        
        $this->registerHelpers();
    }

    private function trueFalseSelect($for, $name, $selected) {
       $retVal = '<label class="control-label" for="' . $for . '">' . $for . '</label>' .
          '<select id="' . $for . '" class="form-control" name="' . $name . '">' . 
             '<option value="0"';
\Log::info('selected: ' . $selected);       
       if ($selected == "0") {
           $retVal .= ' selected="selected"';
       }
       $retVal .= '>False</option>';
             
       $retVal .= '<option value="1"';
       if (($selected == "1") || ($selected == 1)) {
          $retVal .= ' selected="selected"';
       }
       $retVal .= '>True</option></select>';
      return $retVal;       
    }
    
    private function registerHelpers() {
       // Make a custom blade directive:
       Blade::directive('langSelect', function ($selected) {
          $languages = config('quarx.languages');
          $retVal = '<label class="control-label" for="Lang">Lang</label>' . 
            '<select id="Lang" class="form-control" name="lang">';
			 foreach ($languages as $key => $value) {
					$retVal .= '<option value="' . $key . '"';
					if ($selected == $key) {
					   $retVal .= ' selected="selected"';
					}
			      $retVal .= '>' . $value . '</option>';
			 }
          $retVal .= '</select>';
          
          return $retVal;
       });
       
       Blade::directive('showReportsSelect', function ($selected) {
          return $this->trueFalseSelect('Showreports', 'showreports', $selected);
       });
       
       Blade::directive('showVisibleSelect', function ($selected) {
          return $this->trueFalseSelect('Visible', 'visible', $selected);
       });
          
    }
    
    
    
}
