angular.module('messageService', [])

	.factory('Message', function($http) {

		return {
			// get all the messages
			get : function() {
				//console.log($http.get('api/messages'));
				return $http.get('api/messages');
			},

			// save a message (pass in mesasge data)
			save : function(messageData) {
				messageData.parentId = $("#parentId").val();
				return $http({
					method: 'POST',
					url: 'api/messages',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(messageData)
				});
			},

			// destroy a message
			destroy : function(id) {
				return $http.delete('api/messages/' + id);
			}
		}

	});


function buildComment(msgId,userName){
	$("#message").val("@"+userName+": ");
	$("#parentId").val(msgId);
}

function removeMessage(msgId){
	var selection = confirm("Are you sure you wish to remove this item?");

	if(selection){
		$.ajax({
			type: "DELETE",
			url: "api/messages/" + msgId,
			async: false,
			cache: false,
			success: function(resp){
				
				if(resp.success){
					location.reload();
				}
			}
		});
	}
}