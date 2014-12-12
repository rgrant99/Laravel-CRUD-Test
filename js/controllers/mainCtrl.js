	// public/js/controllers/mainCtrl.js
angular.module('mainCtrl', [])

	// inject the Comment service into our controller
	.controller('mainController', function($scope, $http, Message) {
		// object to hold all the data for the new comment form
		$scope.messageData = {};

		// loading variable to show the spinning loading icon
		$scope.loading = true;

		// get all the message first and bind it to the $scope.message object
		// use the function we created in our service
		// GET ALL MESSAGE ====================================================
		Message.get()
			.success(function(data) {
				//console.log(data);
				$scope.messages = tableFormat(data);
				$("#msgs").html($scope.messages);
				$scope.loading = false;
			});

		// function to handle submitting the form
		// SAVE A MESSAGE ======================================================
		$scope.submitMessage = function() {

			if($.trim($scope.messageData.user_name)!="" && $.trim($scope.messageData.message)!=""){

			$scope.loading = true;

			// save the message. pass in message data from the form
			// use the function we created in our service
			Message.save($scope.messageData)
				.success(function(data) {

					// if successful, we'll need to refresh the message list
					Message.get()
						.success(function(getData) {
							$scope.messages = tableFormat(getData);
							$("#msgs").html($scope.messages);
							$scope.loading = false;
						});

				})
				.error(function(data) {
					console.log(data);
				});

			}else{
				alert("please complete the Form.");
			}
		};

		// function to handle deleting a message
		// DELETE A MESSAGE ====================================================
		$scope.deleteMessage = function(id) {

			var selection = confirm("Are you sure you wish to remove this item?");

			if(selection){

				$scope.loading = true; 

				// use the function we created in our service
				Message.destroy(id)
					.success(function(data) {

						// if successful, we'll need to refresh the comment list
						Message.get()
							.success(function(getData) {
								$scope.messages = getData;
								//$("#msgs").html($scope.messages);
								$scope.loading = false;
							});

					});

			}
		};

	});

function tableFormat(jsondata){
	var output = "<ul id='list'>";
	var last_id = "";

	$.each(jsondata, function(i, item){

		if(item.id != last_id){
			output += "<li pid=\""+item.id+"\">";
			output += "<h3>"+item.user_name+" <small>"+item.created_at+"</small></h3>";
			output += "<p>"+item.msg+"</p>";
			output += "<p><a href=\"edit/"+item.id+"\" class=\"text-muted\">Edit</a>&nbsp; <a href=\"#\" onclick=\"removeMessage("+item.id+")\" class=\"text-muted\">Delete</a> &nbsp; <a href=\"#\" onclick=\"buildComment('"+item.id+"','"+item.user_name+"')\" class=\"text-muted\">Comment</a></p>";
			output += "</li>";
		}

		if($.trim(item.c_id) != "" && item.c_id != null){
			output += "<li><ul><li>";
			output += "<h3>"+item.c_user_name+" <small>"+item.c_created_at+"</small></h3>";
			output += "<p>"+item.c_msg+"</p>";
			output += "<p><a href=\"edit/"+item.c_id+"\" class=\"text-muted\">Edit</a> &nbsp; <a href=\"#\" onclick=\"removeMessage("+item.c_id+")\" class=\"text-muted\">Delete</a></p>";
			output += "</li></ul></li>";
		}

		last_id = item.id;

    });

	output += "</ul>";

	return output;
}
	