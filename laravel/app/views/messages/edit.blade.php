@extends('default')
@section('content')

	<!-- NEW COMMENT FORM =============================================== -->
	{{ Form::model($message, array('action' => array('MessageController@update', $message->id), 'method' => 'PUT')) }}

		<div class="form-group">
			{{ Form::text('user_name', null, array('class' => 'form-control input-sm')) }}
		</div>

		<div class="form-group">
			{{ Form::text('msg', null, array('class' => 'form-control input-lg')) }}
		</div>
		
		<!-- SUBMIT BUTTON -->
		<div class="form-group text-right">	
			{{ Form::submit('Update', array('class' => 'btn btn-primary btn-lg')) }}
		</div>
	{{ Form::close() }}
	
@stop