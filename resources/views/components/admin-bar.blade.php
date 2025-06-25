@use(Attargah\AdminBar\View\AdminBarRenderHook)

@if(auth()->check())

    <div
        class="fixed top-0 left-0 right-0 {{$barBackgroundColor}} {{$barTextColor}} flex items-center justify-between px-6 {{$barHeight}} shadow-md z-50 {{$barCustomClass ?? ''}}">
        <div class="flex items-center space-x-6">
            {{ \Filament\Support\Facades\FilamentView::renderHook(AdminBarRenderHook::BEFORE_TITLE) }}

            @if(empty($logoUrl))
                <div class="text-lg {{$barTitleFont}} p-3">{{$barTitle ?? trans('admin_panel')}}</div>
            @else
                <div class="flex items-center space-x-2 p-2">
                    <a href="{{ route('filament.admin.pages.dashboard') }}" class="flex items-center">
                        <img src="{{$logoUrl}}" alt="Logo" class="{{$logoHeight}} w-auto"/>
                    </a>
                </div>
            @endif
            {{ \Filament\Support\Facades\FilamentView::renderHook(AdminBarRenderHook::AFTER_TITLE) }}
        </div>


        <div class="flex items-center space-x-6">
            {{ \Filament\Support\Facades\FilamentView::renderHook(AdminBarRenderHook::BEFORE_AUTH_MENU) }}
            @if($isAuthMenuEnable)
            <div class="relative group">
                <button
                    class="px-3 py-1 rounded {{$barMenuTitleFont}} flex items-center gap-1"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    {{ucwords(auth()->user()->name)}}
                    <svg class="w-3 h-3 mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div
                    class="absolute right-0 mt-1 w-40 bg-white rounded shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 pointer-events-auto">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="multiLevelDropdownButton">

                        {{ \Filament\Support\Facades\FilamentView::renderHook(AdminBarRenderHook::BEFORE_AUTH_MENU_ITEMS) }}
                        <li>
                            <a href="{{ route('filament.admin.pages.dashboard') }}"
                               class="block px-4 py-2 break-words {{$barMenuItemsFont}} whitespace-normal hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                {{trans('dashboard')}}
                            </a>
                        </li>
                        {{ \Filament\Support\Facades\FilamentView::renderHook(AdminBarRenderHook::BETWEEN_AUTH_MENU_ITEMS) }}
                        <li>
                            <form action="{{ route('filament.admin.auth.logout') }}" method="POST" class="m-0 w-full">
                                @csrf
                                <button type="submit"
                                        class="block break-words {{$barMenuItemsFont}} whitespace-normal px-4 py-2 hover:bg-gray-100 w-full text-start dark:hover:bg-gray-600 dark:hover:text-white">
                                    {{trans('sign_out')}}
                                </button>
                            </form>

                        </li>

                        {{ \Filament\Support\Facades\FilamentView::renderHook(AdminBarRenderHook::AFTER_AUTH_MENU_ITEMS) }}
                    </ul>

                </div>
            </div>
            @endif
            {{ \Filament\Support\Facades\FilamentView::renderHook(AdminBarRenderHook::AFTER_AUTH_MENU) }}


        </div>
    </div>

    <div class="h-12"></div>
@endif
