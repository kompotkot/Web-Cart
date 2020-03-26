<?php

$pic_dir = ['img/bg/','img/sm/'];

$file_path_big = [];
$file_path_sml = [];

foreach($pic_dir as $dir){
	$files = scandir($dir);			// Clear list of files
	unset($files[0]);
	unset($files[1]);

	foreach($files as $value){		// Concatenate files with path
		if ($dir == 'img/bg/'){
			array_push($file_path_big, $dir.$value);
		} elseif ($dir == 'img/sm/') {
			array_push($file_path_sml, $dir.$value);
		}
		
	}
}

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
	$loader = new Twig_Loader_Filesystem('templates');	// Where we saved templates
	$twig = new Twig_Environment($loader);				// Init Twig
	$template = $twig->loadTemplate('index.tmpl');		// Load template

	echo $content = $template->render([
		'big_pics' => $file_path_big,
		'sml_pics' => $file_path_sml,
	]);

} catch (Exception $e) {
	die ('ERROR: '.$e->getMessage());
}
