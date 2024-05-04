<?php
    class database_connection{
        function get_con(){
            $hostname = "localhost";
            $username = "root";
            $password = "Dhanuja@1234";
            $database = "lismore_photography";
        
            $con = new mysqli($hostname, $username, $password, $database);
            if(!$con->connect_error){
                return $con;
            }else{
                die("<script>'$con->connect_error'</script>" );
            }
        }
    }

?>