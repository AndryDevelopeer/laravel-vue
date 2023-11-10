<?php

namespace App\Orchid\Layouts\War;

use App\Models\Expenses;
use Illuminate\Support\Carbon;
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
            TD::make('price', 'Всего потрачено')
                ->render(function (Expenses $expenses) {
                    return number_format($expenses->price, 0, ',', ' ');
                }),
            TD::make('cost_per_second', 'Тратится в секунду')
                ->render(function (Expenses $expenses) {
                    return number_format($expenses->cost_per_second, 0, ',', ' ');
                }),
            TD::make('refresh_interval_milliseconds', 'Интервал обновления на сайте (мсек.)')
                ->render(function (Expenses $expenses) {
                    return number_format($expenses->refresh_interval_milliseconds, 0, ',', ' ');
                }),
            TD::make('created_at', 'Создано')
                ->render(function (Expenses $expenses) {
                    return Carbon::parse($expenses->created_at)->format('d.m.Y H:i:s');
                }),
            TD::make('updated_at', 'Обновлено')
                ->render(function (Expenses $expenses) {
                    return Carbon::parse($expenses->updated_at)->format('d.m.Y H:i:s');
                }),
        ];
    }
}
