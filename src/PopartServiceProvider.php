<?php

namespace Popart\PopartStart;

use Laravel\Ui\UiCommand;
use Illuminate\Support\ServiceProvider;

class PopartServiceProvider extends ServiceProvider
{
    
    public function boot()
    {
        UiCommand::macro('popart:dashboard', function ($command) {

            PopartPreset::install();
            
            $command->info('Popart dashboard installed successfully.');

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
