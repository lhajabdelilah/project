<?php

namespace App\Http\Controllers;

use App\Models\Voitures;
use App\Models\marques;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Http\Requests\VoitursRequest;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;

class VoitureController extends Controller
{

    public function __construct()
    {
        return $this->middleware('AdminMiddleware');
    }
    public function show($id){
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

    }

    public function find(Request $request)
    {
       $searchTerm = $request->input('s');
        $v = Voitures::where('Marque', 'LIKE',  $searchTerm )->get();
        if($v == null){
           return View('n_trouver');
        }else{
            return view('Voiture.serch',['voi'=>$v]);
        }
        
       
    }
       
   //affiche les voitures
    public function index()
    {
        $listV = Voitures::all();


        return View('Voiture.index', ['voi' => $listV]);
    }
    public function create()
    {
        $marques = marques::pluck('nom')->toArray();


        return view('Voiture.CreateVoiture',['marques'=>$marques]);
    }
    //enrigister une voi
    public function store(VoitursRequest $req)
    {
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
        return redirect('/Voiture');
    }
    //recuperer une voitures puis le met dans une formulaire
    public function edit($id)
    {
        $v =  Voitures::all();

        $this->authorize('update',$v);
        foreach ($v as $vo) {
            if ($vo->id == $id) {
                $voit = $vo;
                break;
            } else {
                $voit = 0;
            }
        }
        //recuperer la voiture de la base de donner
        // la methode find ne pas un objet  !!! le probleme 

        //
        return view('Voiture.editVoiture', ['voi' => $voit]);
    }
    // modifier une voitures
    public function update(Request $req, $id)
    {
        //la mthod find ne retourne rien
        $voit =  Voitures::all();

        foreach ($voit as $vo) {
            if ($vo->id == $id) {
                $v = $vo;
                break;
            } else {
                $v = 0;
            }
        }

        if ($req->hasFile('photos')) {
            $v->photos = $req->photos->store('image');
        }

        $v->id = $req->input('id');
        $v->CNI = Auth::user()->id;
        $v->Marque = $req->input('Marque');
        $v->Model = $req->input('Model');
        $v->Couleur = $req->input('Couleur');
        $v->Puissance = $req->input('Puissance');
        $v->Categorie = $req->input('Categorie');
        $v->Cous_par_jour = $req->input('Cous_par_jour');
        $v->Image = $req->input('Image');
        $v->save();
        session()->flash('success', 'la Voiture a etait bien Modifier !! ');
        return redirect('/Voiture');
    }
    // suprimer une une voitures
    public function destroy(Request $req, $id)
    {
        $voit = Voitures::all();
        foreach ($voit as $vo) {
            if ($vo->id == $id) {
                $v = $vo;
                break;
            } else {
                $v = 0;
            }
        }

        $v->delete();
        return redirect('/Voiture');
    }
}
