<?php

use App\Http\Controllers\VoitureController;
use App\Models\Voitures;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\MailController;
use App\Models\locations;
use App\Models\marques;
use App\Models\User;
use App\Http\Requests\VoitursRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Mail;
use App\Mail\Test;
use App\Models\contacts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/send',function (){

    Mail::to('abdelilahaitlhaj455@gmail.com')->send(new Test());

    return response('sending');
});






Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('AdminMiddleware');




Route::get('/pay', [App\Http\Controllers\PaymentController::class, 'index'])->name('index');




Route::get('/', function () {

    $v = Voitures::paginate(6);

    return view('Home_v', ['voi' => $v]);
});





Route::get('/Clients', function () {

    $c = User::all();


    return view('Clients', ['cl' => $c]);
});















Route::get('/about', function () {
    return view('about');
});
Route::get('contacts/show' ,[App\Http\Controllers\ContactsController::class, 'show'] );
Route::post('contacts/store' ,[App\Http\Controllers\ContactsController::class, 'store'] );
Route::get('message' ,function(){
$message= contacts::all();
return view("messages",['message'=>$message]);
});



Route::get('Voiture/create', function(){
    $marques = marques::pluck('nom')->toArray();


    return view('Voiture.CreateVoiture',['marques'=>$marques]);
});
Route::get('Voiture/store',function(VoitursRequest $req){


    $v = new Voitures();
    $path=$req->file('image')->store('image','public');
    $v->photos=$path;
    $v->id = $req->input('id');
    $v->CNI = Auth::user()->id;
    $v->Marque = $req->input('Marque');
    $v->Model = $req->input('Model');
    $v->Couleur = $req->input('Couleur');
    $v->Puissance = $req->input('Puissance');
    $v->Categorie = $req->input('Categorie');
    $v->Cous_par_jour = $req->input('Cous_par_jour');
    $v->nbp=$req->input('nbp');
    $v->save();
    session()->flash('success', 'la Voiture a etait bien enrigistrer !! ');

});
Route::get('Voiture/find', function(Request $request){
    $searchTerm = $request->input('s');
    $v = Voitures::where('Marque', 'LIKE',  $searchTerm )->get();
    if($v == null){
       return View('n_trouver');
    }else{
        return view('Voiture.serch',['voi'=>$v]);
    }
}) ;
Route::get('Voiture/{id}/show',function($id){
    $listV = Voitures::all();
    foreach($listV as $v){
        if($v->id==$id){
            $voi=$v;
            break;
        }else{
            $voi=null ;
        }

    }
    return View('Voiture.ShowVoiture', ['v' => $voi]); 

});

Route::get('Voiture', [App\Http\Controllers\VoitureController::class, 'index']);
Route::get('Voiture/{id}/edit', [App\Http\Controllers\VoitureController::class, 'edit'])->name('editVoiture');
Route::put('Voiture/{id}/update', [App\Http\Controllers\VoitureController::class, 'update'])->name('udateVoiture');
Route::delete('Voiture/{id}/destroy', [App\Http\Controllers\VoitureController::class, 'destroy'])->name('deleteVoiture');
Route::post('Voiture/find', function(Request $request){
    $searchTerm = $request->input('s');
    $v = Voitures::where('Marque', 'LIKE',  $searchTerm )->get();
    if($v == null){
       return View('n_trouver');
    }else{
        return view('Voiture.serch',['voi'=>$v]);
    }
});



Auth::routes();






Route::get('/Locations', function () {

    $c = locations::all();


    return view('Location.index', ['loc' => $c]);
});
Route::get('Location/{id}/create', [App\Http\Controllers\LocationController::class, 'create'])->name('create');
Route::get('/Location/{id}/store', [App\Http\Controllers\LocationController::class, 'store']);
Route::get('/Location/{id}/edit', [App\Http\Controllers\LocationController::class, 'edit']);
Route::get('/Location', [App\Http\Controllers\LocationController::class, 'index']);






/*
|--------------------------------------------------------------------------
| Paypal Route
|--------------------------------------------------------------------------
*/
Route::get('/payment/success', [PaypalController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/cancel', [PaypalController::class, 'paymentCancel'])->name('payment.cancel');


// routes/web.php
Route::get('messages/reply/{id}', [App\Http\Controllers\MessageController::class, 'replay'])->name('messages.reply');
Route::delete('messages/delete/{id}', [App\Http\Controllers\MessageController::class, 'delete'])->name('messages.delete');
Route::get('messages/sendReplay/{id}',[App\Http\Controllers\MessageController::class, 'sendreplay'])->name('messages.sendReplay');



