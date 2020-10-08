
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">



<title>DBproject</title>

<style>




    .table_set { border-collapse:collapse; width:100%; border-right:2px solid #f2f2f2; border-left:2px solid #f2f2f2; }
    .table_set thead { background-color:#d4ebf8;}
    .table_set thead tr th { vertical-align: middle; padding: 15px; }
    .table_set td{ vertical-align: middle; padding: 10px; border: 1px solid gainsboro; }
    .table_set tbody tr:nth-child(2n){ background-color: #ececec; }

    .ok_form{ width:100%; height: 30px;  margin: 0 auto; padding-top:25px; }
    .ok_form_move{  right:25px;  }

    .wrap{ width:100%;}
    .texts{         letter-spacing: 0.1em;
        line-height: 2em;  text-align:left; width:100%; height:auto; background-color:transparent;  border:0; resize: none;       overflow-y: hidden; /* prevents scroll bar flash */
      padding: 1.1em; /* prevents text jump on Enter keypress */
      padding-bottom: 0.2em;}
    textarea.texts { min-height: 100px; }

    #list_sel {height:30px; }
    *:focus {
    outline: none;
}
    
</style>

<script src="http://code.jquery.com/jquery-latest.js"></script>

<script> 

    $(document).ready(function() {
      $('.wrap').on( 'keyup', 'textarea', function (e){
        $(this).css('height', 'auto' );
        $(this).height( this.scrollHeight );
      });
      $('.wrap').find( 'textarea' ).keyup();
    });



</script>


</head>
<body>

        <? 
          include_once 'Server_Side/Server_fuc.php'; //서버함수 기능

          $conn = sql_connect(); //연결 완료
          
          // 디비 연결 성공 
          

         $sql=  "select * from list_select where phone = '{$_REQUEST['post_num']}'";

         $result = mysqli_query($conn , $sql);

        ?>

                <div class= "table_div">
                      <table class="table_set">
                      
                        <thead>
                          <tr>
                            <th style= " width:100px;  "> 고 객 명</th>
                            <th> 등 급 </th>
                            <th> 연 락 처 </th>
                            <th>예 약 시 간 </th>
                            <th>접 수 일 시 </th>
                         </tr>

                       </thead>
                       <tbody>

                        <? 
                        // white-space:pre; onkeydown="resize(this)" onkeyup="resize(this)"
                          $row = mysqli_fetch_assoc($result); 


                            echo "  <tr><td> "  . $row['nicname']  . "</td> " ;
                            echo "  <td> "  . $row['rank']  . "</td> " ;
                            echo "  <td> "  . $row['phone']  . "</td> " ;
                            echo "  <td> "  . $row['reser']  . "</td>  " ;
                            echo "  <td> "  . $row['receitime']  . "</td> </tr> " ;
                           echo "  <tr><td  align = 'center'>내 용</td> " ;

                 
                          
                           ?>
                          <td colspan='5'> <div class="wrap">  <textarea class="texts" readonly="readonly"  placeholder="입력바람" ><? echo $row['contents'] ?></textarea> </div></td></tr>
                           
                       
                        
                            
                       </tbody>
                      </table>
                    

                        <div class="ok_form">

                            <div class= "ok_form_move" method="post">

                             <form action="Server_Side/list_move.php">
                            <select  name="list_select" id="list_sel">

                           
                            <option value="receipt">상담접수</option>
                            <option value="failure">부결</option>
                            <option value="manage">관리</option>
                            <option value="ok">승인</option>
                            <option value="sale">판매완료</option>  
                            <option value="trash">휴지통</option>
                            </select>
                                <input type="hidden" value =<?echo $row['phone']?> name=phone_num>
                                <input type="button" style="height:30px; width:65px;" value="뒤로가기" name = "fail" onclick="location.href='<?echo"main.php?page_check=content_list.php&name={$row['kinds']}"?>'" >
                                <input type="submit" style="height:30px; width:55px;" value="저장" name = "Oks" >
                                <input type="button" style="height:30px; width:65px;" value="수정하기" name = "fail" onclick="location.href='<?echo"main.php?page_check=Post_update.php&name={$row['kinds']}&idx={$row['idx']}"?>'" >

                                 </form>

                            </div>
                        </div>
                       
                </div>
                    
</body>

</html>