<?php


namespace App\Http\Controllers;

use App\Airplane;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

class AirplaneController extends Controller
{

  public function index()
  {
      return view('welcome');
  }
  public function storeAirplane(Request $request) {
    $airplane = new Airplane();
    $airplane->model = $request->model;
    
    $airplane->built = $request->built;
    $airplane->name = $request->name;
    $airplane->current2 = $request->current;
    $airplane->increment2 = $request->increment;
    $airplane->outright2 = $request->outright;
    $airplane->parts = $request->parts;
    $airplane->save();

    return $airplane;
}


public function getAirplanes(Request $request) {
  $airplanes = Airplane::all();

  return $airplanes;
}

public function deleteAirplane(Request $request){
  $airplane = Airplane::find($request->id)->delete();
}

public  function editAirplane(Request $request, $id){
  $airplane = Airplane::where('id',$id)->first();

  $airplane->name = $request->get('val_1');
  $airplane->model = $request->get('val_2');
  $airplane->built = $request->get('val_3');
  $airplane->parts = $request->get('val_4');
  $airplane->current2 = $request->get('val_5');
  $airplane->increment2 = $request->get('val_6');
  $airplane->outright2 = $request->get('val_7');
  $airplane->save();

  return $airplane;
}
  
}