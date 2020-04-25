<?php
class  Blog extends Controller
{
     function __construct() {
        parent::__construct();
    }
    function Index(){
        $this->model("BlogModel");
        $posts = $this->BlogModel->getAll();
        $input = Array("posts" => $posts);
        $this->view("template/header");
        $this->view("blog/index", $input);
        $this->view("template/footer");
    }
    function Read($postId){
        $this->model("BlogModel");
       $post = $this->BlogModel->getById($postId);
       $this->view("blog/header", $post);
        $this->view("blog/post", $post);
        $this->view("template/footer");
    }
    function CreatePost()
    {
        $is_auth = isset($_SESSION["username"]);
        if(!$is_auth){
            header("location: /blog");
        }
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $title = $_POST["title"];
            $content = $_POST["content"];
            $author = $_POST["author"];
            $this -> model("BlogModel");
            $slug = $this -> BlogModel -> createPost($title, $author, $content);
            header("location: /blog/read/" . $slug);
        }else{
        $this->view("template/header");
        $this->view("blog/create");
        $this->view("template/footer");   
        }
    }
}
?>
