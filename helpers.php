<?php
function ReturnData($key, $value) {

	if ($value == null) {
		ReturnErrorData('not found');
	} else {
		$response = array(
			'status' => true,
			'message' => 'Success',
			$key => $value);
		echo json_encode($response);
	}

}
function ReturnErrorData($message) {

	$response = array(
			'status' => false,
			'message' => $message);

	echo json_encode($response);
}


//Get QuestString value with default value if querystring is not set
function GetQueryString($name, $default="") {
    return ValidRequiredQueryString($name) ? $_GET[$name] : $default;
}

//Check that query string param is not empty
function ValidRequiredQueryString($name) {
    return isset($_GET[$name]) && $_GET[$name] != "";
}

//Get Post value with default value if querystring is not set
function GetPost($name, $default="") {
    return ValidRequiredPost($name) ? $_POST[$name] : $default;
}

//Check that post param is not empty
function ValidRequiredPost($name) {
    return isset($_POST[$name]) && $_POST[$name] != "";
}

?>