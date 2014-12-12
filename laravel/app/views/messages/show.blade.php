@extends('default')
@section('content')

	<div id=""> <?php 
		$output = "<ul id='list'>";
		$last_id = 0;

		foreach($messages as $message){

			if($message->id != $last_id){
				$output .= "<li pid=\"".$message->id."\">";
				$output .= "<h3>".$message->user_name." <small>".$message->created_at."</small></h3>";
				$output .= "<p>".$message->msg."</p>";
				$output .= "<p><a href=\"edit/".$message->id."\" class=\"text-muted\">Edit</a>&nbsp; <a href=\"#\" onclick=\"removeMessage(".$message->id.")\" class=\"text-muted\">Delete</a> </p>";
				$output .= "</li>";
			}

			if(trim($message->c_id) != "" and isset($message->c_id)){
				$output .= "<li><ul><li>";
				$output .= "<h3>".$message->c_user_name." <small>".$message->c_created_at."</small></h3>";
				$output .= "<p>".$message->c_msg."</p>";
				$output .= "<p><a href=\"edit/".$message->c_id."\" class=\"text-muted\">Edit</a> &nbsp; <a href=\"#\" onclick=\"removeMessage(".$message->c_id.")\" class=\"text-muted\">Delete</a></p>";
				$output .= "</li></ul></li>";
			}

			$last_id = $message->id;

	    }

		$output .= "</ul>"; ?>

		{{ $output }}

	</div>
	

	<div>
		<p><a href="home" style="float:right;" class="text-muted">Create Posts</a></p>
	</div>

@stop