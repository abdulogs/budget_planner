<?php

class module {

    public static function bs(){
        $data = DB::select("budget","savings","name");
        $data = DB::from("budgets");
        $data = DB::where(["created_by" => session::get("id"), "e_month"=> date("m"), "e_year"=> date("Y")]);
        $data = DB::execute();
        $data = DB::fetch("one");
        return $data;
    }

    public static function expenses(){
        $data = DB::select("e.id","e.amount","b.name AS budget","c.name AS category");
        $data = DB::from("expenses AS e");
        $data = DB::leftJoin("budgets AS b", "b.id","e.budget_id");
        $data = DB::leftJoin("categories AS c", "c.id","e.category_id");
        $data = DB::where(["e.e_date" => date('d'), "e.e_month" => date("m"), "e.created_by"=> session::get("id")]);
        $data = DB::execute();
        $data = DB::fetch("all");
        return $data;
    }

    public static function expensesYear(){
        $data = DB::select("SUM(amount) AS amount","e_month");
        $data = DB::distinct();
        $data = DB::from("expenses");
        $data = DB::where(["created_by"=> session::get("id"), "e_year" => date("Y")]);
        $data = DB::sort("e_month","ASC");
        $data = DB::group_by("e_month");
        $data = DB::execute();
        $data = DB::fetch("all");
        return $data;
    }
}

// Init class for construct values
$module = new module();
?>