<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Airplane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uId = Auth::id(); 
    
        $bids = Bid::where('userId', $uId) ->orderBy('created_at','desc')-> paginate(8);
        return view('bids.index',[
            'bids' => $bids,
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
    public function create($airplaneID)
    {
        //

        $airplane = Airplane::findOrFail($airplaneID);
        return view('bids.create',['airplaneID' => $airplaneID, 'airplane' => $airplane]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uId = Auth::id(); 
        
        $airplane = Airplane::findOrFail($request->airplaneID);
        // //validation rules
    $rules = [
        'bidValue' => 'numeric',
    ];
    //custom validation error messages
    $messages = [
        
        
    ];
    //First Validate the form data
    $request->validate($rules,$messages);
    //Create an Airplane
    $bid = new Bid;

    if($request->bidValue > $airplane->current2 + $airplane->increment2)
{  
    $bid->fill(['bidValue' => $request->bidValue,
     'userID' => $uId,
     'airplaneID' => $request->airplaneID,
     'planeName' => $airplane->name,
     'planeModel' => $airplane->model]);


    $bid->save(); // save it to the database.

    $airplane->fill(['current2' => $request->bidValue]);
    $airplane->save();
    //Redirect to a specified route with flash message.
    return redirect()
        ->route('bids.index')
        ->with('status', 'You have successfully bid on an Airplane');
}
else
{

    return redirect()->route('bids.index')->with('status', 'Your bid did not exceed the current bid plus minimum increase');
}
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

        $bid = Bid::findOrFail($id);
        $airplane = Airplane::findOrFail($bid->airplaneID);
        //$todo = Todo::where('title','this is title')->firstOrFail(); example of another way to search by a dif column
        return view('bids.show',[
            'bid' => $bid, 'airplane' => $airplane
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
    $bid = Bid::findOrFail($id);
    return view('bids.edit',[
        'bid' => $bid,
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
        $uId = Auth::id(); 
              // //validation rules
              $rules = [
                'bidValue' => 'numeric',
            ];
            //custom validation error messages
            $messages = [
                
                
            ];
            //First Validate the form data
            $request->validate($rules,$messages);
     //Update an Airplane
     $bid        = Bid::findOrFail($id);
      
        
        $bid->fill(['bidValue' => $request->bidValue]);
   $bid->save(); // save it to the database.
          //Redirect to a specified route with flash message.
    return redirect()
        ->route('bids.show',$id)
        ->with('status', 'Updated the Bid');
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
        //Delete the Bid
    $bid = Bid::findOrFail($id);
    $bid->delete();
    //Redirect to a specified route with flash message.
    return redirect()
        ->route('bids.index')
        ->with('status','Deleted the selected Bid!');
    }
}
