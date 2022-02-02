<?php

namespace App\Http\Controllers;

use App\Airplane;
use Illuminate\Http\Request;

class AirplanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airplanes = Airplane::orderBy('created_at','desc')->paginate(8);
        return view('airplanes.index',[
            'airplanes' => $airplanes,
        ]);
/*
        Todo::where('completed',true)->take(8)->get(); // only take 8 todos from the database. <- just an example, we don't have completed column
Todo::where('title','LIKE',"{%}$search_keyword{%}")->get(); // with LIKE operator.
Todo::where('title','LIKE',"{%}$search_keyword{%}")->take(8)->get(); //retrieve only 8 results.
Todo::select(['title','body'])->findOrFail(id); // for specific columns, you can also chain where() with select().
Todo::where('title','value')->whereOr('body','value')->firstOrFail(); // with SQL OR operator
Todo::where('title','value')->whereAnd('body','value')->firstOrFail(); // with SQL AND operator.
*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('airplanes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //validation rules
    $rules = [
        'model' => 'required|string|min:5|max:191',
        'parts'  => 'required|string|min:5|max:1000',
        'built' => 'required|date',
        'name' => 'required|string|unique:airplanes,name|min:5',
        'outright2' => 'numeric',
        'increment2' => 'numeric',
        'current2' => 'numeric'
    ];
    //custom validation error messages
    $messages = [
        'name.unique' => 'Airplane Name should be unique', //syntax: field_name.rule
        'built.date' => 'Date is not correct',
        
    ];
    //First Validate the form data
    $request->validate($rules,$messages);
    //Create an Airplane
    $airplane = new Airplane;
    $airplane->model = $request->model;

    $airplane->built = $request->built;
    $airplane->name = $request->name;
    $airplane->current2 = $request->current2;
    $airplane->increment2 = $request->increment2;
    $airplane->outright2 = $request->outright2;
    $airplane->parts = $request->parts;
    
    $airplane->fill(['current2' => $request->current2,
     'increment2' => $request->increment2,
     'outright2' => $request->outright2, 
     'model' => $request->model,
      'name' => $request->name,
       'built' => date('Y-m-d', strtotime($request->built)), 'parts' => $request->parts]);


    $airplane->save(); // save it to the database.
    //Redirect to a specified route with flash message.
    return redirect()
        ->route('airplanes.index')
        ->with('status', 'Created a new Airplane');

        /*$request->input('field_name'); // access an input field
$request->has('field_name'); // check if field exists
$request->title; // dynamically access input fields
request('key') // you can use this global helper if needed inside a view


return redirect('/todos'); // to a specific url
return redirect(url('/todos')); // to a specific url with url helper
return redirect(url()->previous()); // to a previous url
return redirect()->back(); // redirect back (same as above)
*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $airplane = Airplane::findOrFail($id);

        //$todo = Todo::where('title','this is title')->firstOrFail(); example of another way to search by a dif column
        return view('airplanes.show',[
            'airplane' => $airplane,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            //Find a Airplane by it's ID
    $airplane = Airplane::findOrFail($id);
    return view('airplanes.edit',[
        'airplane' => $airplane,
    ]);
    }
    public function bid($id)
    {
            //Find a Airplane by it's ID
    $airplane = Airplane::findOrFail($id);
    return view('airplanes.bid',[
        'airplane' => $airplane,
    ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
              // //validation rules
    $rules = [
        'model' => 'required|string|min:5|max:191',
        'parts'  => 'required|string|min:5|max:1000',
        'built' => 'date',
        'name' => 'required|string|min:5',
        'outright2' => 'numeric',
        'increment2' => 'numeric',
        'current2' => 'numeric'
    ];
    //custom validation error messages
    $messages = [
        'name.unique' => 'Airplane Name should be unique', //syntax: field_name.rule
        'built.date' => 'Date is not correct',
        
    ];
    //First Validate the form data
    $request->validate($rules,$messages);
    
     //Update an Airplane
     $airplane        = Airplane::findOrFail($id);
      /*   $airplane->model = $request->model;
        $airplane->parts = $request->parts;
        $airplane->built = date('Y-m-d', strtotime($request->built));
        $airplane->name = $request->name;
        $airplane->outright2 = $request->outright2;
        $airplane->current2 = $request->current2;
        $airplane->increment2 = $request->increment2;
         */
        
        $airplane->fill(['current2' => $request->current2,
         'increment2' => $request->increment2,
          'outright2' => $request->outright2, 
          'model' => $request->model, 
          'name' => $request->name, 
          'built' =>  date('Y-m-d', strtotime($request->built)), 'parts' => $request->parts]);
   $airplane->save(); // save it to the database.
          //Redirect to a specified route with flash message.
    return redirect()
        ->route('airplanes.show',$id)
        ->with('status', 'Updated the Airplane');
    }
    public function bidUpdate(Request $request, $id)
    {
              // //validation rules
    $rules = [
        'model' => 'required|string|min:5|max:191',
        'parts'  => 'required|string|min:5|max:1000',
        'built' => 'date',
        'name' => 'required|string|min:5',
        'outright2' => 'numeric',
        'increment2' => 'numeric',
        'current2' => 'numeric',
        
    ];
    //custom validation error messages
    $messages = [
        'name.unique' => 'Airplane Name should be unique', //syntax: field_name.rule
        'built.date' => 'Date is not correct',
        
    ];
    //First Validate the form data
    $request->validate($rules,$messages);
    
     //Update an Airplane
     $airplane        = Airplane::findOrFail($id);
      /*   $airplane->model = $request->model;
        $airplane->parts = $request->parts;
        $airplane->built = date('Y-m-d', strtotime($request->built));
        $airplane->name = $request->name;
        $airplane->outright2 = $request->outright2;
        $airplane->current2 = $request->current2;
        $airplane->increment2 = $request->increment2;
         */
        
        $airplane->fill(['current2' => $request->current2,
         'increment2' => $request->increment2,
          'outright2' => $request->outright2, 
          'model' => $request->model, 
          'name' => $request->name, 
          'built' =>  date('Y-m-d', strtotime($request->built)), 'parts' => $request->parts]);
   $airplane->save(); // save it to the database.
          //Redirect to a specified route with flash message.
    return redirect()
        ->route('airplanes.show',$id)
        ->with('status', 'Updated the Airplane');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //Delete the Airplane
    $airplane = Airplane::findOrFail($id);
    $airplane->delete();
    //Redirect to a specified route with flash message.
    return redirect()
        ->route('airplanes.index')
        ->with('status','Deleted the selected Airplane!');
    }
}
