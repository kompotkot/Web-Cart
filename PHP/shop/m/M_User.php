<?
include_once 'db.php';

class M_User {
	private $user_id, $user_email, $user_name, $user_password;

    public function pass ($name, $password) {
        return strrev(md5($name)) . md5($password);
    }

    public function connecting () {
        return new PDO(DRIVER . ':host='. SERVER . ';dbname=' . DB, USERNAME, PASSWORD)
    }

    public function get ($id) {
        $connect = $this->connecting();
        return $connect->query("SELECT * FROM accounts WHERE id = '" . $id . "'")->fetch();
    }

    public function newR ($name, $email, $password) {
        $connect = $this->connecting();
        $user = $connect->query("SELECT * FROM accounts WHERE email = '" . $email . "'")->fetch();
        if (!$user) {
            $connect->exec("INSERT INTO users VALUES (null, '" . $name . "', '" . $email . "', '" . $this->pass($name, $password) . "')");
            return true;
        } else {
            return false;
        }
    }

    public function login ($email, $password) {
        $connect = $this->connecting();
        $user = $connect->query("SELECT * FROM accounts WHERE email = '" . $email . "'")->fetch();
        if ($user) {
            if ($user['password'] == $this->pass($user['name'], strip_tags($password))) {
                $_SESSION['id'] = $user['id'];
                return 'Добро пожаловать в систему, ' . $user['name'] . '!';
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }
    }

    public function logout () {
        if (isset($_SESSION["id"])) {
            $_SESSION["id"]=null;
            session_destroy();
            return true;
        }
        return false;
    }
}
