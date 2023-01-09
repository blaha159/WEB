<?php
//database
const DB_HOST = "localhost";
const DB_NAME = "web";
const DB_USER = "web";
const DB_PASS = "web";

//folders
const VIEWS = "views/";
const MODELS = "models/";
const CONTROLLERS = "controllers/";

//home page
const HOME = "home";

//stranky
const WEB_PAGES = array(
    "home"=>array(
        "view"=>"home",
        "controller"=>"HomeController",
    ),
    "about"=>array(
        "view"=>"about",
        "controller"=>"AboutController",
    ),
    "contact"=>array(
        "view"=>"contact",
        "controller"=>"ContactController",
    ),
    "register"=>array(
        "view"=>"register",
        "controller"=>"LoginController",
    ),
    "games"=>array(
        "view"=>"games",
        "controller"=>"GameController",
    ),
    "gamedetail"=>array(
        "view"=>"gamedetail",
        "controller"=>"GameController",
    ),

    "login"=>array(
        "view"=>"login",
        "controller"=>"LoginController",
    ),
    "logout"=>array(
        "view"=>"main",
        "controller"=>"LoginController",
    ),
    "users"=>array(
        "view"=>"users",
        "controller"=>"UsersController",
    ),
    "addgame"=>array(
        "view"=>"addgame",
        "controller"=>"AddGameController",
    ),
    "game-admin"=>array(
        "view"=>"game-admin",
        "controller"=>"GameController",
    ),
    "users-admin"=>array(
        "view"=>"users-admin",
        "controller"=>"UsersController",
    ),
    "review-admin"=>array(
        "view"=>"review-admin",
        "controller"=>"ReviewController",
    ),
    "review"=>array(
        "view"=>"review",
        "controller"=>"ReviewController",
    ),

);
?>
