<?php
class module {
    private static $action;
    private static $id;
    private static $name;
    private static $is_editable;
    private static $is_active;

    public function __construct(){
        self::$action = http::param("action");
        self::$id = http::param("id");
        self::$name = http::param("name");
        self::$is_editable = http::param("is_editable");
        self::$is_active = http::param("is_active");
    }

    public static function listing(){
        $data = DB::select("c.id","c.name","c.is_editable","c.is_active","c.created_at", "c.updated_at");
        $data = DB::select("u.firstname", "u.lastname");
        $data = DB::from("categories AS c");
        $data = DB::leftJoin("users AS u", "u.id","c.created_by");
        if(f::is_customer()){
            $data = DB::where(["c.created_by" => session::get("id")]);
        }
        $data = DB::sort("c.id","DESC");
        $data = DB::paging();
        $data = DB::execute();
        $data = DB::fetch("all");
        return $data;
    }

    public static function single(){
        $data = DB::select("c.id","c.name","c.is_editable","c.is_active","c.created_at", "c.updated_at");
        $data = DB::select("u.firstname", "u.lastname");
        $data = DB::from("categories AS c");
        $data = DB::leftJoin("users AS u", "u.id","c.created_by");
        $data = DB::where(["c.id" => self::$id]);
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
            $data = DB::create("categories", [
                "name" => self::$name,
                "is_editable" => self::$is_editable,
                "is_active" => self::$is_active,
                "created_by" => session::get("id"),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ])::execute();
    
            msg::set("1 row created successfuly","success");
            http::redirect("categories");
        }
    }

    public static function update(){
        if(self::$action == "update"){
            $data = DB::update("categories", [
                "name" => self::$name,
                "is_editable" => self::$is_editable,
                "is_active" => self::$is_active,
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            $data = DB::where(["id" => self::$id]);
            $data = DB::execute();
    

            msg::set("1 row updated successfuly","success");
            http::redirect("categories");
        }
    }

    public static function delete(){
        if(self::$action == "delete"){
            $data = DB::delete("categories");
            $data = DB::where(["id" => self::$id]);
            $data = DB::execute();

            msg::set("1 row deleted successfuly","success");

        }
    }

}
// Init class for construct values
$module = new module();
?>