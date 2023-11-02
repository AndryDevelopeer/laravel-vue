<?php

namespace App\Orchid\Screens\War;

use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\ArrayShape;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Illuminate\Http\Request;
use App\Models\Alternative;
use Orchid\Screen\Action;
use Orchid\Screen\Screen;

class WarAlternativeEditScreen extends Screen
{
    /**
     * @var Alternative|null
     */
    public Alternative|null $alternative = null;

    /**
     * @param Alternative $alternative
     * @return array
     */
    #[ArrayShape(['alternative' => "\App\Models\Alternative"])] public function query(Alternative $alternative): array
    {
        return [
            'alternative' => $alternative
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Alternative expenses edit';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Альтернативная трата вместо войны';
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
                    ->title($this->alternative->id ? 'ID' : '')
                    ->value($this->alternative->id)
                    ->horizontal(),
                Input::make('name')
                    ->type('text')
                    ->title('Название альтернативы')
                    ->value($this->alternative->name)
                    ->horizontal(),
                Input::make('price')
                    ->type('number')
                    ->title('Стоимость реализации за единицу')
                    ->value($this->alternative->price)
                    ->horizontal(),
                Button::make('Сохранить')
                    ->class('btn btn-success')
                    ->method('createOrUpdate'),
            ]),
        ];
    }

    public function buttonClickProcessing()
    {
        Alert::warning('Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.');
    }

    /**
     * @param Alternative $alternative
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Alternative $alternative, Request $request): RedirectResponse
    {
        $alternative->fill([
            'name' => $request->get('name'),
            'price' => $request->get('price')
        ])->save();

        Alert::info('You have successfully created a post.');

        return redirect()->route('platform.war.alternatives');
    }
}
