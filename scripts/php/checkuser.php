<?php
if(array_key_exists('Login',$_SESSION))
	if($_SESSION['role']=='2'
    	header("location: guardiaparco/index.html");
?>