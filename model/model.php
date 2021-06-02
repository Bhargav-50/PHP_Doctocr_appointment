<?php

mysqli_report(MYSQLI_REPORT_STRICT);

class model{

        public $Connect = "";
        public function __construct()
        {
            try {
                 $this-> Connect = new mysqli("localhost","root","","docappoint");
                 
            } catch (Exception $e) {
                $Msg= $e->getMessage();
                if (!file_exists('log')) {
                    mkdir("log",0777);
                }
                $Ermsg = PHP_EOL."Error Date >>". date("d-M-Y H:i:s A");
                $Ermsg = PHP_EOL."Error Msg >>". $Msg.PHP_EOL;
                $fileName = date("d_m_Y")."log.txt";
                file_put_contents("log/$fileName",$Ermsg,FILE_APPEND);
                

            }
           
            // $this-> Connect = mysqli_connect();
            // echo "<pre>";
            // print_r($this->Connect);
        }
        public function insert($tbl,$data)
        {
            // echo  $SQL = "INSERT INTO $tbl";
            // echo "<pre>";
            // print_r($data);
            $clms = implode("," , array_keys($data)) ;
            $values = implode("','" , $data) ;
            $SQL = "INSERT INTO $tbl($clms) VALUES('$values')";
            // echo "$SQL";
            $SQLEx =$this->Connect->query($SQL);
            if ($SQLEx == 1) {
                $ResponseData['Data'] = 1;
                $ResponseData['Msg'] = 'success';
                $ResponseData['Code'] = 1;
            }else {
                $ResponseData['Data'] = 0;
                $ResponseData['Msg'] = 'Try again';
                $ResponseData['Code'] = 0;
            }
            return $ResponseData;
        }
        public function select($tbl,$where='')
        {
            
            $SQL = "SELECT * FROM $tbl";
            if ($where != '') {
                $SQL.=" WHERE";
                foreach ($where as $key => $value) {
                    $SQL.=" $key ='$value' AND";
                }
                $SQL = rtrim($SQL,'AND');
            }
            $SQLEx =$this->Connect->query($SQL);

            if ($SQLEx->num_rows > 0) {
                while ($FD = $SQLEx->fetch_object()) {
                    $FetchData[] =  $FD;
                }
                $ResponseData['Data'] = $FetchData;
                $ResponseData['Msg'] = 'success';
                $ResponseData['Code'] = 1;  
            }else {
                $ResponseData['Data'] = 0;
                $ResponseData['Msg'] = 'Try again';
                $ResponseData['Code'] = 0;
            }
            return $ResponseData;
        }

    }
?>
    
