<?php 

class User
{
    private $database;
    private $email;
    private $mdp;

    public function __construct($dbcon)
    {
    	$this->database = $dbcon;
    }

    public function register()
    {
    	try
    	{

    		$stmt = $this->database->prepare("INSERT INTO user (`id_user`, `username`, `email`, `firstname`, `lastname`, `password`, `avatar`, `theme`, `register_date`, `status`) VALUES (NULL, :username, :email, :firstname, :lastname, :password, NULL, '#1da1f2', CURRENT_TIMESTAMP, '1')");
            $stmt->bindValue(':username', htmlentities(htmlspecialchars(strip_tags($_POST['username']))));
            $stmt->bindValue(':email', htmlentities(htmlspecialchars(strip_tags($_POST['email']))));
            $stmt->bindValue(':firstname', htmlentities(htmlspecialchars(strip_tags($_POST['firstname']))));
            $stmt->bindValue(':lastname', htmlentities(htmlspecialchars(strip_tags($_POST['lastname']))));
            $stmt->bindValue(':password', htmlentities(htmlspecialchars(strip_tags($_POST['password']))));

            $stmt->execute();
    		return true;
    	}
    	catch(PDOException $ex){
    		die($ex->getMessage());
    		return false;
    	}
    }

    public function login()
    {
    		$connect = $this->database->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
            // var_dump($connect);
            $connect->bindValue(':email',  htmlentities(htmlspecialchars(strip_tags($_POST['email']))));
            $connect->bindValue(':password', htmlentities(htmlspecialchars(strip_tags($_POST['password']))));
    		$connect->execute();
    		$row = $connect->fetch();
            // var_dump($email ,$row, $mdp);    
    		if ($row['password'])
            {
                $this->session($row['id_user'],$row['username'],$row['lastname'],$row['firstname'],$row['avatar'],$row
                    ['email'],$row['password'],$row['theme']);
				return true;
            }
    		else 
            {
                echo '<script>alert("email ou/et mot de passe ne sont pas bon")</script>';
            }
        }
        
        public function session($id_user, $username, $firstname, $lastname, $email, $password, $avatar, $theme)
        {
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['avatar'] = $avatar;
        $_SESSION['theme'] = $theme;
        header('location:index.php');
        }


}