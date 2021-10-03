<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'table_tennis_stroke' => [
        ['value' =>'loop' ,'label'=>'Loop'],
        ['value' =>'counter_Loop' ,'label'=>'Counter Loop'],
        ['value' =>'drive' ,'label'=>'Drive'],
        ['value' =>'hit' ,'label'=>'Hit'],
        ['value' =>'push' ,'label'=>'Push'],
        ['value' =>'block' ,'label'=>'Block'],
        ['value' =>'smash' ,'label'=>'Smash'],
        ['value' =>'chop' ,'label'=>'Chop'],
        ['value' =>'flick' ,'label'=>'Flick'],
        ['value' =>'banana Flick' ,'label'=>'Banana Flick',],
        ['value' =>'strawberry Flick','label'=>'Strawberry Flick'],
        ['value' =>'lob' ,'label' => 'Lob'],
        ['value' =>'pendulum' ,'label' => 'Serve - pendulum'],
        ['value' =>'reverse_pendulum' ,'label' => 'Serve -Reverse Pendulum'],
        ['value' =>'corkscrew' ,'label' => 'Serve - Corkscrew'],
        ['value' =>'birdman' ,'label' => 'Serve - Birdman'],
        ['value' =>'Shovel' ,'label' => 'Serve - Shovel'],

    ],

    'table_tennis_stroke_values' => [
        'loop' => 'Loop',
        'counter_Loop' =>'Counter Loop',
        'drive' =>'Drive',
        'push' =>'Push',
        'block' =>'Block',
        'smash' =>'Smash',
        'hit' =>'Hit',
        'chop' =>'Chop',
        'flick' =>'Flick',
        'banana Flick' =>'Banana Flick',
        'strawberry Flick','label'=>'Strawberry Flick',
        'lob'  => 'Lob',
        'pendulum'  => 'Serve - pendulum',
        'reverse_pendulum'  => 'Serve -Reverse Pendulum',
        'corkscrew'  => 'Serve - Corkscrew',
        'birdman'  => 'Serve - Birdman',
        'Shovel'  => 'Serve - Shovel',
    ],

    'table_tennis_spin_intensity' => [
        ['value' =>'low' ,'label'=>'Low'],
        ['value' =>'medium' ,'label'=>'Medium'],
        ['value' =>'high' ,'label'=>'High'],
        ['value' =>'dead' ,'label'=>'Dead'],
    ],

    'table_tennis_spin_intensity_values' => [
        'low' => 'Low',
        'medium' => 'Medium',
        'high' => 'High',
        'dead' => 'Dead',
    ],
    
    'table_tennis_placements' => [
        ['value' =>'1' ,'label'=>'Extreme Backhand'],
        ['value' =>'2' ,'label'=>'Backhand'],
        ['value' =>'3' ,'label'=>'Backhand middle'],
        ['value' =>'4' ,'label'=>'Middle'],
        ['value' =>'5' ,'label'=>'forehand Middle'],
        ['value' =>'6' ,'label'=>'Forehand'],
        ['value' =>'7' ,'label'=>'Extreme wide forehand'],
    ],

    'table_tennis_placements_values' => [
        '1' =>'Extreme Backhand',
        '2' =>'Backhand',
        '3' =>'Backhand middle',
        '4' =>'Middle',
        '5' =>'forehand Middle',
        '6' =>'Forehand',
        '7' =>'Extreme wide forehand',
    ],

    'table_tennis_tosses' => [
        ['value' => null ,'label'=>'N/A'],
        ['value' =>'1' ,'label'=>'High'],
        ['value' =>'2' ,'label'=>'medium'],
        ['value' =>'3' ,'label'=>'Low'],
    ],

    'table_tennis_toss_values' => [
         null =>'N/A',
        '1' =>'High',
        '2' =>'medium',
        '3' =>'Low',
    ],

    'table_tennis_spin_type_values' => [
        
        'top' => 'Topspin',
        'top_side' => 'Top-sidespin',
        'side' => 'Sidespin',
        'back' => 'Backspin',
        'back_side' => 'Back-sidespin',
        'dead' => 'Dead Ball',
        


    ],

    'table_tennis_spin_type' => [
        ['value' =>'top', 'label' =>'Topspin' ],
        ['value' =>'top_side', 'label' =>'Top-sidespin' ],
        ['value' =>'side', 'label' =>'Sidespin' ],
        ['value' =>'back', 'label' =>'Backspin' ],
        ['value' =>'back_side', 'label' =>'Back-sidespin' ],
        ['value' =>'dead', 'label' =>'DeadBall' ],
    ],   
    
    'hand_values' => [
        'forehand' =>'Forehand' ,
        'backhand' =>'Backhand' ,
    ],

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Arr' => Illuminate\Support\Arr::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'Date' => Illuminate\Support\Facades\Date::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Http' => Illuminate\Support\Facades\Http::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        // 'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Str' => Illuminate\Support\Str::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

    ],

];
