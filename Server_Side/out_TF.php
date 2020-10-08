




<?


$id =$_REQUEST['ids'];
$pas =$_REQUEST['pass'];

if($id !="fostm"){
    echo "<script>alert('잘못된 접근입니다...'); history.back(); </script> exit;";
}else{
    if($pas !="123qwe"){
        echo "<script>alert('비밀번호가 틀렸습니다.'); history.back(); </script> exit;";
    }else{
        session_start(); //세션 시작 
    $_SESSION['user_id'] =$id;
    $_SESSION['user_name'] ="관리자";
        Header("Location:../main.php"); 
    }
}

?>

