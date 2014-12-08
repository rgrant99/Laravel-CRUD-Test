	
<?php
// app/database/seeds/MessageTableSeeder.php

class MessageTableSeeder extends Seeder 
{

	public function run()
	{
		DB::table('messages')->delete();

		Message::create(array(
			'user_name' => 'Tim Smith',
			'msg' => 'message #1'
		));

		Message::create(array(
			'user_name' => 'John Doe',
			'msg' => 'my unique message'
		));

		Message::create(array(
			'user_name' => 'Chris Jones',
			'msg' => 'another test message'
		));
	}

}
	
	