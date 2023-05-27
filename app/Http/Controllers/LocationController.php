<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\locations;
use Facade\FlareClient\View;
use App\Models\Voitures;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\VoitursRequest;
use Carbon\Carbon;

class LocationController extends Controller
{

    public function calculateRentalDays(Request $request)
    {
        $start_date = Carbon::parse($request->input('start_date'));
        $end_date = Carbon::parse($request->input('end_date'));

        $rental_days = $end_date->diffInDays($start_date);

        // Envoi de la valeur à PayPalPaymentController
        $paypalController = new PayPalController();
        $paypalController->handlePayment($rental_days);

        // Faites ce que vous souhaitez avec le nombre de jours de location (par exemple, l'enregistrer dans la base de données)

        return response()->json(['rental_days' => $rental_days]);
    }









    public function index()
    {
        $loc = locations::all();
        return view('Location.index', ['loc' => $loc]);
    }
    public function create()
    {
        return view('Location.createLocation');
    }
    public function store(Request $request, $id)
    {

        $listv = Voitures::all();
        foreach ($listv as $v) {
            if ($v->id == $id) {
                break;
            }
        }

        $location = new locations();
        $location->car_id = $id;
        $location->client_name = $request->input('nom');
        $location->start_date = $request->input('date_d');
        $location->end_date = $request->input('date_f');
        $location->type_payment = $request->input('payment');
        $location->Telephone = $request->input('telephone');
        $location->amount = 1000.34;
        $date1 = Carbon::parse($location->start_date);
        $date2 = Carbon::parse($location->end_date);
        $nbd = $date1->diffInDays($date2);
        $nbd = $nbd * 250;

        $location->save();
        return view('Payment.index', ['nb' => $nbd]);
    }
    public function edit($id)
    {

        $listv = Voitures::all();
        foreach ($listv as $v) {
            if ($v->id == $id) {
                break;
            }
        };
        return view('Location.edit', compact('location'));
    }
    public function update(Request $request, $id)
    {
        $location = locations::find($id);
        $location->name = $request->name;
        $location->address = $request->address;
        $location->save();
        return redirect()->route('locations.index');
    }
    public function destroy($id)
    {
        $location = locations::find($id);
        $location->delete();
        return redirect()->route('locations.index');
    }
}
