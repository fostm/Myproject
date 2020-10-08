
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">




<title>DBproject</title>

<style>

        /* a href 일경우 밑줄을 제거 와 해당 마우스를 올렸을떄 색 변화를 지정한다.  */
        a:link { color: black; text-decoration: none;}
        a:visited { color: black; text-decoration: none;}
        /* a:hover { color: black; text-decoration: none;} */

    main_table {width:1280px; } 
    .table_list { border-collapse:collapse; width:100%;}
    .table_list thead { background-color:#d4ebf8; }
    .table_list thead tr th { vertical-align: middle; padding: 15px; }
    .table_list td{ vertical-align: middle; padding: 10px; border: 1px solid gainsboro; }
    .table_list tbody tr:nth-child(2n){ background-color: #ececec; }
    .table_list tbody tr:hover{ background-color: #b4cde3;}


    #select_1{ height:30px;}

    #DipageMove{cursor:pointer;}
    .paging_ul {text-align:center; }
    .paging_ul li{display:inline-block; padding:10px; background-color:#f2f2f2; border: 1px solid gray; cursor:pointer; }

    .currentpage {background-color:#6e6f88 !important; }
    .currentpage a { color: white; font-weight: 600; }

</style>
<script type="text/javascript" src="JS/bootstrap.js" >  </script>
<script type="text/javascript" src="JS/jquery-3.4.1.min.js"></script>

</head>
<!-- 빈칸이 있는지 확인 --> 
<script language="javascript"> 
       
       function check_input(){
           theForm =document.form1;
           if(theForm.searchText.value==""){
               alert("검색란이 비어있습니다.");
               
           }
       }

       </script>	
<body>

        <?php
        include_once 'Server_Side/Server_fuc.php'; //서버함수 기능

        $conn = sql_connect(); //연결 완료

        
        
        // 디비 연결 성공 
       
        //쿼리 시작 
  
       
        

        require_once('Server_Side/paging.php'); //페이징 완료.

        ?>
           
        <div  class="header-search">   
                        <form class = "search-form" method="post" name="form1">
                        <input type='hidden' name="page_check" value="<?=$_REQUEST['page_check']?>"/>
                        <input type='hidden' name="name" value="<?=$_REQUEST['name']?>"/>
                        <input type='hidden' name="search_true" value="true"/>
                        
                        <!-- <select name="searchColumn" id="select_1"> -->

                        <!-- <option value="nicname"> 고객명 </option> -->
                        <!-- <option value="phone"> 연락처 </option> -->
                        <!-- </select> -->
                        <input type="text" name ="searchText" style="height:25px;"/>
                        <button type="submit" style="height:30px; width:55px; "  onclick="check_input()">검색</button>
                        </form>
        </div>

            <div class="main_table">
                <table class = "table_list">
                <?if($row['cnt'] == 0){
                          echo "<tr><td colspan='5'> " . "<p>해당 게시물이 없습니다.</p> "  .  " </td></tr>" ;
                   }else{ 
                ?>
                            <thead >
                                <tr>
                                    <th>고 객 명</th>
                                    <th>등 급</th>
                                    <th>연 락 처</th>
                                    <th>예 약 시 간</th>
                                    <th>접 수 일 시</th>
                                </tr>
                            </thead>

                            <tbody>

                            <?
                                $position = ""; //해당 위치 표시를 위한 변수 정의;
                                while($row = mysqli_fetch_assoc($result) ){
                                    
                                
                               
                                   if($check==true){ // 검색을 한후 해당 사람이름 옆에다가 속한 곳 표시.
                                        switch($row['kinds']){

                                            case '1' : $position ="상담접수"; break ; 
                                            case '2' : $position ="부결"; break ; 
                                            case '3' : $position ="관리"; break ; 
                                            case '4' : $position ="승인"; break ; 
                                            case '5' : $position ="판매완료"; break ; 
                                            case '6' : $position ="휴지통"; break ; 
                                        }
                               
                                    echo   "<tr>  <td id='DipageMove' onclick='location.href=&#39;main.php?page_check=Post.php&post_num={$row['phone']}& name={$_REQUEST['name']}&#39;' > <a style='color:#5a52d0; font-weight:600;'>{$row['nicname']}({$position})</a></td> "  ;   
                                   }else{// 검색을 하지 않고 실행
                                    
                                    echo   "<tr>  <td id='DipageMove' onclick='location.href=&#39;main.php?page_check=Post.php&post_num={$row['phone']}& name={$_REQUEST['name']}&#39;' > <a style='color:#5a52d0; font-weight:600;'>{$row['nicname']}</a></td> "  ;    
                                   }
                                   
                                   
                                    echo "<td> " . $row['rank']   .  " </td>" ;
                                    echo "<td> " .  $row['phone']    .  " </td>" ;
                                    echo "<td> " . $row['reser']   .  " </td>" ;
                                    echo "<td> " . $row['receitime']   .  " </td></tr>" ;
                                }
                        }
                            ?>
                            </tbody>    
                        </table>
                            
                                <div class="paging">
                                
                                    <?php
                                    
                                    if($paging == null){
                                        echo "";
                                    }else{
                                    echo $paging;
                                    }
                                    ?>

                                </div>

                    </div>
</body>
        
</html>