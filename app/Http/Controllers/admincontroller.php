<?php

namespace App\Http\Controllers;
use App\Models\Voitures;
use Illuminate\Http\Request;
use App\Models\User ;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
public function index(){
if (Auth::id())
$role= Auth()->user()->Role;
if($role=0){
    $v = Voitures::all();

    return view('Home_v',['voi'=>$v]);
}else{

    return view('admin');
}

}
}
