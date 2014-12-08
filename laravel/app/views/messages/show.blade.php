<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD Message Board</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
	<style>
		body 		{ padding-top:30px; }
		form 		{ padding-bottom:20px; }
		.message 	{ padding-bottom:20px; }
	</style>

	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
		<script src="/lv/js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="/lv/js/services/messageService.js"></script> <!-- load our service -->
		<script src="/lv/js/app.js"></script> <!-- load our application -->

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="messageApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">

	<!-- PAGE TITLE =============================================== -->
	<div class="page-header">
		<h2>CRUD Message Board</h2>
		
	</div>

	

	<table style="width:90%;">
		<thead>
			<tr>
				<th>Time</th>
				<th>Name</th>
				<th>Message</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($messages as $message)
				<tr class="message">
					<td>{{ $message->created_at }}</td>
					<td>{{ $message->user_name }}</td>
					<td>{{ $message->msg }}</td>
					<td><a href="{{ $message->id }}/edit" class="text-muted">Edit</a></td>
					<td><a href="#" onclick="removeMessage({{ $message->id }})" class="text-muted">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div>
		<p><a href="/lv" style="float:right;" class="text-muted">Create Posts</a></p>
	</div>

</div>
</body>
</html>