
@extends('default')
@section('content')


	<!-- NEW MESSAGE FORM =============================================== -->
	<form ng-submit="submitMessage()"> <!-- ng-submit will disable the default form action and use our function -->

		<!-- AUTHOR -->
		<div class="form-group">
			<input type="text" class="form-control input-sm" name="user_name" id="user_name" ng-model="messageData.user_name" placeholder="Name">
		</div>

		<!-- MESSAGE TEXT -->
		<div class="form-group">
			<input type="text" class="form-control input-lg" name="message" id="message" ng-model="messageData.message" placeholder="Post Your Message">

		</div>
		
		<input type="hidden" class="form-control input-lg" name="parentId" id="parentId" ng-model="messageData.parentId">
		
		<!-- SUBMIT BUTTON -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
		</div>
	</form>

	<!-- LOADING ICON =============================================== -->
	<!-- show loading icon if the loading variable is set to true -->
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

	<!-- THE MESSAGES =============================================== -->
	
	<div id="msgs">
		
	</div>
	

	<div>
		<p><a href="showall" style="float:right;" class="text-muted">View All Posts</a></p>
	</div>

@stop