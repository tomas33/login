<?php
namespace app\controllers;
//use Psr\Container\ContainerInterface;
include('password.php');
class User extends Password{

    private $db;
    protected $container;

   // constructor receives container instance
   public function __construct(\Slim\App $login) {
       parent::__construct();

        $this->db = $db;
        $this->container = $login;
   }

	private function get_user_hash($request, $response, $args){

		try {
			$stmt = $this->db->prepare('SELECT password, username, memberID,rol FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $args));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function isValidUsername($request, $response, $args){
		if (strlen($args) < 3) return false;
		if (strlen($args) > 17) return false;
		if (!ctype_alnum($args)) return false;
		return true;
	}

	public function login($username,$password){
		if (!$this->isValidUsername($username)) return false;
		if (strlen($password) < 3) return false;

		$row = $this->get_user_hash($username);

		if($this->password_verify($password,$row['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		    $_SESSION['memberID'] = $row['memberID'];
                    $_SESSION['rol'] = $row['rol'];
		    return true;
		}
                return $response;
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
