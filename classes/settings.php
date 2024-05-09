<?php
// Set it to true when you will upload this website on cpanel
config::debug(false);

// Set database 
config::DBHost("localhost");
config::DBUsername("root");
config::DBPassword("");
config::DBName("budget_planner");
config::DBConnect();

// Listing limit
config::DBSetLimit(12);

// Set timezone
config::setTimeZone("Asia/Karachi");

// Set url
config::setUrl("http://localhost/budget_planner/");

// set session
config::session(true);
