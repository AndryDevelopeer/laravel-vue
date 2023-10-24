<?php

namespace App\Orchid\Screens\War;

use App\Models\Expenses;
use App\Orchid\Layouts\War\WarExpensesListLayout;
use App\Orchid\Layouts\War\WarTab;
use JetBrains\PhpStorm\ArrayShape;
use Orchid\Screen\Action;
use Orchid\Screen\Screen;

class WarExpensesListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    #[ArrayShape(['expenses' => "mixed"])] public function query(): iterable
    {
        return [
            'expenses' => Expenses::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Expenses';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return iterable
     */
    public function layout(): iterable
    {
        return [
            WarTab::class,
            WarExpensesListLayout::class
        ];
    }
}
