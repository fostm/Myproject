
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">



<title>samchongsa</title>



<style>

        /* a href 일경우 밑줄을 제거 와 해당 마우스를 올렸을떄 색 변화를 지정한다.  */
        a:link { color: black; text-decoration: none;}
        a:visited { color: black; text-decoration: none;}
        /* a:hover { color: black; text-decoration: none;} */

    body{ margin:0px; }
    header{ display:flex; width:100%; flex-direction:column; margin: 0 auto; border-bottom:1px solid gray; background-color:#d2d2d2;   }
    .header-top1{  height: 100px; }
    .header-top1_1{position:absolute; left:75px; }
    .header-top1_2{position:absolute; right:100px; margin-top:90px; }
    .header-top1_2 span{font-size:1.3em;}
    .header-top2{ height:50px; }
    .title-name{  color:black; font-size:3em;  }
    .header-menu ul { text-align:center; margin-top:50px; margin-bottom: 35px;  }
    .header-menu ul li{ display:inline-block; width: 100px; margin:0 15px; padding: 5px 10px 5px 10px; border: 1px solid gray;background-color:white;cursor:pointer; }
    .header-menu ul li a {  font-size:1.2em; }
    .header-search{ width:1280; margin: 0 auto; height: 50px; }
    .search-form{ position:absolute; right:100px; }


    .middle-title{ background-color:#f2f2f2; height: 40px; margin-bottom:30px;  }
    .middle-title1{ width:1280px; margin:0 auto;}
    .middle-title1 span {margin-left:20px; position:relative; top:7px; font-size:1.1em;  }

    .nav_activetrue{background-color:#6e6f88 !important; }
    .nav_activetrue a { color: white; font-weight: 600; }

    .main{display: flex;}
    .main-mid{ width:1280px; margin:0 auto; text-align:center;}

 
 .bottom{ width:100%; height: 150px; background-color:#f2f2f2 }

 .logout{ cursor:pointer; }
 .logout:hover{ color:white;}


</style>


</head>

<script type="text/javascript" src="JS/jquery-3.4.1.min.js"></script>
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>


<body>

       
      
        <header>

                <div class="header-top2">
                        
                </div>
                <div class="header-top1">
                    <div class="header-top1_1">
                        <?php 
                            //세션 처리 부분.
                            session_start();
                    
                        if(empty($_SESSION)){ // 비어있는 상태면
                            Header("Location:out_connect.php"); 
                        }//안비어 있다면 그 밑으로 진행해서 시작.


                        if(empty($_REQUEST['name']) && $_REQUEST['name'] == null){
                            $page_check = 1;
                        }else{
                            $page_check = $_REQUEST['name'];
                        }
                            if($page_check == 1 ){
                                echo  "<h1 class=  'title-name'> 상담 접수 </h1>" ;
                            }else if($page_check == 2){
                                echo  "<h1 class=  'title-name'> 부 결 </h1>" ;
                            }else if($page_check == 3){
                                echo  "<h1 class=  'title-name'> 관 리 </h1>" ;
                            }else if($page_check == 4){
                                echo  "<h1 class=  'title-name'> 승 인 </h1>" ;
                            }else if($page_check == 5){
                                echo  "<h1 class=  'title-name'> 판매 완료 </h1>" ;
                            }else if($page_check == 6){
                                echo  "<h1 class=  'title-name'> 휴 지 통 </h1>" ;
                            }else{
                                echo  "<h1 class=  'title-name'> 신규 등록 </h1>" ;
                            }
                        ?>
                        </div>
                        <div class="header-top1_2">  <!--세션 처리 부분. -->
                            <?
                            if(!isset($_SESSION)){ // 비어 있는 상태면 아무것도 처리를 안함.
                                
                            }else{
                                echo "<span>{$_SESSION['user_name']} 님.</span>&nbsp&nbsp&nbsp&nbsp" ;
                                echo "<span class='logout' onclick='location.href=&#39;Server_Side/logout.php&#39;'>로그아웃</span> ";
                            }
                            ?>
                        </div>
                </div>
               

                <nav class = "header-menu">

                <?
                    if($page_check==1){

                    }else if($page_check==2){

                    }
                   
                ?>
                    <ul>                  <!-- strrpos 오른쪽항의 문자열이 왼쪽항에 들어있는지 갯수로 판별-->
                        <li class="nav_active<?echo strrpos("{$_SERVER['REQUEST_URI']}","name=0") ? 'true':''?>" 
                            onclick="location.href='main.php?page_check=Post_save.php&name=0'"><a>신규 등록</a></li>

                        <li class="nav_active<?echo strrpos("{$_SERVER['REQUEST_URI']}","name=1") ? 'true':''?>"
                            onclick="location.href='main.php?page_check=content_list.php&name=1'"><a>상담 접수</a></li>

                        <li class="nav_active<?echo strrpos("{$_SERVER['REQUEST_URI']}","name=2") ? 'true':''?>"
                            onclick="location.href='main.php?page_check=content_list.php&name=2'"><a>부결</a></li>

                        <li class="nav_active<?echo strrpos("{$_SERVER['REQUEST_URI']}","name=3") ? 'true':''?>"
                            onclick="location.href='main.php?page_check=content_list.php&name=3'"><a>관리</a></li>

                        <li class="nav_active<?echo strrpos("{$_SERVER['REQUEST_URI']}","name=4") ? 'true':''?>"
                            onclick="location.href='main.php?page_check=content_list.php&name=4'"><a>승인</a></li>

                        <li class="nav_active<?echo strrpos("{$_SERVER['REQUEST_URI']}","name=5") ? 'true':''?>"
                            onclick="location.href='main.php?page_check=content_list.php&name=5'"><a>판매 완료</a></li>

                        <li class="nav_active<?echo strrpos("{$_SERVER['REQUEST_URI']}","name=6") ? 'true':''?>"
                            onclick="location.href='main.php?page_check=content_list.php&name=6'"><a>휴지통</a></li>
                    </ul>

                </nav>
        </header>

        <section>

            <div class="contents">

                <div class="middle-title">

                    <div class="middle-title1">
                       
                    <?php // 앞으로 함수로 만들 기능.


                            if($page_check == 1 ){
                                echo  "<span> 상담 접수 </span>" ;
                            }else if($page_check == 2){
                                echo  "<span> 부 결 </span>" ;
                            }else if($page_check == 3){
                                echo  "<span> 관 리 </span>" ;
                            }else if($page_check == 4){
                                echo  "<span> 승 인 </span>" ;
                            }else if($page_check == 5){
                                echo  "<span> 판매 완료 </span>" ;
                            }else if($page_check == 6){
                                echo  "<span> 휴 지 통 </span>" ;
                            }else{
                                echo  "<span> 신규 등록 </span>" ;
                            }
                        

                        ?>
                    
                    </div>

                </div>
                <!-- 상단 띄우기 끝. 밑에 컨텐츠 등장 -->

                    <div class="main">
                        <div class="main-mid"> 
                        
                        <?

                            if(empty($_REQUEST['page_check']) && $_REQUEST['page_check'] == null ){ //변수값 없이 main.php로만 들어왔을때 
                                $_REQUEST['page_check'] ="content_list.php";
                            }
                            if(empty($_REQUEST['name']) && $_REQUEST['name'] == null ){ //변수값 없이 main.php로만 들어왔을때 
                                $_REQUEST['name'] = 1;
                                require_once("content_list.php");
                            }else{
                                require_once($_REQUEST['page_check'] );
                            }
                            
                        ?>
                        </div>
                    </div>
            </div>
    
         </section>


       
       
       <footer>

<div class= "bottom" >

        <hr>


</div>

</footer>



 
</body>
</html>