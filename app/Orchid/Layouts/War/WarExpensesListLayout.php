<?php

namespace App\Orchid\Layouts\War;

use App\Models\Expenses;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class WarExpensesListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'expenses';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Статья')
                ->render(function (Expenses $expenses) {
                    return Link::make($expenses->name)
                        ->route('platform.war.expenses.edit', $expenses);
                }),
            TD::make('price', 'Всего потрачено'),
            TD::make('created_at', 'Создано'),
            TD::make('updated_at', 'Обновлено'),
        ];
    }
}
