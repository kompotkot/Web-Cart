<?php


function text_get(){
	return file_get_contents('text.txt');
}

function text_set($text){
	file_put_contents('text.txt', $text);
}
