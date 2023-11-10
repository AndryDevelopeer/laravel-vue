<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\AsSource;

class Visitor extends Model
{
    use SoftDeletes, HasFactory, AsSource;

    protected $fillable = ['country', 'ip_address', 'device'];

    protected array $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    static function getChartsByMonth(): array
    {
        $data = DB::table('visitors')
            ->select(DB::raw('IFNULL(country, "не известно") as name, COUNT(*) as `values`, DATE_FORMAT(created_at, "%M") as labels'))
            ->groupBy('name', 'labels')
            ->orderByRaw('MONTH(created_at)')
            ->get()
            ->groupBy('name')
            ->map(function ($group) {
                return [
                    'name' => $group->first()->name,
                    'values' => $group->pluck('values')->toArray(),
                    'labels' => $group->pluck('labels')->toArray(),
                ];
            })
            ->values()
            ->toArray();

        return $data;
    }
}
