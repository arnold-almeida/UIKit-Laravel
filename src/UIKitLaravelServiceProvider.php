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

        // Bind the interfaces to the implementations
        // $app->bind('League\OAuth2\Server\Storage\ClientInterface', 'LucaDegasperi\OAuth2Server\Repositories\FluentClient');
        // $app->bind('League\OAuth2\Server\Storage\ScopeInterface', 'LucaDegasperi\OAuth2Server\Repositories\FluentScope');
        // $app->bind('League\OAuth2\Server\Storage\SessionInterface', 'LucaDegasperi\OAuth2Server\Repositories\FluentSession');

        $app['uikit.uikit'] = $app->share(function ($app) {

            $config = $app['config']->get('almeida/ui-kit-laravel::config');

            //dd(get_class($app['config']));
            //dd($app['config']->get('almeida/ui-kit-laravel::config'));

            // Make table implementation
            $options = array(
                'paginator' => 'Illuminate\Pagination\Paginator'
            );

            // Make feedback implementation
            $feedback    = $app->make('Almeida\UIKit\Collections\Feedback\Feedback');

            $table       = $app->make('Almeida\UIKit\Collections\Tables\Table', array($options, $feedback));

            // Make button implementation
            $button      = $app->make('Almeida\UIKit\Elements\Button\Button');

            // Make link implementation
            $link        = $app->make('Almeida\UIKit\Elements\Link\Link');

            // Make typography implementation
            $typography  = $app->make('Almeida\UIKit\Elements\Typography\Typography');

            // Make actions implementation
            $actions     = $app->make('Almeida\UIKit\Collections\Actions\Actions', array($options, $button, $link));

            // Make button_groups implementation
            $buttonGroup = $app->make('Almeida\UIKit\Collections\ButtonGroups\ButtonGroup', array($options, $actions));

            // UiKit container
            $uikit = $app->make('Almeida\UIKit\UIKit', array($typography, $table, $button, $buttonGroup, $actions));

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
