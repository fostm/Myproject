<?php	
namespace util; 

require_once "{$_SERVER['DOCUMENT_ROOT']}/config.php";

class DB
{
	// DB 
	public static function Execute($query)
	{
		// DB 로그인
		$con = new \mysqli($GLOBALS['DB']['HOST'], $GLOBALS['DB']['ID'], $GLOBALS['DB']['PW'], $GLOBALS['DB']['NAME']);
		
		// DB 에러 핸들링
        if ($con->connect_errno)
		{
			Log::write('DATABASE', "Failed to connect to MySQL: {$con->connect_error}");
			return false;
		}

		// RETURN 값
		$returnValue = false;

		// SQL 실행
		$result = $con->query($query);
		
		if ($result)
		{	// SQL 성공
			
			if(stripos($query, "select") !== false)
			{	// SELETE 쿼리인 경우
				$resultList = array();

				if (mysqli_num_rows($result) > 0)
				{
					while($row = $result->fetch_assoc()) 
					{
						array_push($resultList, $row);
					}
				}
				$returnValue = $resultList;
				$result->free();

			}else{	// INSERT, UPDATE, DELETE 쿼리인 경우				
				if(stripos($query, "insert") !== false){
					// INSERT 인 경우 idx 반환
					$returnValue = $con->insert_id;
				}else{
					// UPDATE, DELETE 인 경우
					$returnValue = true;
				}
			}
			// SQL 로깅 
			Log::write('DATABASE', $query);

		}else	
		{	// SQL 오류
			Log::write('DATABASE', "{$query}\n[DB Error Content] - ".$con->error);
		}
		
		if ($con) {
			$con->close();
		}

		return $returnValue;
	}	
}
