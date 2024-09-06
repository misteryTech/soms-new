<?php

    include('connection.php');

    if(isset($_POST['municipality'])){
            $municipality = $_POST['municipality'];

            $mysql_query =("SELECT COUNT(*) as count FROM address WHERE municipality = '$municipality' ");
            $mysql_query_result =  $connection->query($mysql_query);

            if($mysql_query_result){
                    $row = $mysql_query_result->fetch_assoc();
                    $count = $row['count'];

            if($count > 0){
                    echo 'exists';
            }else{
                    echo 'available';
            }
        }else{
            echo 'Error executing query: ' . $connection->error;
        }


    }

?>