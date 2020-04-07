<?php

include_once 'm/User.php';

abstract class C_Base extends C_Controller {
	
	protected $title;
	protected $content;
		
	protected function before(){
		$this->title = 'Shop';
		$this->content = '';
		$this->keyWords="...";
	}

	// Genereting base template
	public function render() {
		$get_user = new User();
		
		if (isset($_SESSION['user_id'])) {
			$user_info = $get_user->getUser($_SESSION['user_id']);
		} else {
			$user_info['name'] = false;
		}
		
		$vars = array('title' => $this->title, 'content' => $this->content, 'user' => $user_info, 'kw' => $this->keyWords);		// Add user for session
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}
}