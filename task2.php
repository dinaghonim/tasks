<?php

function nextcharacter($char){
	
echo(++$char);
	
}

nextcharacter("D");

/////////////////////////////////////////////


echo("<br><br><br>");

/////////////////////////////////////////////

function filename($link){

echo(basename($link));
	
}

$link="www.example.com/public_html/index.php";
filename($link);


?>


