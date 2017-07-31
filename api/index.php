<?php

     require '../myPHPLibraries/controller/connection.php';
     require '../includes/functions.php';

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
                     $col = ['user_id','access','verified'];
                     $con = array('username' => $username, 'password'=> $password);

                     $result = $obj->select("tbl_user", $col, $con);

                        if(!empty($result)){
                            foreach($result[0] as $key => $value):
                                $response['res'][0][$key] = $value;
                            endforeach;
                             $response['success'] = 1;
                        }else{
                             $response['success'] = 0;
                             $response['message'] = 'User not Found!';
                        }

                        if(!empty($response['res'][0]['user_id']) 
                            && ($response['res'][0]['access'] == 2) 
                            && ($response['res'][0]['verified'] == 0) )
                        {
                            $response['success'] = 2;
                            $response['message'] = 'User not verified. Please check your email upon registration!';
                        }
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