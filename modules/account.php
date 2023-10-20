<?php
class module {
    public static $action;
    private static $firstname;
    private static $lastname;
    private static $username;
    private static $email;
    private static $password;

    public function __construct(){
        self::$action = http::param("action");
        self::$firstname = http::param("firstname");
        self::$lastname = http::param("lastname");
        self::$username = http::param("username");
        self::$email = http::param("email");
        self::$password = http::param("password");
    }


    public static function login(){
        if(self::$action == "login"){
            $data = auth::authenticate(self::$email, self::$password);
            if($data){
                if($data["is_status"] == 0){
                    msg::set("Your account is not approved yet!","error");
                } else {
                    session::set("id", $data["id"]);
                    session::set("is_role", $data["is_role"]);
                    msg::set("Login successfuly!","success");
                    http::redirect("home");
                }
            } else {
                msg::set("Invalid credentials!","error");
            }
        }
    }

    public static function signup(){
        if(self::$action == "signup"){
            if(auth::uniqueUsername(self::$username)){
                msg::set("Username already exists","error");    
            } elseif(auth::uniqueEmail(self::$email)){
                msg::set("Email already exists","error");    
            } else {
                $data = DB::create("users", [
                    "firstname" => self::$firstname,
                    "lastname" => self::$lastname,
                    "username" => self::$username,
                    "email" => self::$email,
                    "password" => md5(self::$password),
                    "image" => "avatar.png",
                    "is_role" => 1,
                    "is_status" => 0,
                    "is_active" => 1,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ])::execute();
                msg::set("Account created successfully!","success");  
            }      
        }
    }
}

// Init class for construct values
$module = new module();
?>