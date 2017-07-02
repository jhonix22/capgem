<?php

    require '../config/config.php'; //database connection

    $paramCode = isset($_REQUEST['paramCode']); //paramCode variable

    //initialize response array
    $response =  array(
                            "success" => 0, //1 = successed or 0 = failed
                            "message" => "Initial Message" //response message
                         );

    if(!empty($_REQUEST)){
        if(!empty($paramCode)){
            switch($paramCode){
                
                /* LOGIN */
                case 'login':
                    $username = $_REQUEST['username']; //get username param
                    $password = $_REQUEST['password']; //get password param

                    /* QUERY DATABASE TO CHECK IF USER EXIST */


                break;

                /* NOTIFICATION */
                case 'notification':
                    
                break;

                default:
                    $response = $response;
            }
        }
    }

    echo json_encode($response);
?>