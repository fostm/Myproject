
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>

        /* a href 일경우 밑줄을 제거 와 해당 마우스를 올렸을떄 색 변화를 지정한다.  */
        a:link { color: black; text-decoration: none;}
        a:visited { color: black; text-decoration: none;}
        /* a:hover { color: black; text-decoration: none;} */


    #wr_content {  width:100% ;  height: 400px; resize: none;  background-color:transparent;  
      padding: 1.1em; /* prevents text jump on Enter keypress */
      padding-bottom: 0.2em;}    }
    .table_div{  }

    .table_Postsave { border-collapse:collapse; width:100%; border-right:2px solid #f2f2f2; border-left:2px solid #f2f2f2;  }
    .table_Postsave thead { background-color:#d4ebf8; }
    .table_Postsave thead tr th { vertical-align: middle; padding: 15px; }
    .table_Postsave td{ vertical-align: middle; padding: 10px; border: 1px solid gainsboro; }
    .ok_form{padding-top:25px;}
    .ok_form_move{  width:100%; height: 30px;  margin: 0 auto;   right:25px;  }


    
</style>
</head>

<body>

                        <?php

                    include_once 'Server_Side/Server_fuc.php';


                    $conn = sql_connect();


                    $idx = $_REQUEST['idx'] ; //해당 게시물 인덱스

                    $sql = "select * from list_select where idx=$idx";

                    $result= mysqli_query($conn ,$sql );
                    $row = mysqli_fetch_assoc($result);


                 
                    ?>

               

                    <div class = "table_div">
                        <form action="Server_Side/list_update.php" method="post">
                        <table class="table_Postsave">
                        
                            <thead>
                            
                            <tr>
                                <th style= " width:100px;  "> 고 객 명</th>
                                <th> 등 급 </th>
                                <th> 연 락 처 </th>
                                <th>예 약 시 간 </th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td> <input type="text" name="nicname" id="nicname" style=" width:100px; height:20px; " value="<?echo $row['nicname']?> ">  </td>
                                <td>  <input type="text" name="rank" id="rank" style="  width:100px; height:20px; "value="<?echo $row['rank']?>">  </td>
                                <td> <input type="text" name="phone" id="phone" style=" height:20px; " value="<?echo $row['phone']?>">   </td>
                                <td>  <input type="text" name="resers" id="resers" style="  height:20px; " value="<?echo $row['reser']?>">  </td>
                            </tr>
                            <tr>
                                <td  align = "center"  >  내 용   </td>
                                <td colspan="5" >  
                                    
                                    <div class="wrap"  style= " text-align: left; margin:20px;  ">
                                         <textarea name="wr_content" id="wr_content"> <?echo $row['contents']?></textarea>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        

                            <div class="ok_form">

                                <div class= "ok_form_move">
                                    <input type="hidden" name="kinds_number" value="<?echo $row['kinds'] ?>">
                                    <input type="hidden" name="idx_number" value="<?echo $row['idx'] ?>">
                                    <input type="button" style="height:30px; width:55px;" value="취소" name = "fail" onclick="location.href='<?echo"main.php?page_check=content_list.php&name={$row['kinds']}"?>'">
                                    <input type="submit"  style="height:30px; width:55px;" value="수정" name = "Oks">
                                </div>
                            </div>
                            </form>
                    </div>
                
</body>
</html>