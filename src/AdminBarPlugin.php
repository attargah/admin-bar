<?php

namespace Attargah\AdminBar;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Support\Facades\Blade;

class AdminBarPlugin implements Plugin
{

    protected string|null $logoUrl = null;
    protected string|null $logoHeight = 'h-12';

    protected string|null $barTitleFont = 'font-semibold';
    protected string|null $barMenuTitleFont = '';
    protected string|null $barMenuItemsFont = '';

    protected string|null $barTitle = null;
    protected string|null $barHeight = 'h-auto';
    protected string|null $barBackgroundColor = 'bg-slate-800';
    protected string|null $barTextColor = 'text-white';
    protected string|null $barCustomClass = '';

    protected bool $isAuthMenuEnable = true;

    public function getId(): string
    {
        return 'admin-bar';
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {

        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function getBarMenuTitleFont() : string {
        return $this->barMenuTitleFont;
    }

    public function setBarMenuTitleFont(string $fontClass): static
    {
        $this->barMenuTitleFont = $fontClass;
        return $this;
    }

    public function getBarMenuItemsFont() : string {
        return $this->barMenuItemsFont;
    }

    public function setBarMenuItemsFont(string $fontClass): static
    {
        $this->barMenuItemsFont = $fontClass;
        return $this;
    }

    public function getBarTitleFont() : string {
        return $this->barTitleFont;
    }

    public function setBarTitleFont(string $fontClass): static
    {
        $this->barTitleFont = $fontClass;
        return $this;
    }

    public function isAuthMenuEnable() : bool
    {
        return $this->isAuthMenuEnable;
    }
    public function setAuthMenuEnable(bool $bool) : static
    {
        $this->isAuthMenuEnable = $bool;
        return $this;
    }

    public function getLogoUrl() : string|null
    {
        return $this->logoUrl;
    }

    public function setLogoUrl(string $logoUrl) : static
    {
        $this->logoUrl = $logoUrl;
        return $this;
    }


    public function getLogoHeight() : string|null
    {
        return $this->logoHeight;
    }
    public function setLogoHeight(string $heightClass) : static
    {
        $this->logoHeight = $heightClass;
        return $this;
    }

    public function getBarCustomClass() : string|null
    {
        return $this->barCustomClass;
    }
    public function setBarCustomClass(string $customClass) : static
    {
        $this->barCustomClass = $customClass;
        return $this;
    }

    public function getBarTitle() : string|null
    {
        return $this->barTitle;
    }
    public function setBarTitle(string $barTitle) : static
    {
        $this->barTitle = $barTitle;
        return $this;
    }

    public function getBarHeight() : string|null
    {
        return $this->barHeight;
    }

    public function setBarHeight(string $height) : static
    {
        $this->barHeight = $height;
        return $this;
    }

    public function getBarBackgroundColor() : string|null
    {
        return $this->barBackgroundColor;
    }

    public function setBarBackgroundColor(string $colorClass) : static
    {
        $this->barBackgroundColor = $colorClass;
        return $this;
    }

    public function getBarTextColor() : string|null
    {
        return $this->barTextColor;
    }

    public function setBarTextColor(string $colorClass) : static
    {
        $this->barTextColor = $colorClass;
        return $this;
    }


    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
