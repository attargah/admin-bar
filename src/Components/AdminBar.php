<?php

namespace Attargah\AdminBar\Components;

use Attargah\AdminBar\AdminBarPlugin;
use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewType;
use Illuminate\View\Component;

class AdminBar extends Component
{
    public null|string $logoUrl;
    public null|string $logoHeight;

    public null|string $barTitle;
    public null|string $barHeight;
    public null|string $barBackgroundColor;
    public null|string $barTextColor;
    public null|string $barCustomClass;
    public string $barTitleFont;
    public string $barMenuTitleFont;
    public string $barMenuItemsFont;

    public bool $isAuthMenuEnable;


    public function __construct()
    {
        $plugin = AdminBarPlugin::get();

        $this->logoUrl = $plugin->getLogoUrl();
        $this->barTitle = $plugin->getBarTitle();
        $this->barHeight = $plugin->getBarHeight();
        $this->barBackgroundColor = $plugin->getBarBackgroundColor();
        $this->barTextColor = $plugin->getBarTextColor();
        $this->logoHeight = $plugin->getLogoHeight();
        $this->barCustomClass = $plugin->getbarCustomClass();
        $this->isAuthMenuEnable = $plugin->isAuthMenuEnable();
        $this->barTitleFont = $plugin->getBarTitleFont();
        $this->barMenuTitleFont = $plugin->getBarMenuTitleFont();
        $this->barMenuItemsFont = $plugin->getBarMenuItemsFont();

    }

    public function render(): ViewType|Closure|string
    {
        if (View::exists('components.admin-bar')) {
            return view('components.admin-bar');
        }


        return view('admin-bar::components.admin-bar');
    }
}
