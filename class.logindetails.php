<?php

include_once("abstract.databoundobject.php");
include_once("class.pdofactory.php");

class LoginDetails extends DataBoundObject {

    protected $UserId;
    protected $LastActivity;
    protected $IsType;

    protected function DefineTableName() {
        return("login_details");
    }

    protected function DefineRelationMap() {

        return(array(
            "login_details_id" => "ID",
            "user_id" => "UserId",
            "last_activity" => "LastActivity",
            "is_type" => "IsType",
        ));
    }
  
    function fetch_user_last_activity($user_id, $connect){

        $query = 
        "
            SELECT * FROM login_details 
            WHERE user_id = '$user_id' 
            ORDER BY last_activity DESC 
            LIMIT 1
        ";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
            return $row['last_activity'];
        }
    }
    
    function fetch_is_type_status($user_id, $connect){
        $query = "
        SELECT is_type FROM login_details 
        WHERE user_id = '".$user_id."' 
        ORDER BY last_activity DESC 
        LIMIT 1
        ";	
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $output = '';
        foreach($result as $row)
        {
            if($row["is_type"] == 'yes')
            {
                $output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
            }
        }
        return $output;
    }

    
}


?>
