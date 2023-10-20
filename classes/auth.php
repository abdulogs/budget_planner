<?php
class auth {
    public static function user(){
        if(session::get("id")){
            $data = DB::select("*");
            $data = DB::from("users");
            $data = DB::where(["id" => session::get("id")]);
            $data = DB::execute();
            $data = DB::fetch("one");
        } else {
            $data = false;
        }
        return $data;
    }

    public static function authenticate($email, $password){
        $data = DB::select("*")::from("users")::where(["email" => $email, "password" => md5($password)]);
        $data = DB::execute();
        $data = DB::fetch("one");

        if($data){
            return $data;
        } else {
            return false;
        }
    }

    public static function uniqueUsername($username){
        $data = DB::select("id");
        $data = DB::from("users");
        $data = DB::where(["username" => $username]);
        $data = DB::execute();
        $data = DB::fetch("one");
        return ($data) ? true : false ;
    }

    public static function uniqueEmail($email){
        $data = DB::select("id");
        $data = DB::from("users");
        $data = DB::where(["email" => $email]);
        $data = DB::execute();
        $data = DB::fetch("one");
        return ($data) ? true : false ;
    }
}
?>