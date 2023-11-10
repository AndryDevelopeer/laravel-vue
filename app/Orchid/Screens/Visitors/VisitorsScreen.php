<?php

namespace App\Orchid\Screens\Visitors;

use App\Models\Visitor;
use App\Orchid\Layouts\Visitors\ChartVisitors;
use Orchid\Screen\Screen;

class VisitorsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'charts' => Visitor::getChartsByMonth(),
            '1' => [
                [
                    'name'   => 'docker',
                    'values' => [25, 40, 30, 35, 8, 52, 17, 36],
                    'labels' => ['ноябрь', 'декабрь', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь'],
                ],
                [
                    'name'   => 'Another Set',
                    'values' => [25, 50, 10, 15, 18, 32, 27, 42],
                    'labels' => ['ноябрь', 'декабрь', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь'],
                ],
            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Visitors';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Посетители сайта';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @throws \Throwable
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            ChartVisitors::make('charts', 'Actions with a Tweet')
                ->description('Пользователи сайта'),
        ];
    }
}
