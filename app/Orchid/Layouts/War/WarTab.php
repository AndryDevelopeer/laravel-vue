<?php

namespace App\Orchid\Layouts\War;

use Orchid\Screen\Actions\Menu;
use Orchid\Screen\Layouts\TabMenu;

class WarTab extends TabMenu
{
    /**
     * Get the menu elements to be displayed.
     *
     * @return Menu[]
     */
    protected function navigations(): iterable
    {
        return [
            Menu::make('War Expenses')
                ->route('platform.war.expenses'),

            Menu::make('War Alternatives')
                ->route('platform.war.alternatives'),
        ];
    }
}