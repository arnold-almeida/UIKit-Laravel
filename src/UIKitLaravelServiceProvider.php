<?php
namespace Almeida\UIKitLaravel;

use Illuminate\Support\ServiceProvider;

class UIKitLaravelServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('almeida/ui-kit-laravel', 'almeida/ui-kit-laravel');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        /**
         * Tell the app which implementaions we want bound to the interface by default
         */
        $app['uikit.uikit'] = $app->share(function ($app) {

            $config = $app['config']->get('almeida/ui-kit-laravel::config');

            //dd(get_class($app['config']));
            //dd($app['config']->get('almeida/ui-kit-laravel::config'));

            // Add in framework tools
            $options = array(
            	'framework' => [
            		'Paginator' => 'Illuminate\Pagination\Paginator'
            	]
            );

            // UiKit container
            $uikit = $app->make('Almeida\UIKit\UIKit');

            return $uikit;
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('uikit.uikit');
    }

}
