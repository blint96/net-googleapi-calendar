<?php
	function generateSalt($max = 15) 
    {
	    $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%&?";
	    $i = 0;
	    $salt = "";
	    while ($i < $max) {
	        $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
	        $i++;}
	   	return $salt;
    }

    echo "Wybrana data: ".$_GET['day']."/".$_GET['month']."/".$_GET['year']."<hr>";
    echo "Randomowy salt: ".generateSalt();
?>