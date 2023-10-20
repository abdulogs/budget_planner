<?php
class module {
    public static $action;
    private static $id;
    private static $firstname;
    private static $lastname;
    private static $username;
    private static $email;
    private static $password;
    private static $opassword;
    private static $is_active;
    private static $is_role;
    private static $is_status;

    public function __construct(){
        self::$action = http::param("action");
        self::$id = http::param("id");
        self::$firstname = http::param("firstname");
        self::$lastname = http::param("lastname");
        self::$username = http::param("username");
        self::$email = http::param("email");
        self::$password = http::param("password");
        self::$opassword = http::param("opassword");
        self::$is_active = http::param("is_active");
        self::$is_role = http::param("is_role");
        self::$is_status = http::param("is_status");
    }

    public static function listing(){
        $data = DB::select("*");
        $data = DB::from("users");
        $data = DB::sort("id","DESC");
        $data = DB::paging();
        $data = DB::execute();
        $data = DB::fetch("all");
        return $data;
    }

    public static function single(){
        $data = DB::select("*");
        $data = DB::from("users");
        $data = DB::where(["id" => self::$id]);
        $data = DB::execute();
        $data = DB::fetch("one");

        if(!$data){
            http::redirect("404");
        } else {
            return $data;
        }
    }

    public static function create() {
        if(self::$action == "create"){
            $data = DB::create("users", [
                "firstname" => self::$firstname,
                "lastname" => self::$lastname,
                "username" => self::$username,
                "email" => self::$email,
                "password" => md5(self::$password),
                "is_active" => self::$is_active,
                "is_role" => self::$is_role,
                "is_status" => self::$is_status,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ])::execute();
            msg::set("1 row created successfuly","success");
            http::redirect("users");
           
        }
    }

    public static function update(){
        // Set old password if new password is empty
        $password = (empty(self::$password)) ? self::$opassword : md5(self::$password);

        if(self::$action == "update"){
            $data = DB::update("users", [
                "firstname" => self::$firstname,
                "lastname" => self::$lastname,
                "username" => self::$username,
                "email" => self::$email,
                "password" => $password,
                "is_active" => self::$is_active,
                "is_role" => self::$is_role,
                "is_status" => self::$is_status,
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            $data = DB::where(["id" => self::$id]);
            $data = DB::execute();
    
            msg::set("1 row updated successfuly","success");
            http::redirect("users");
        }
    }

    public static function delete(){
        if(self::$action == "delete"){
            $data = DB::delete("users");
            $data = DB::where(["id" => self::$id]);
            $data = DB::execute();

            msg::set("1 row deleted successfuly","success");
        }
    }
}
// Init class for construct values
$module = new module();
?>