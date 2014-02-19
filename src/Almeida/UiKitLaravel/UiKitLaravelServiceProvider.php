<?php
namespace Almeida\UiKitLaravel;

use Illuminate\Support\ServiceProvider;

class UiKitLaravelServiceProvider extends ServiceProvider
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

        $app['uikit.table'] = $app->share(function ($app) {

            // Table/Framework to load
            $config = $app['config']->get('almeida/ui-kit-laravel::bootstrap');

            // Set __construct($options)
            $options = array(
                'paginator' => $config['tables']['paginator']
            );

            // Bind the interfaces to the implementations
            //$app->bind('Almeida\UxKit\Feedback\FeedbackInterface', $config['feedback']['pattern']['class']);

            // Resolve instance
            $feedback = $app->make($config['feedback']['pattern']['class']);
            return $app->make($config['tables']['pattern']['class'], array($options, $feedback));
        });

        $app['uikit.feedback'] = $app->share(function ($app) {

            dd('@todo');
            // fetch table config
            $config = $app['config']->get('almeida/ux-kit-laravel::bootstrap');
            dd($config);

            $server = $app->make('Namespace\To\Class');

            return $server;

        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('uikit.table', 'uikit.feedback');
    }

}
