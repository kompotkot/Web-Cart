<?php

include_once('m/M_User.php');


class C_User extends C_Base {
	
	public function action_info() {
		
		$get_user = new M_User();
		$user_info = $get_user->get($_SESSION['id']);
		$this->title .= '::' . $user_info['name'];
		$this->content = $this->Template('v/u_info.php', array('username' => $user_info['name'], 'userlogin' => $user_info['email']));
	}
	
	public function action_reg() {
		
		$this->title .= 'Регистрация';
		$this->content = $this->Template('v/u_reg.php', array());

		if($this->isPost()) {
			$new_user = new M_User();
			$result = $new_user->newR($_POST['name'], $_POST['email'], $_POST['password']);
			if ($result) {
				$this->content = $this->Template('v/u_reg.php', array('text' => $result));
			} else {
				$this->content = $this->Template('v/u_reg.php', array('text' => $result));
			}
		}
	}

	public function action_login() {
		$this->title .= '::Вход';
		$this->content = $this->Template('v/u_login.php', array());

		if($this->isPost()) {
			$login = new M_User();
			$result = $login->login($_POST['email'], $_POST['password']);
			$this->content = $this->Template('v/u_login.php', array('text' => $result));
			
		}
	}

	public function action_logout() {
		$logout = new M_User();
		$result = $logout->logout();
	}
}
