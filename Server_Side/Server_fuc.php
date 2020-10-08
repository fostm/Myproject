



<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<?

// 호스트 설정 값  호스트:183.111.199.222 네임: houk0825 pass: k1986qwer bas:houk0825



 function sql_connect( ){ // 연결 함수
  

    $host_name = "127.0.0.1"; //183.111.199.208
    $user_name = "root";
    $passwerds = "akdltks12!@";
    $data_bas = "simpldb";

  
    $conn = mysqli_connect($host_name , $user_name , $passwerds, $data_bas );

    
    
       
    $ab  =2 ;
    



     return $conn ;
 }



?>
