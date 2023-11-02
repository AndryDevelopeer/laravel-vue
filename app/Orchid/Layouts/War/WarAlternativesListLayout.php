<?php

namespace App\Orchid\Layouts\War;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Carbon;
use App\Models\Alternative;
use Orchid\Screen\TD;

class WarAlternativesListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'alternative';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Альтернатива')
                ->render(function (Alternative $alternative) {
                    return Link::make($alternative->name)
                        ->route('platform.war.alternatives.edit', $alternative);
                }),
            TD::make('price', 'Стоимость за единицу')
                ->render(function (Alternative $alternative) {
                    return number_format($alternative->price, 0, ',', ' ');
                }),
            TD::make('created_at', 'Запись создана')
                ->render(function (Alternative $alternative) {
                    return Carbon::parse($alternative->created_at)->format('d.m.Y H:i:s');
                }),
            TD::make('updated_at', 'Запись обновлена')
                ->render(function (Alternative $alternative) {
                    return Carbon::parse($alternative->updated_at)->format('d.m.Y H:i:s');
                }),
            TD::make('')
                ->render(function (Alternative $alternative) {
                    return Button::make('')
                        ->name('Удалить')
                        ->class('btn btn-danger')
                        ->parameters(['_method' => 'POST', '_token' => csrf_token(), 'alternative' => $alternative->id])
                        ->method('deleteAlternative');
                }),
        ];
    }
}
