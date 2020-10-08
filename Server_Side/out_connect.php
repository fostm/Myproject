
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

    body{  margin:0px; height:100%;  background:#f5f6f7; }
    .login-form{  display:flex; flex-direction:column; width:768px; margin:0 auto; padding-top:250px;}
    .login-top{width:100%; margin:0 auto; text-align:center; }
    .login-top h1 { color:#59d4d1  ;}
    
    .login-middle{}
    #id{ width:470px;  height:15px;padding:15px;}
    .id_area{ width:500px; height:44px; border:1px solid gray;  margin: 0 auto; }
    #pas{width:470px;  height:15px;padding:15px;}
    .password_area{ width:500px; height:44px; border:1px solid gray; margin: 0 auto; }

    .login-area{ }
    .login{  color:white; font-size:1.7em; margin: 0 auto;}

    .login_area{ width:501px; height:60px; background-color:#4fe4e1; border:1px solid #4adad7; margin: 0 auto; color:white; font-size:1.2em; }
    .login_area a{ color:white;}
    #id{ border:none;}
    #pas{ border:none;} 
    


</style>

</head>
<body>

    <div class="login-form">

            <div class="login-top">
                        <h1> samchongsa.shop 접속</h1>
            </div>

            <div class="login-middle">

                <form action="Server_Side/out_TF.php" method="post">
                    <div class="id_area">
                    <input type="text" name="ids" id="id" placeholder="아이디 입력"/>
                    </div>
                    <div class="password_area"> 
                    <input type="password" name="pass" id="pas" placeholder="비밀번호 입력">
                    </div>
                    <div class="login_area">
                            <input type="submit" value="로 그 인" id="login" class="login_area"></input>
                    </div>
                </form>
                <!--  -->
            </div>  

    </div>
       



 
</body>
</html>