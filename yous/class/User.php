<?php 

class User
{
    private $database;
    private $email;
    private $password;

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
            $stmt->bindValue(':password', hash('ripemd160', $_POST['password'].'si tu aimes la wac tape dans
            tes mains'));
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
    		$connect = $this->database->prepare('SELECT * FROM user WHERE email = :email AND password = :password ');
            $connect->bindValue(':email',  htmlentities(htmlspecialchars(strip_tags($_POST['email']))));
            // $connect->bindValue(':username',  htmlentities(htmlspecialchars(strip_tags($_POST['email']))));
            $connect->bindValue(':password', hash('ripemd160', $_POST['password'].'si tu aimes la wac tape dans
            tes mains'));
            $connect->execute();
            $row = $connect->fetch();    
            // var_dump($row);
    		if ($row)
            {
                $this->session($row['id_user'],$row['username'],$row['firstname'],$row['lastname'],$row['email'],$row
                    ['password'],$row['avatar'],$row['theme']);
				return true;
            }
    		    else 
                {
                    echo '<script>alert("email/pseudo ou/et mot de passe ne sont pas bon")</script>';
                }
        }
        
        public function session($id_user, $username, $firstname, $lastname, $email, $password, $avatar, $theme)
        {
        session_start();
        $_SESSION['id_user'] = $id_user;
        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['avatar'] = $avatar;
        $_SESSION['theme'] = $theme;
        header('location:index.php');
        }
        
        public function CheckPost($username, $firstname ,$lastname, $email, $password)
        {
            if (empty($_POST['username']) 
                OR empty($_POST['firstname']) 
                OR empty($_POST['lastname'])  
                OR empty($_POST['email'])
                OR empty($_POST['password'])) 
            {
                echo "<script>alert('Champs non remplis')</script>";
                return false;
            }

            else 
            {
                return true;
            }
        }
        public function modifier_pseudo($username)
        {
            $modif = $this->database->prepare('UPDATE user SET username = ? WHERE  id_user = ?');
            $modif->execute([$username, $_SESSION["id_user"]]);
        }

        public function modifier_mail($email)
        {
            $modif = $this->database->prepare('UPDATE user SET email = ? WHERE  id_user = ?');
            $modif->execute([$email, $_SESSION["id_user"]]);
        }

        public function modifier_mdp($password)
        {
            $modif = $this->database->prepare('UPDATE user SET password = ? WHERE  id_user = ?');
            $modif->execute([hash('ripemd160', $password.'si tu aimes la wac tape dans
            tes mains'), $_SESSION["id_user"]]);
        }


        public function CheckMail()
        {
            $connect = $this->database->prepare('SELECT email FROM user WHERE email = :email');
            $connect->bindValue(':email',  htmlentities(htmlspecialchars(strip_tags($_POST['email']))));
            $connect->execute();
            $row = $connect->fetch();
            if ($row) 
                {
                    echo "<script>alert('Ce mail existe déjà')</script>"; 
                    return false;
                }
                else
                    {
                        return true;
                    }
        }

        public function CheckStatus()
        {
            $connect = $this->database->prepare('SELECT status FROM user WHERE email = :email');
            $connect->bindValue(':email',  htmlentities(htmlspecialchars(strip_tags($_POST['email']))));
            $connect->execute();
            $row = $connect->fetch();
            var_dump($row);
            if ($row[0] == 0)
            {
                return false;   
            }
                else
                {
                    return true;
                }
        }
        public function follower()
        {
            $follow = $this->database->prepare("SELECT *, follow.id_followed AS 'followed', follow.id_follower AS 'follower' FROM user
            LEFT JOIN followed ON follow.id_followed = user.id_user
            LEFT JOIN follower ON follow.id_follower = user.id_user");
            $follow->execute();

        }
}