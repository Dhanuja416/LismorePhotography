<?php
require('database_file.php');
session_start();
$db = new database_connection();
$conn = $db->get_con();

if(isset($_GET["del_id"])){
    $i_del_id = $_GET["del_id"];
    $sql = "DELETE FROM inquiries WHERE i_id = $i_del_id";

    if($conn->query($sql)===true){
        echo "<script>alert('Inquiry Deleted');
                            location.replace('admin_inquiry.php');
        </script>";
    }else{
        echo "<script>alert('Inquiry Cannot Delete');
                            location.replace('admin_inquiry.php');
        </script>";
    }
}

if(isset($_GET["upd_id"])){
    $i_upd_id = $_GET["upd_id"];
    $sql = "SELECT * FROM inquiries WHERE i_id = $i_upd_id";

    $result = $conn->query($sql);
    if( $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $_SESSION["name"] = $row["c_name"];
            $_SESSION["id"] = $row["i_id"];
            $_SESSION["e_desc"] = $row["i_desc"];
            $_SESSION["e_type"] = $row["e_type"];
            $_SESSION["status"] = $row["i_status"];
            $_SESSION["event_date"] = $row["event_date"];
            $_SESSION["tpno"] = $row["c_tpno"];
            $_SESSION["e_venue"] = $row["event_venue"];
            echo "<script>alert('".$_SESSION["event_date"]."');</script>";
        }
       
        echo "<script>location.replace('admin_inquiry.php?id=$i_upd_id ');</script>";
    }    
}

?>
