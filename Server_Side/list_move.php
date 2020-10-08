

<?php
        include_once 'Server_fuc.php';

    
    
        $conn = sql_connect( );

    $select = $_REQUEST['list_select'];
    $phone_num = $_REQUEST['phone_num'];
    $kinds_number = 0;
    



    switch($select){

        case "receipt" : $kinds_number =1; break ; 
        case "failure" : $kinds_number =2; break ; 
        case "manage" : $kinds_number =3; break ; 
        case "ok" : $kinds_number =4; break ; 
        case "sale" : $kinds_number =5; break ; 
        case "trash" : $kinds_number =6; break ; 
    }

   
    //페이지 값 변경. 
    $sql = "update list_select set kinds={$kinds_number} where phone='{$phone_num}'";
 

    

    if(!mysqli_query($conn,$sql)){
        echo  "<script>alert('변경 실패');</script>";
    }else{
        echo  "<script>alert('변경 하였습니다.'); </script>";
        Header("Location:../main.php?page_check=content_list.php&name={$kinds_number}"); 
       
    }





?>