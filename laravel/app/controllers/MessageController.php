<?php

class MessageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return Response::json(Message::orderBy('id', 'desc')->take(5)->get());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$msg = new Message;
        $msg->user_name = Input::get('user_name');
        $msg->msg      = Input::get('message');
        
        $msg->save();

		return Response::json(array('success' => true));
	}


	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show()
	{
		$msg = Message::orderBy('id', 'desc')->get();

        // show the edit form and pass the nerd
        return View::make('messages.show')
            ->with('messages', $msg);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the nerd
        $msg = Message::find($id);

        // show the edit form and pass the nerd
        return View::make('messages.edit')
            ->with('message', $msg);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$msg = Message::find($id);
        $msg->user_name = Input::get('user_name');
        $msg->msg      = Input::get('msg');
        
        $msg->save();

		return Redirect::to('index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		//Message::destroy($id);

		$msg = Message::find($id);
		$msg->delete();

		return Response::json(array('success' => true));
	}


}
