<?php

class Form{

private $sHTML;
private $aData;
private $aErrors;



public function __construct(){

	$this->sHTML = '<form action="" method="post" id="register">';
	$this->aData = array();
	$this->aErrors = array();
}

public function makeTextInput($sLabelText,$sControlName){

	$sData = "";
	if(isset($this->aData[$sControlName])){
		$sData = $this->aData[$sControlName];
	}

	$sError = "";
	if(isset($this->aErrors[$sControlName])){
		$sError = $this->aErrors[$sControlName];
	}

	$this->sHTML .= '<label for="'.$sControlName.'">'.$sLabelText.'</label>
		<input type="text" id="'.$sControlName.'" name="'.$sControlName.'" value="'.$sData.'"/>';
		$this->sHTML .='<span>'.$sError.'</span>';
}

public function makeSubmit($sLabelText,$sControlName){

	$this->sHTML .= '<input type="'.$sControlName.'" name="'.$sControlName.'" value="'.$sLabelText.'"/>';
}

public function checkRequired($sControlName){
	$sData = "";
	if (isset($this->aData[$sControlName])) {
		$sData = $this->aData[$sControlName];
	}
	if ($sData == "") {
		//Error Recording
		$this->aErrors[$sControlName] = "Must not be empty";
	}
}

public function __get($var){

	switch ($var) {
		case "html":
		return $this->sHTML.'</form>';			
		break;
		case "isValid":
			if (count($this->aErrors) == 0) {
				return true;
			}else{
				return false;
			}
		break;
		default: die ($var. " does not exist in form.");
		break;		
	}
}

public function __set($var,$value){
	switch ($var) {
		case 'data':	$this->aData = $value;					break;
		default:		die($var . " cannot be set in form");	break;
	}
}


}

?>
