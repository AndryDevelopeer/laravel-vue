<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use ipinfo\ipinfo\IPinfoException;
use App\Models\Alternative;
use ipinfo\ipinfo\IPinfo;
use App\Models\Expenses;
use App\Models\Visitor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $expenses = Expenses::first();
        $alternatives = Alternative::all();

        try {
            $client = new IPinfo(env('IP_INFO_KEY'));
            $details = $client->getDetails(request()->ip());
            $country = $details->country_name;
            $city = $details->city;
        } catch (IPinfoException $e) {
            //@TODO логировать
        } finally {
            Visitor::create([
                'country' => $country ?? null,
                'city' => $city ?? null,
                'ip_address' => request()->ip(),
                'device' => request()->header('User-Agent'),
            ]);

            return view('index', [
                'amount' => $expenses->price ?? 0,
                'costPerSecond' => $expenses->cost_per_second ?? 0,
                'refreshInterval' => $expenses->refresh_interval_milliseconds ?? 0,
                'alternatives' => $alternatives
            ]);
        }
    }
}
