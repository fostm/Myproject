


<?php

include_once 'Server_fuc.php';


$conn = sql_connect();





 // post 값 넘긴걸 받는중 
$nicname  = $_POST['nicname'];
$rank = $_POST['rank'];
$phone = $_POST['phone'];
$resers = $_POST['resers'];
$contents = $_POST['wr_content'];
$kinds = $_REQUEST['kinds_number'];
$idx = $_REQUEST['idx_number'] ;


//연락처 중복이 존재하는지 확인하는 코드
$sql = "select count(*) as num from list_select where phone='{$phone}'";
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_assoc($result);



if(intval($row['num']) > 1 ){// 중복이있을때
    echo "<script>alert('등록된 전화번호가 있습니다.'); history.back(); </script> exit;";
}else{ // 중복이 없을때
        $sql = "update list_select set nicname='$nicname',rank='$rank',phone='$phone',reser='$resers', contents='$contents' where idx=$idx";
        var_dump($sql);

        if(!mysqli_query($conn, $sql)){
            echo  "수정 실패" . mysqli_error();
        }else{

            Header("Location:../main.php?name=$kinds&page_check=content_list.php"); 

        }

}



?>