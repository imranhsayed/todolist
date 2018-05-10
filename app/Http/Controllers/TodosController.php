<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the data from the todos database table
//	    $todos = Todo::all();
	    $todos = Todo::orderBy( 'created_at', 'desc' )->get();
	    return view( 'todos.index', compact( 'todos' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'todos.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
	    $this->validate( request(), [
	    	'text' => 'required',
		    'body' => 'required',
		    'due' => 'required',
	    ] );

    	// Store the data into database
	    $todos = new Todo;
	    $todos->text = $request->input( 'text' );
	    $todos->body = $request->input( 'body' );
	    $todos->due = $request->input( 'due' );
	    $todos->save();

	    return redirect( url( '/' ) )->with( 'success', 'Your data has been saved' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todos = Todo::find( $id );
    	return view( 'todos.show',compact( 'todos' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $todos = Todo::find( $id );
	    return view( 'todos.edit',compact( 'todos' ) );
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
	    // Updates the data into database
	    $todos = Todo::find( $id );
	    $todos->text = $request->input( 'text' );
	    $todos->body = $request->input( 'body' );
	    $todos->due = $request->input( 'due' );
	    $todos->save();

	    return redirect( url( '/' ) )->with( 'success', 'Your data has been updated' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find( $id );
        $todo->delete();
	    return redirect( url( '/' ) )->with( 'success', 'Your data has been deleted' );
    }
}
