<?php

function setHeader(){
	echo "111";
	header("HTTP/1.1 401 Unauthorized");

}

register_shutdown_function('setHeader');