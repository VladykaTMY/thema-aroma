<?php
class User{
    private $name;
    private $lastname;
    private $email;
    private $id;
	
    function __construct($id,$name,$lastname,$email){
        $this->id = $id;  // аргументы для объекта
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
    }
	// создаем геттеры для полей пользователя
    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->name;
    }
    function getLastname(){
        return $this->lastname;
    }
    function getEmail(){
        return $this->email;
    }
    //статический метод добавления пользователя
    static function addUser($name,$lastname,$email,$pass){
        global $mysqli;
        $email = mb_strtolower(trim($email));//прописные буквы
        $pass = trim($pass);// убрать пробелы
        $pass = password_hash($pass, PASSWORD_DEFAULT);//хэширововка пароля
        $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
        if ($result->num_rows!=0){
            return json_encode(["result"=>"exist"]);
		}else{
        $mysqli->query("INSERT INTO `users`(`name`,`lastname`,`email`,`pass`)VALUES('$name','$lastname','$email','$pass')");
        return json_encode(["result"=>"success"]);
		}
    }

    static function authUser($email, $pass)
    {
        global $mysqli;
		$email = mb_strtolower(trim($email));
		$pass = trim($pass);
		$result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
		$result = $result->fetch_assoc();
		if(password_verify($pass,$result['pass'])){
			$_SESSION['id']= $result['id'];
			return json_encode(["result"=>"ok"]);
		}else{
			return json_encode(["result"=>"reject"]);
		}
    }
	
	static function getUser($userID){
		global $mysqli;
			$result = $mysqli->query("SELECT`name`,`lastname`,`email`,`id` FROM `users` WHERE `id`='$userID'");
			$result = $result->fetch_assoc(); 
			return json_encode($result);
	}
	static function getUsers()
	{
		global $mysqli;
		$users = array();
		$result = $mysqli->query("SELECT`name`,`lastname`,`email`,`id` FROM `users` WHERE 1");
		while($row=$result->fetch_assoc()){
			$users[]=$row;//добавляем строку в массив
		}
		return json_encode($users);
	}
}
?>