<?php

namespace App\Orchid\Screens\War;

use App\Orchid\Layouts\War\WarTab;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Fields\Radio;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class WarAlternativesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'name' => 'Hello! We collected all the fields in one place',
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'War alternatives';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Альтернативные способы потратить деньги';
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

                Input::make('number')
                    ->type('number')
                    ->title('Сумма в рублях')
                    ->value(42)
                    ->horizontal(),

                Button::make('Submit')
                    ->method('buttonClickProcessing'),
                    //->type(NCURSES_COLOR_BLUE),

            ]), //->title('Textual HTML5 Inputs'),

        ];
    }

    public function buttonClickProcessing()
    {
        Alert::warning('Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.');
    }
}