<?php
class module {

    public static $action;
    private static $id;
    private static $name;
    private static $budget;
    private static $savings;
    private static $is_active;

    public function __construct(){
        self::$action = http::param("action");
        self::$id = http::param("id");
        self::$name = http::param("name");
        self::$budget = http::param("budget");
        self::$savings = http::param("savings");
        self::$is_active = http::param("is_active");
    }

    public static function listing(){
        $data = DB::select("b.id","b.name","b.savings","b.budget","b.is_active","b.e_date","b.e_month","b.e_year");
        $data = DB::select("b.created_at", "b.updated_at", "u.firstname", "u.lastname");
        $data = DB::from("budgets AS b");
        $data = DB::leftJoin("users AS u", "u.id","b.created_by");
        if(f::is_customer()){
            $data = DB::where(["b.created_by" => session::get("id")]);
        }
        $data = DB::sort("b.id","DESC");
        $data = DB::paging();
        $data = DB::execute();
        $data = DB::fetch("all");
        return $data;
    }

    public static function single(){
        $data = DB::select("b.id","b.name","b.savings","b.budget","b.is_active","b.e_date","b.e_month","b.e_year");
        $data = DB::select("b.created_at", "b.updated_at", "u.firstname", "u.lastname");
        $data = DB::from("budgets AS b");
        $data = DB::leftJoin("users AS u", "u.id","b.created_by");
        $data = DB::where(["b.id" => self::$id]);
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
            $data = DB::create("budgets", [
                "name" => self::$name,
                "budget" => self::$budget,
                "savings" => self::$savings,
                "e_date" => date("d"),
                "e_month" => date("m"),
                "e_year" => date("Y"),
                "is_active" => self::$is_active,
                "created_by" => session::get("id"),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ])::execute();
    
            msg::set("1 row created successfuly","success");
            http::redirect("budgets");

        }
    }

    public static function update(){
        if(self::$action == "update"){
            $data = DB::update("budgets", [
                "name" => self::$name,
                "budget" => self::$budget,
                "savings" => self::$savings,
                "is_active" => self::$is_active,
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            $data = DB::where(["id" => self::$id]);
            $data = DB::execute();
    

            msg::set("1 row updated successfuly","success");
            http::redirect("budgets");
        }
    }

    public static function delete(){
        if(self::$action == "delete"){
            $data = DB::delete("budgets");
            $data = DB::where(["id" => self::$id]);
            $data = DB::execute();
            
            msg::set("1 row deleted successfuly","success");

        }
    }
}
// Init class for construct values
$module = new module();
?>