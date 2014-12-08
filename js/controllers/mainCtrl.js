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
				console.log(data);
				$scope.messages = data;
				$scope.loading = false;
			});

		// function to handle submitting the form
		// SAVE A COMMENT ======================================================
		$scope.submitMessage = function() {
			$scope.loading = true;

			// save the message. pass in comment data from the form
			// use the function we created in our service
			Message.save($scope.messageData)
				.success(function(data) {

					// if successful, we'll need to refresh the comment list
					Message.get()
						.success(function(getData) {
							$scope.messages = getData;
							$scope.loading = false;
						});

				})
				.error(function(data) {
					console.log(data);
				});
		};

		// function to handle deleting a comment
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
								$scope.loading = false;
							});

					});

			}
		};

	});
	