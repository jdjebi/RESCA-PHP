<?php

define('DEBUG',True);
define('WAMP_DEBUG',True);
define('USER_ADMIN','admin');
define('USER_MEMBER','user');
define('USER_VISITOR','visitor');

$LOCAL_APP_DIR = "/Rescad_Coding/fox";
$PROTOCOL = $_SERVER['REQUEST_SCHEME'];
$HOST = $_SERVER["SERVER_NAME"];

if (DEBUG and WAMP_DEBUG)
	$HOST = $HOST.$LOCAL_APP_DIR;

$HTTP_HOST = $PROTOCOL . '://' . $HOST;

define('PROTOCOL',$PROTOCOL);
define('HOST',$HOST);
define("HTTP_HOST",$HTTP_HOST);

?>