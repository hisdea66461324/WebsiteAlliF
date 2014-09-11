<?php
#************************************************************
# Object : PPLDataObject
# Editor : Seonghwan Yoon(HISDEA)
# Last update date : 2014.09.05
# exp: 기존 mysql바탕으로 구현된 class를 MySqli로 변환
#************************************************************

class MySqliObject { 
  //DB설정
  private $host     = 'us-cdbr-azure-east-a.cloudapp.net';
  private $database = 'as_6fe275fd1d13cac';
  private $user     = 'bab56704131137';
  private $password = '296af0ec';
 
 	//MySqli Setting
 	private $isAutoFree = 0;
  private $isHaltOnError = "yes"; 
  
  //Error
  protected $isError = 0;
  protected $errorNo = 0;
  protected $error = "";
  
  //DB Version 
  private $type     = "MySql";
  private $revision = "5.5.38";
  
  //DB Data
  protected $mySqliObject;
	protected $Record   = array();
  protected $queryID;
  protected $row;
	
	
 	//MySqliObject 생성자  
  public function __construct() {
    $this->mySqliObject = new mysqli($this->host, $this->user, $this->password, $this->database);
    
    if ($this->mySqliObject->connect_error) {
    	die('Connect Error (' . $this->mySqliObject->connect_errno . ') '. $this->mySqliObject->connect_error);
		}
  }


	//쿼리 실행
	public function Query($strQuery){
		$this->queryID = $this->mySqliObject->query($strQuery);
		$this->row = 0;
	}
	
	//현재 실행한 쿼리 ID구하기
	public function GetQueryID() {
		return $this->queryID;
	}
	
	//자료 갯수 구하기
	public function GetRowCount() {
		return $this->queryID->num_rows;
	}
 
 	//다쓴 자원 풀어주기
  public function Free() {
      $this->queryID->free();
      $this->queryID = 0;
  }
  
  //다쓴 자원 닫
  public function Close() {
      //@mysqli_close($this->linkID);
      $this->mySqliObject->close();
      $this->mySqliObject = null;
  }
 	
 	//다음 레코드로 이동
	function NextRecord() {
		if(!$this->queryID) {
			$this->halt("Next record called with no query pendding.");
			return 0;
		}
		
		$this->Record = $this->queryID->fetch_array(MYSQLI_BOTH);
		$this->row++;
		$this->errorNo  = mysqli_errno($this->mySqliObject);
    $this->error  = mysqli_error($this->mySqliObject);
    
    $recordResult = is_array($this->Record);
    
    if (!$recordResult && $this->isAutoFree) {
      $this->Free();
    }
    return $recordResult;
	}
	
	//인덱스로 레코드 찾기
	public function Seek($position){
    $seekData = $this->queryID->data_seek($position);
    $this->Record = $this->queryID->fetch_row();
		
    if ($seekData){
      $this->row = $position;
    } 
    else {
      $this->halt("seek($position) failed: result has ".$this->GetRowCount()." rows");
      $this->queryID->data_seek($position);
      $this->row = $this->GetRowCount();
      return 0;
    }
    return 1;
	}
  
  //현재 MySql 지원 형식 이름으로 그대로 사용
  public function affected_rows() {
  	return $this->mySqliObject->affected_rows;
  }
  
  //위에 Affected_rows를 변경해서 사용하자.
  public function GetAffectedRows() {
  	return $this->mySqliObject->affected_rows;
  }

	//기존 형식
  function num_rows() {
    return $this->queryID->num_rows;
  }
  
  //num_rows의 변경형식
  public function GetNumRows() {
		return $this->queryID->num_rows;
	}
  
  //기존방식
  function num_fields() {
    return  $this->mySqlObject->field_count;
  }
  
  //num_fields의 변경형
  public function GetNumFields() {
  	return $this->mySqlObject->field_count;
  }
	
	//필드에 따른 자료값얻기
  function f($Name) {
    return $this->Record[$Name];
  }
  
  //필드에 따른 자료값얻기
  public function GetData($name){
  	return $this->Record[$name];
  }

  function p($Name) {
    print_r($this->Record[$Name]);
  }
  
  function ShowRecordData($name) {
  	print_r($this->Record[$name]);
  }
  
  function Halt($msg) {
    $this->Error = $this->mySqliObject->error;
    $this->ErrorNo = $this->mySqliObject->errno;
    if ($this->isHaltOnError == "no")
      return;

    $this->ShowHaltMsg($msg);

    if ($this->isHaltOnError != "report")
      die("Session halted.");
  }

  function ShowHaltMsg($msg) {
    printf("</td></tr></table><b>Database error:</b> %s<br>\n", $msg);
    printf("<b>MySQLi Error</b>: %s (%s)<br>\n",
      $this->ErrorNo,
      $this->Error);
  }
}
?>