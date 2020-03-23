<?php

namespace Popart\PopartStart;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
 
class PopartPreset extends Preset
{

    public static function install()
    {
        static::updatePackages();
        static::updateMix();
        static::updateScripts();
        static::updateStyles();

        static::scaffoldAuth();

        static::updateLayouts();
        static::updateImages();
        static::updateRoutes();
        static::updateViews();

    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge([
            'bootstrap' => '^4.0.0',
            'popper.js' => '^1.12',
            "jquery" => "^3.2",
        ], Arr::except($packages, [
            'lodash',
        ]));
    }

    protected static function updateMix()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    protected static function updateScripts()
    {
        if (! is_dir($directory = resource_path('js/front'))) {
            mkdir($directory, 0755, true);
        }

        copy(__DIR__.'/stubs/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__.'/stubs/resources/js/app.js', resource_path('js/app.js'));

        if (! is_dir($directory = resource_path('js/dashboard'))) {
            mkdir($directory, 0755, true);
        }

        copy(__DIR__.'/stubs/resources/js/dashboard.js', resource_path('js/dashboard.js'));
        copy(__DIR__.'/stubs/resources/js/bootstrap_3.js', resource_path('js/dashboard/bootstrap_3.js'));
        copy(__DIR__.'/stubs/resources/js/adminlte.js', resource_path('js/dashboard/adminlte.js'));


    }

    protected static function updateStyles()
    {
        copy(__DIR__.'/stubs/resources/css/dashboard.scss', resource_path('sass/dashboard.scss'));

        if (! is_dir($directory = resource_path('sass/dashboard'))) {
            mkdir($directory, 0755, true);
        }

        copy(__DIR__.'/stubs/resources/css/_normalize.scss', resource_path('sass/dashboard/_normalize.scss'));
        copy(__DIR__.'/stubs/resources/css/_adminlte.scss', resource_path('sass/dashboard/_adminlte.scss'));
        copy(__DIR__.'/stubs/resources/css/_global.scss', resource_path('sass/dashboard/_global.scss'));
        copy(__DIR__.'/stubs/resources/css/_sidebar.scss', resource_path('sass/dashboard/_sidebar.scss'));
        copy(__DIR__.'/stubs/resources/css/_variables.scss', resource_path('sass/dashboard/_variables.scss'));

        if (! is_dir($directory = resource_path('sass/front'))) {
            mkdir($directory, 0755, true);
        }

        copy(__DIR__.'/stubs/resources/css/app.scss', resource_path('sass/app.scss'));

        copy(__DIR__.'/stubs/resources/css/bootstrap.scss', resource_path('sass/front/bootstrap.scss'));

    }

    protected static function scaffoldAuth()
    {

        if (! is_dir($directory = app_path('Http/Controllers/Dashboard'))) {
            mkdir($directory, 0755, true);
        }
        
        $filesystem = new Filesystem;
        
        $filesystem->copy(__DIR__.'/stubs/controllers/HomeController.php', app_path('Http/Controllers/Dashboard/HomeController.php'));
        
        if (! is_dir($directory = app_path('Http/Controllers/Auth'))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(base_path('vendor/laravel/ui/stubs/Auth')))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/Auth/'.Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });

         
        collect($filesystem->allFiles(base_path('vendor/laravel/ui/stubs/migrations')))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    database_path('migrations/'.$file->getFilename())
                );
        });

        // if (! is_dir($directory = resource_path('views/auth'))) {
        //     mkdir($directory, 0755, true);
        // }

        $filesystem->copyDirectory(__DIR__.'/stubs/resources/views/auth', resource_path('views/auth'));


    }
    


    protected static function updateLayouts()
    {
        if (! is_dir($directory = resource_path('views/layouts'))) {
            mkdir($directory, 0755, true);
        }

        $filesystem = new Filesystem;

        $filesystem->copy(__DIR__.'/stubs/resources/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));
        $filesystem->copy(__DIR__.'/stubs/resources/views/layouts/dashboard.blade.php', resource_path('views/layouts/dashboard.blade.php'));

        $filesystem->copy(__DIR__.'/stubs/resources/views/layouts/_dashboard_sidebar.blade.php', resource_path('views/layouts/_dashboard_sidebar.blade.php'));

    }

    protected static function updateImages()
    {
        if (! is_dir($directory = public_path('images'))) {
            mkdir($directory, 0755, true);
        }

        $filesystem = new Filesystem;

        $filesystem->copy(__DIR__.'/stubs/resources/images/login-bg.png', public_path('images/login-bg.png'));
        $filesystem->copy(__DIR__.'/stubs/resources/images/dashboard-inner.png', public_path('images/dashboard-inner.png'));
        $filesystem->copy(__DIR__.'/stubs/resources/images/user-icon.png', public_path('images/user-icon.png'));
        $filesystem->copy(__DIR__.'/stubs/resources/images/dashboard-fa-icon.svg', public_path('images/dashboard-fa-icon.svg'));
        $filesystem->copy(__DIR__.'/stubs/resources/images/logo.svg', public_path('images/logo.svg'));
        $filesystem->copy(__DIR__.'/stubs/resources/images/logout-fa-icon.svg', public_path('images/logout-fa-icon.svg'));
        $filesystem->copy(__DIR__.'/stubs/resources/images/pages-fa-icon.svg', public_path('images/pages-fa-icon.svg'));
        $filesystem->copy(__DIR__.'/stubs/resources/images/roles-fa-icon.svg', public_path('images/roles-fa-icon.svg'));
        $filesystem->copy(__DIR__.'/stubs/resources/images/settings-fa-icon.svg', public_path('images/settings-fa-icon.svg'));
        $filesystem->copy(__DIR__.'/stubs/resources/images/user-fa-icon.svg', public_path('images/user-fa-icon.svg'));

    }

    public static function updateRoutes()
    {

        file_put_contents(
            base_path('routes/web.php'),
            "\n\nAuth::routes();\n\nRoute::get('dashboard/index', 'Dashboard\HomeController@index')->name('dashboard.home');\n\n",
            FILE_APPEND
        );

    }

    public static function updateViews()
    {
        $filesystem = new Filesystem;
        
        $filesystem->delete(resource_path('views/welcome.blade.php'));
        
        copy(__DIR__.'/stubs/resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
        
        if (! is_dir($directory = resource_path('views/dashboard'))) {
            mkdir($directory, 0755, true);
        }

        copy(__DIR__.'/stubs/resources/views/index.blade.php', resource_path('views/dashboard/index.blade.php'));

    }

}
