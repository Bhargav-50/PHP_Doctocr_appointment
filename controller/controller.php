<?php
ob_start();
session_start();
require_once('model/model.php');
class controller extends model{
    public function __construct(){
        parent::__construct();
        //echo '<pre>';
        //print_r($_SERVER);
        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include_once('views/header.php');
                    include_once('views/mainpage.php');
                    include_once('views/footer.php');
                    break;


                    /*ajax....*/
                    case '/datealready':
                    $unamedata = $this->select('patient', array("date_time" => $_REQUEST['date']));
                    echo json_encode($unamedata);
                    break;


                        
                case '/appointment':
                    // include_once('views/header.php');
                    include_once('views/appointment/appointment.php');
                    // include_once('views/footer.php'); 
                    
                    if (isset($_REQUEST['btn-save'])) {
                        //    echo "<pre>";
                        //    print_r($_REQUEST);}
                            $InsertData = array("name"=>$_REQUEST ['uname'],"contact"=>$_REQUEST ['mobile'], "doc_name"=>$_REQUEST ['doc_name'], "date_time"=>$_REQUEST ['date']); 
                              $InsertRes = $this->insert("patient",$InsertData);
                            //   echo "<pre>";
                            //   print_r($InsertRes);
                            if ($InsertRes['Code'] == 1) { 
                                 echo "<script>alert('Register success')</script>";
                                 header("location:home");
                            }else {
                                echo "<script>alert('Try again')</script>";
                            }
                        }
                    break;
                }
        }else {
            header('location:home');
        }
    }
}
$controller = new controller();
ob_end_flush();
?>