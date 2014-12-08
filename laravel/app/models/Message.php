	
<?php

// app/models/Message.php

class Message extends Eloquent {
        // let eloquent know that these attributes will be available for mass assignment
	protected $fillable = array('user_name', 'msg'); 
}

	
	