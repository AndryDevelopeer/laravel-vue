<?php

namespace App\Orchid\Screens\War;

use App\Orchid\Layouts\War\WarAlternativesListLayout;
use Illuminate\Http\RedirectResponse;
use App\Orchid\Layouts\War\WarTab;
use JetBrains\PhpStorm\ArrayShape;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Actions\Link;
use App\Models\Alternative;
use Orchid\Screen\Action;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class WarAlternativesListScreen extends Screen
{
    /**
     * @return array
     */
    #[ArrayShape(['alternative' => 'mixed'])] public function query(): array
    {
        return [
            'alternative' => Alternative::paginate()
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
        return [
            Link::make('Создать')
            ->class('btn btn-primary')
            ->route('platform.war.alternatives.create')
        ];
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
            WarAlternativesListLayout::class
        ];
    }

    public function buttonClickProcessing()
    {
        Alert::warning('Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.');
    }

    /**
     * @param Alternative $alternative
     *
     * @return RedirectResponse
     */
    public function deleteAlternative(Alternative $alternative): RedirectResponse
    {
        $alternative->delete();

        Alert::info('Запись успешно удалена.');

        return redirect()->route('platform.war.alternatives');
    }
}
