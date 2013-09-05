<?php

class ClienteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

	    $users = User::with('enderecos')->where('id', Auth::User()->id)->get();
	 
	    return Response::json(array(
	        'error' => false,
	        'customer' => $users->toArray()),
	        200
	    );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

	    $user = new User(\Input::all());

		if ( $user->save() ) {
	 
		    return Response::json(array(
		        'error' => false,
		        'user' => $user->toArray()),
		        200
		    );

		} else {

			return Response::json(array(
		        'error' => true,
		        'errors' => $user->errors()->all()),
		        400
		    );

		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {

    	$url = Url::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->take(1)
            ->get();
 
	    return Response::json(array(
	        'error' => false,
	        'urls' => $url->toArray()),
	        200
	    );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    $url = Url::where('user_id', Auth::user()->id)->find($id);
 
    if ( Request::get('url') )
    {
        $url->url = Request::get('url');
    }
 
    if ( Request::get('description') )
    {
        $url->description = Request::get('description');
    }
 
    $url->save();
 
    return Response::json(array(
        'error' => false,
        'message' => 'url updated'),
        200
    );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
$url = Url::where('user_id', Auth::user()->id)->find($id);
 
    $url->delete();
 
    return Response::json(array(
        'error' => false,
        'message' => 'url deleted'),
        200
        );
	}

}