<?php

class AuthorsModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function authUser($username,$password){
        $clean_username = $username;
        $clean_password = $password;
        $sql = "SELECT `first_name`, `last_name`, `hashed_pass` from authors where email= ?";
        $stmt = $this->db->prepare($sql);
        $count = $stmt->execute(Array($clean_username));
        $row = $stmt->fetch();
        $hashed_pass = $row[2];
        $is_auth = false;
        if(isset($hashed_pass)){
            $is_auth = password_verify($clean_password,$hashed_pass);
            if($is_auth){
                $_SESSION["first_name"] = $row[0];
                $_SESSION["last_name"] = $row[1];
                $_SESSION["username"] = $clean_username;
                $update_sql = "UPDATE `authors` set `last_login_date` = CURRENT_TIMESTAMP() where email = ?";
                $update_stmt = $this->db->prepare($update_sql);
                $update_stmt->execute(Array($clean_username));
             return 0;
            }
    } 
    return 0;

}
}

?>