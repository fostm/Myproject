

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


<?  
    include_once 'Server_fuc.php';

    $subString = "";
    $check = false;
    //검색 틀도 같이 시작 
    // if(isset($_REQUEST['searchColumn'])){ //컬럼 값 저장

    //     $searchColumn = $_REQUEST['searchColumn'];
    //     $subString .= "&amp;searchColumn={$searchColumn}";  nicname // phone
    // }
    if(isset($_REQUEST['searchText'])){ //내용 값 저장
        $searchText = $_REQUEST['searchText'];
        $subString .="&amp;searchText={$searchText}";
    }
    if(isset($_REQUEST['searchText'])){ //컬럼과 내용값으로 쿼리값 지정 isset($_REQUEST['searchColumn']) && 
        
        $searchsql ="nicname like '%{$searchText}%' OR phone like '%{$searchText}%' ";
        $check = true;
    }else{
        $searchsql ="";
    }

    

    //검색 기초 sql생성 끝


    $conn = sql_connect(); //DB 연결 완료 

    //페이징 시작 

    if(isset($_REQUEST['page'])){  //isset 함수 변수가 존재하면 true 를 그렇지 않으면 false를 반환 한다.
            $page = intval($_REQUEST['page']);  // 값이 존재 하면 page변수에 저장
    }else{
        $page =1;  // 존재하지않으면 값을 1로 
    }

    if($searchsql !=""){ // 모든곳을 찾기 위한 검색 
        $sql = "select count(*) as cnt from list_select where {$searchsql} order by receitime";

    }else{//검색을 안했을떄
        $sql = "select count(*) as cnt from list_select where kinds={$_REQUEST['name']} order by receitime";
    }
  

   
    

    $result = mysqli_query($conn , $sql);
    $row  = mysqli_fetch_assoc($result);



    
    if($row['cnt'] > 0){                    //저장값이 있다면 페이징을 실행
        
            $allPost = intval($row['cnt']); //전체 게시글의 수
            $onePage = 7 ;                  // 한 페이지에 보여줄 게시글 수
            $allPage = ceil($allPost / $onePage );  //전체 페이지의 수 
             if(isset($_REQUEST["search_true"]) && $_REQUEST["search_true"] != null){ //검색을 했을 경우..
                if($page!=1){
                    $page =1;
                }
             }
            if($page < 1 || (  $page > $allPage)){ //$allPost &&
        
                echo "<script>alert('존재하지 않는 페이지입니다.'); history.back(); </script> exit;";
            }
        
            $oneSection = 5 ; // 한번에 보여줄 총 페이지 개수 
            $currentSection = ceil( $page / $oneSection); //현재 섹션
            $allSection = ceil($allPage/$oneSection); //전체 섹션의 수 
        
        
            $firstPage = ($currentSection * $oneSection) - ($oneSection -1) ;  //현재 섹션의 처음 페이지
        
            if($currentSection == $allSection ){
                $lastPage = $allPage ; // 현재 섹션이 마지막 섹션이면 allPage가 마지막 페이지가 된다.
            }else{
                $lastPage = $currentSection * $oneSection; // 현재 섹션의 마지막 페이지.
            }
        
            $prevPage = (( $currentSection -1) *$oneSection); //이전 페이지
            $nextPage = (($currentSection + 1) * $oneSection)- ($oneSection - 1); //다음 페이지
        
            $paging = "<ul class='paging_ul'>"; // 페이징을 저장할 변수
        
            
            
            //첫 페이지가 아니라면 처음 버튼을 생성
            if($page != 1){$paging .="<li onclick='location.href=&#39;main.php?page_check=content_list.php&name={$_REQUEST['name']}&page=1{$subString}&#39;'><a style='color:#666;'><i class='fas fa-angle-double-left'></i></a></li>";}
            //첫 섹션이 아니라면 이전 버튼을 생성
            if($currentSection !=1){$paging .="<li onclick='location.href=&#39;main.php?page_check=content_list.php&name={$_REQUEST['name']}&page={$prevPage}{$subString}&#39;'><a style='color:#666;'><i class='fas fa-angle-left'></i></a></li>";}
        
        
            for($i=$firstPage; $i<=$lastPage; $i++){ //중간 페이지 갯수 생성 &#39;=작은따옴표 onclick='location.href=&#39; &#39;'
                if($i == $page){
                    $paging .="<li class='currentpage'><a>{$i}</a></li>";
                }else{
                    $paging .="<li onclick='location.href=&#39;main.php?page_check=content_list.php&name={$_REQUEST['name']}&page={$i}{$subString}&#39;'><a>{$i}</a></li>";
                
                
                }
            }
        
            //마지막 섹션이 아니라면 다음 버튼을 생성.
            if($currentSection != $allSection){$paging .="<li onclick='location.href=&#39;main.php?page_check=content_list.php&name={$_REQUEST['name']}&page={$nextPage}{$subString}&#39;'><a style='color:#666;'><i class='fas fa-angle-right'></i></a></li>";}
            //마지막 페이지가 아니라면 끝 버튼을 생성
            if($page != $allPage){ $paging .= "<li onclick='location.href=&#39;main.php?page_check=content_list.php&name={$_REQUEST['name']}&page={$allPage}{$subString}&#39;'><a style='color:#666;'><i class='fas fa-angle-double-right'></i></a></li>";}
        
            $paging .= "</ul>"; // 페이징 끝 
         
                $currentLimit = ($onePage * $page) - $onePage; //몇 번쨰의 글을 가져오는지 ex) 7 * 2 - 7 = 해당 페이지의 글목록 -14 
                $sqlLimit = "limit {$currentLimit},{$onePage}"; // limit sql 구문 (출력하는 갯수를 설정)

            
                if($searchsql !=""){ // 모든곳을 찾기 위한 검색 
                    $sql = "select * from list_select where {$searchsql} order by receitime desc {$sqlLimit}";
                    
                }else{//검색을 안했을떄
                    $sql = "select * from list_select where kinds={$_REQUEST['name']} order by receitime desc {$sqlLimit}";
                }
        
            
            $result =  mysqli_query($conn ,$sql);
           
        }else{ // 저장값이 없다면 페이징을 건너뜀.
        $paging = null;
         } 
    
            //◀ ▶  ≪ ≫
   
?>