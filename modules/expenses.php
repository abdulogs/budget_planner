<?php
class module {
    public static $action;
    private static $id;
    private static $name;
    private static $description;
    private static $amount;
    private static $budget_id;
    private static $category_id;
    private static $is_active;

    public function __construct(){
        self::$action = http::param("action");
        self::$id = http::param("id");
        self::$amount = http::param("amount");
        self::$description = http::param("description");
        self::$budget_id = http::param("budget_id");
        self::$category_id = http::param("category_id");
        self::$is_active = http::param("is_active");
    }

    public static function listing(){
        $data = DB::select("e.id","e.amount","e.description","e.is_active","b.name AS budget","c.name AS category");
        $data = DB::select("e.created_at", "e.updated_at","u.firstname", "u.lastname");
        $data = DB::from("expenses AS e");
        $data = DB::leftJoin("budgets AS b", "b.id","e.budget_id");
        $data = DB::leftJoin("categories AS c", "c.id","e.category_id");
        $data = DB::leftJoin("users AS u", "u.id","e.created_by");
        if(f::is_customer()){
            $data = DB::where(["e.created_by" => session::get("id")]);
        }
        $data = DB::sort("e.id","DESC");
        $data = DB::paging();
        $data = DB::execute();
        $data = DB::fetch("all");
        return $data;
    }

    public static function single(){
        $data = DB::select("e.id","e.amount","e.description","e.budget_id","e.category_id","e.is_active","b.name AS budget");
        $data = DB::select("c.name AS category","e.created_at","e.updated_at","u.firstname", "u.lastname");
        $data = DB::from("expenses AS e");
        $data = DB::leftJoin("budgets AS b", "b.id","e.budget_id");
        $data = DB::leftJoin("categories AS c", "c.id","e.category_id");
        $data = DB::leftJoin("users AS u", "u.id","e.created_by");
        $data = DB::where(["e.id" => self::$id]);
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
            $data = DB::create("expenses", [
                "amount" => self::$amount,
                "description" => self::$description,
                "budget_id" => self::$budget_id,
                "category_id" => self::$category_id,
                "e_date" => date("d"),
                "e_month" => date("m"),
                "e_year" => date("Y"),
                "is_active" => self::$is_active,
                "created_by" => session::get("id"),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ])::execute();
    
            msg::set("1 row created successfuly","success");
            http::redirect("expenses");
        }
    }

    public static function update(){
        if(self::$action == "update"){
            $data = DB::update("expenses", [
                "amount" => self::$amount,
                "description" => self::$description,
                "budget_id" => self::$budget_id,
                "category_id" => self::$category_id,
                "is_active" => self::$is_active,
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            $data = DB::where(["id" => self::$id]);
            $data = DB::execute();
    
            msg::set("1 row updated successfuly","success");
            http::redirect("expenses");
        }
    }

    public static function delete(){
        if(self::$action == "delete"){
            $data = DB::delete("expenses");
            $data = DB::where(["id" => self::$id]);
            $data = DB::execute();

            msg::set("1 row deleted successfuly","success");
        }
    }

    // Extra functions
    public static function budgets(){
        $data = DB::select("*");
        $data = DB::from("budgets");
        $data = DB::where(["created_by" => session::get("id"), "is_active" => true]);   
        $data = DB::execute();
        $data = DB::fetch("all");
        return $data;
    }

    public static function categories(){
        $data = DB::select("*");
        $data = DB::from("categories");
        if(f::is_customer()){
            $data = DB::where(["created_by" => session::get("id"), "is_active" => true]); 
            $data = DB::where(["is_editable" => false], "OR"); 
        } else {
            $data = DB::where(["created_by" => session::get("id"), "is_active" => true]); 
        }
        $data = DB::execute("");
        $data = DB::fetch("all");
        return $data;
    }

}
// Init class for construct values
$module = new module();
?>