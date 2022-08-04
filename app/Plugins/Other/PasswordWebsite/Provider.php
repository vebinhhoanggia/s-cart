<?php
    $this->loadTranslationsFrom(__DIR__.'/Lang', 'Plugins/Other/PasswordWebsite');
    $this->loadViewsFrom(__DIR__.'/Views', 'Plugins/Other/PasswordWebsite');

    if (sc_config_global('PasswordWebsite')) {
        app('router')->aliasMiddleware('password_website', \App\Plugins\Other\PasswordWebsite\Middleware::class);
        $configDefault = config('middleware.front');
        $configDefault[] = 'password_website';
        config(['middleware.front' => $configDefault]);
    }

