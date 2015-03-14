<?php

include_once 'db_connect.php';

function sec_session_start(){
	$session_name = 'sec_session_id'; //set custom session name
	$secure = SECURE; //stop javascript being able to access session id
	$httponly = true;
	
	//force sessions to use only cookies
	if(ini_set('session.use_only_cookies', 1) === FALSE){
		header("Location")
	}
}