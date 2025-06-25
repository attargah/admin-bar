<?php

namespace Attargah\AdminBar;

use Filament\Support\Assets\Asset;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AdminBarServiceProvider extends PackageServiceProvider
{
    public static string $name = 'admin-bar';

    public static string $viewNamespace = 'admin-bar';

    public function configurePackage(Package $package): void
    {

        $package->name(static::$name)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishAssets()
                    ->askToStarRepoOnGitHub('attargah/admin-bar');
            });


        $package->hasViewComponents('admin-bar', Components\AdminBar::class);
        $package->hasTranslations();

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

}
