<?php

namespace App\Orchid\Screens\War;

use App\Models\Expenses;
use App\Orchid\Layouts\War\WarTab;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class WarExpensesEditScreen extends Screen
{
    /**
     * @var Expenses
     */
    public Expenses $expenses;

    public function __construct(Expenses $expenses)
    {
        $this->expenses = $expenses;
    }

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
        return 'War expenses';
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
            WarTab::class,
            Layout::rows([
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
                Button::make('Submit')
                    ->method('createOrUpdate'),
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
            'price' => $request->get('price')
        ])->save();

        Alert::info('You have successfully created a post.');

        return redirect()->route('platform.war.expenses');
    }
}