<?php

include_once('database_connection.php');
include_once("abstract.databoundobject.php");
include_once("class.pdofactory.php");

class Login extends DataBoundObject {

        protected $Username;
        protected $Password;

      
        protected function DefineTableName() {
                return("login");
        }

        protected function DefineRelationMap() {

                return(array(
                        "user_id" => "ID",
                        "username" => "Username",
                        "password" => "Password",
                ));
        }

        function get_user_name($user_id, $connect){

                $objLogin = new Login($connect, $user_id);
                $nombreUsuario = $objLogin -> getUsername();
                return $nombreUsuario;
        }
}

?>
