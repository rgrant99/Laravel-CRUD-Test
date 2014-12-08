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
		<script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="js/services/messageService.js"></script> <!-- load our service -->
		<script src="js/app.js"></script> <!-- load our application -->

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="messageApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">

	<!-- PAGE TITLE =============================================== -->
	<div class="page-header">
		<h2>CRUD Message Board</h2>
		
	</div>

	<!-- NEW MESSAGE FORM =============================================== -->
	<form ng-submit="submitMessage()"> <!-- ng-submit will disable the default form action and use our function -->

		<!-- AUTHOR -->
		<div class="form-group">
			<input type="text" class="form-control input-sm" name="user_name" ng-model="messageData.user_name" placeholder="Name">
		</div>

		<!-- MESSAGE TEXT -->
		<div class="form-group">
			<input type="text" class="form-control input-lg" name="message" ng-model="messageData.message" placeholder="Post Your Message">
		</div>
		
		<!-- SUBMIT BUTTON -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
		</div>
	</form>

	<!-- LOADING ICON =============================================== -->
	<!-- show loading icon if the loading variable is set to true -->
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

	<!-- THE MESSAGES =============================================== -->
	

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
			<tr class="message" ng-hide="loading" ng-repeat="message in messages">
				<td>{{ message.created_at }}</td>
				<td>{{ message.user_name }}</td>
				<td>{{ message.msg }}</td>
				<td><a href="messages/{{ message.id }}/edit" class="text-muted">Edit</a></td>
				<td><a href="#" ng-click="deleteMessage(message.id)" class="text-muted">Delete</a></td>
			</tr>
		</tbody>
	</table>

	<div>
		<p><a href="messages/show" style="float:right;" class="text-muted">View All Posts</a></p>
	</div>

</div>
</body>
</html>