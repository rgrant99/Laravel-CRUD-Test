<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD Message Edit</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
	<style>
		body 		{ padding-top:30px; }
		form 		{ padding-bottom:20px; }
		.message 	{ padding-bottom:20px; }
	</style>

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="messageApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">

	<!-- PAGE TITLE =============================================== -->
	<div class="page-header">
		<h2>CRUD Message Edit</h2>
		
	</div>

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
	
	

</div>
</body>
</html>