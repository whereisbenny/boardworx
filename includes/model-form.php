<?php

class Form{

	private $sHTML;
	private $aData;
	private $aErrors;
	private $aFiles;

	public function __construct(){

		$this->sHTML = '<form action="" method="post" id="register" enctype="multipart/form-data">';
		$this->aData = array();
		$this->aFiles = array();
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
		<input type="text" id="'.$sControlName.'" name="'.$sControlName.'" placeholder="'.$sLabelText.'" value="'.$sData.'"/>';
		$this->sHTML .='<span id="'.$sControlName.'Message">'.$sError.'</span>';
	}

	


	public function makePassInput($sLabelText,$sControlName){

		$sData = "";
		if(isset($this->aData[$sControlName])){
			$sData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '<label for="'.$sControlName.'">'.$sLabelText.'</label>
		<input type="password" id="'.$sControlName.'" name="'.$sControlName.'" placeholder="'.$sLabelText.'" value="'.$sData.'"/>';
		$this->sHTML .='<span id="'.$sControlName.'Message">'.$sError.'</span>';
	}

	


	public function makeSubmit($sLabelText,$sControlName){

		$this->sHTML .= '<input type="hidden" name="'.$sControlName.'" value="'.$sLabelText.'" /><button class="'.$sControlName.'">'.$sLabelText.'</button>';
	}

	public function checkRequired($sControlName){
		$sData = "";
		if (isset($this->aData[$sControlName])) {
			$sData = $this->aData[$sControlName];
		}
		if ($sData == "") {
		//Error Recording
			$this->aErrors[$sControlName] = "✗";
		}
	}

	public function addHTML($sHTML){
		$this->sHTML .=$sHTML;
	}

	public function makeUpLoadBox($sLabelText, $sControlName){
		
		$this->sHTML .= '<label for="'.$sControlName.'">'.$sLabelText.'</label>
		<input type="file" id="'.$sControlName.'" name="'.$sControlName.'" />';
		// $this->sHTML .='<span>'.$sError.'</span>';
	}

	public function makeHiddenField($sControlName, $sValue){
		
		$this->sHTML .= '<input type="hidden" name="'.$sControlName.'" value="'.$sValue.'" />';
	}


	public function moveFile($sControlName, $sNewFileName){
		
		$newname = dirname(__FILE__).'/../assets/img/products/'.$oType->TypeID.$sNewFileName;
		
		move_uploaded_file($this->aFiles[$sControlName]['tmp_name'],$newname);
		
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

	public function raiseCustomError($sControlName,$sErrorMessage){


		$this->aErrors[$sControlName] = $sErrorMessage;
		
	}

	public function __set($var,$value){
		switch ($var) {
			case 'data':	$this->aData = $value;					break;
			case 'files':	$this->aFiles = $value;					break;
			default:		die($var . " cannot be set in form");	break;
		}
	}


}

?>
