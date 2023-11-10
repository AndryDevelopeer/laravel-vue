<?php

namespace App\Orchid\Screens\War;

use App\Models\Expenses;
use App\Orchid\Layouts\War\WarExpensesListLayout;
use App\Orchid\Layouts\War\WarTab;
use JetBrains\PhpStorm\ArrayShape;
use Orchid\Screen\Action;
use Orchid\Screen\Layout;
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
        return 'War expenses';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "Затраты на войну";
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
     * @return Layout[]
     */
    public function layout(): iterable
    {
        return [
            WarTab::class,
            WarExpensesListLayout::class
        ];
    }
}
