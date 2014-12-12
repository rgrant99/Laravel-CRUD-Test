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
		/*
		SELECT 
		parent.id,
		parent.parent_id,
		parent.user_name,
		parent.msg,
		parent.created_at,
		child.id AS c_id,
		child.parent_id AS c_parent_id,
		child.user_name AS c_user_name,
		child.msg AS c_msg,
		child.created_at AS c_created_at
		    FROM messages AS parent
		         LEFT JOIN messages AS child 
		         ON child.parent_id = parent.id
		   WHERE parent.parent_id='0'
		ORDER BY parent.id DESC, c_id DESC
		LIMIT 5 */

		//return Response::json(Message::orderBy('id', 'desc')->take(5)->get());
		$results = DB::table("messages AS parent")
					->select(DB::raw("parent.id,
									parent.parent_id,
									parent.user_name,
									parent.msg,
									parent.created_at,
									child.id AS c_id,
									child.parent_id AS c_parent_id,
									child.user_name AS c_user_name,
									child.msg AS c_msg,
									child.created_at AS c_created_at"))
					 ->leftJoin('messages AS child', 'child.parent_id', '=', 'parent.id')
					 ->where('parent.parent_id','=','0')
					 ->orderBy('parent.id', 'desc')
					 ->orderBy('c_id', 'desc')
					 ->take(5)
					 ->get();

		return Response::json($results);
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
        $msg->parent_id      =  intval(Input::get('parentId'));

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
		//$msg = Message::orderBy('id', 'desc')->get();

		$msg = DB::table("messages AS parent")
					->select(DB::raw("parent.id,
									parent.parent_id,
									parent.user_name,
									parent.msg,
									parent.created_at,
									child.id AS c_id,
									child.parent_id AS c_parent_id,
									child.user_name AS c_user_name,
									child.msg AS c_msg,
									child.created_at AS c_created_at"))
					 ->leftJoin('messages AS child', 'child.parent_id', '=', 'parent.id')
					 ->where('parent.parent_id','=','0')
					 ->orderBy('parent.id', 'desc')
					 ->orderBy('c_id', 'desc')
					 ->get();

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

		return Redirect::to('home');
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

		//$msg = Message::find($id);
		$msg = Message::where('id',$id)->orWhere('parent_id',$id);
		$msg->delete();

		return Response::json(array('success' => true));
	}


}
