<?php  
$link=mysqli_connect("localhost","root","root", "db" );  
if (!$link)  
{  
        echo "MySQL 접속 에러 : ";
            echo mysqli_connect_error();
                exit();  
}  
mysqli_set_charset($link,"utf8"); 
$sql="select * from cafe";
$result=mysqli_query($link,$sql);
$data = array();   
if($result){  
        
        while($row=mysqli_fetch_array($result)){
                    array_push($data, 
                                        array('id'=>$row[0],
                                                        'cafe_address_lat'=>$row[1],
                                                                    'cafe_address_lon'=>$row[2]
                                                                            ));
                        }
            header('Content-Type: application/json; charset=utf8');
                $json = json_encode(array("mjkim"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
                    echo $json;
}  
else{  
        echo "SQL문 처리중 에러 발생 : "; 
            echo mysqli_error($link);
} 
 
mysqli_close($link);  
   
?>


