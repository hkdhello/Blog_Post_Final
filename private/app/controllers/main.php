<?php

class Main extends Controller {

    function __construct() {

        parent::__construct();
    }
    
    function Index () {
        $CSRF_Token = rand(1000, 100000);
        setcookie('CSRF_Token',$CSRF_Token);
        $_SESSION["CSRF_Token"] = $CSRF_Token;
        setcookie("3","2020-24-04");
        $secure = false;
        if($_SESSION["CSRF_Token"] == $_COOKIE["CSRF_Token"] && $_SESSION["CSRF_Token"] == $_POST["CSRF_Token"]){
                $secure = true;
            }
        if($_SERVER["REQUEST_METHOD"]=="POST" && $secure == true){
            echo($_POST["username"] . "<br>");
            echo($_POST["pass"] . "<br>");
            $_SESSION["username"] = $_POST["username"];
        }else{
            session_destroy();
        }        
        if(isset($_SESSION["username"])){
            echo("Logged in as" . $_SESSION["username"]);
        }
        $this->view("main/form", array("CSRF_Token" => $CSRF_Token));
    }
    function Other () {
        $this->view("template/header");
        $this->view("main/other");
        $this->view("template/footer");
    }
}
?>
