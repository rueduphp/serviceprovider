<?php
    namespace Octo\Laravel;

    use function Octo\laravel5;
    use function Octo\provider;

    class ServiceProvider extends \Illuminate\Support\ServiceProvider
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
            laravel5($this->app);
        }

        /**
         * Register the service provider.
         *
         * @return void
        */
        public function register()
        {
            $this->app['octo'] = $this->app->share(
                function () {
                    return provider();
                }
            );
        }

        /**
         * Get the services provided by the provider.
         *
         * @return array
        */
        public function provides()
        {
            return ['octo'];
        }
    }
