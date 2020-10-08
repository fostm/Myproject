


<?php

include_once 'Server_fuc.php';



$conn = sql_connect(); //연결 완료

// 디비 연결 성공 


// post 값 넘긴걸 받는중 
$nicname  = $_POST['nicname'];
$rank = $_POST['rank'];
$phone = $_POST['phone'];
$resers = $_POST['resers'];
$contents = $_POST['wr_content'];

$str2 = trim($phone); //앞뒤 공백 제거
$str2 = str_replace(" ","-",$phone); // 사이에 공백이 들어가있을경우 -로 치환;

//연락처 중복이 존재하는지 확인하는 코드
$sql = "select count(*) as num from list_select where phone='{$str2}'";
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_assoc($result);




if(intval($row['num']) !=0){// 중복이있을때
    echo "<script>alert('등록된 고객 입니다.'); history.back(); </script> exit;";
}else{ // 중복이 없을때
        $sql = "insert into list_select(nicname,rank,phone,reser,contents,kinds) values('$nicname','$rank','$str2','$resers','$contents', 1 )";

        if(!mysqli_query($conn, $sql )){
            var_dump($sql);
            echo  "삽입 실패" ;
            echo  mysqli_error();
        }else{

            Header("Location:../main.php?name=1&page_check=content_list.php"); 

        }

}







?>



