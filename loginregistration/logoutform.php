<?php

require 'core.inc.php'; //killing a session we need to start the session again..
	
	session_destroy();

	header('Location: '.$http_referer);

?>