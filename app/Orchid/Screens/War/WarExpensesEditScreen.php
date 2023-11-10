<?php

namespace App\Orchid\Screens\War;

use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\ArrayShape;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Screen;
use App\Models\Expenses;

class WarExpensesEditScreen extends Screen
{
    /**
     * @var Expenses|null
     */
    public Expenses|null $expenses = null;

    /**
     * @param Expenses $expenses
     * @return array
     */
    #[ArrayShape(['expenses' => "\App\Models\Expenses"])] public function query(Expenses $expenses): array
    {
        return [
            'expenses' => $expenses
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'War expenses edit';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Затрачено на войну с Украиной с 24.02.2022 г.';
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
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Label::make('id')
                    ->title('ID')
                    ->value($this->expenses->id)
                    ->horizontal(),
                Input::make('name')
                    ->type('text')
                    ->title('Статья расходов')
                    ->value($this->expenses->name)
                    ->horizontal(),
                Input::make('price')
                    ->type('number')
                    ->title('Сумма в рублях')
                    ->value($this->expenses->price)
                    ->horizontal(),
                Input::make('cost_per_second')
                    ->type('number')
                    ->title('Траты в секунду в рублях')
                    ->value($this->expenses->cost_per_second)
                    ->horizontal(),
                Input::make('refresh_interval_milliseconds')
                    ->type('number')
                    ->title('Интервал обновления в милисекундах')
                    ->value($this->expenses->refresh_interval_milliseconds)
                    ->horizontal(),
                Button::make('Сохранить')
                    ->class('btn btn-success')
                    ->method('createOrUpdate'),
                Button::make('Отмена')
                    ->class('btn btn-secondary mt-2')
                    ->action('javascript:history.back()'),
            ]),
        ];
    }

    public function buttonClickProcessing()
    {
        Alert::warning('Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.');
    }

    /**
     * @param Expenses $expenses
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Expenses $expenses, Request $request): RedirectResponse
    {
        $expenses->fill([
            'name' =>$request->get('name'),
            'price' => $request->get('price'),
            'cost_per_second' => $request->get('cost_per_second'),
            'refresh_interval_milliseconds' => $request->get('refresh_interval_milliseconds'),
        ])->save();

        Alert::info('You have successfully created a expenses.');

        return redirect()->route('platform.war.expenses');
    }
}