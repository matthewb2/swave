<?
include "lib.php";
?>
<html>
<head>
<title>Twitter oAuth Application by 1stwebdesigner | Update your status</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen, projection" />
<script type="text/javascript" src="./js/codebird.js"></script>
<script type="text/javascript" src="./js/jquery.min.js"></script>
</head>
<body>
<?

	$member_data[no] = 88;


require_once ('codebird.php');

Codebird::setConsumerKey("I2RyrOV4yqfzSAmIZOeHbSnCI", "Wb6MgBiA9msfHwFZDkkd2m11bdBpIA8KdC9rcvxVOUxOAC8fCw"); 

$cb = Codebird::getInstance();
$oauth_token = $_GET['oauth_token'];
$oauth_verifier = $_GET['oauth_verifier'];

$oauth_verifier = "<script>document.write(localStorage.getItem('oauth_token_secret'));</script>";

// get the access token
$cb->setToken($oauth_token, $oauth_verifier);


$reply = $cb->oauth_accessToken(array(
        'oauth_verifier' => $_GET['oauth_verifier']
));


	

	
// 회원로그인이 성공하였을 경우 세션을 생성하고 페이지를 이동함
	if($member_data[no]) {
		// if(!$_COOKIE['PHPSESSID']) setcookie("PHPSESSID", session_id(), 0, "/");

		if($auto_login) {
			makeZBSessionID($member_data[no]);
		}

		
		$zb_logged_no = $member_data[no];
		$zb_logged_time = time();
		$zb_logged_ip = $REMOTE_ADDR;
		$zb_last_connect_check = '0';
		
		/*
		session_register("zb_logged_no");
		session_register("zb_logged_time");
		session_register("zb_logged_ip");
		session_register("zb_last_connect_check");
		*/
		// 5.0x 용 세션 처리
    $_SESSION["zb_logged_no"] = $zb_logged_no;
    $_SESSION["zb_logged_time"] = $zb_logged_time;
    $_SESSION["zb_logged_ip"] = $zb_logged_ip;
	$_SESSION["username"] = $reply->screen_name;
    $_SESSION["zb_last_connect_check"]= $zb_last_connect_check;
	
	

// 회원로그인이 실패하였을 경우 에러 표시
	} else {
		head();
		Error("로그인을 실패하였습니다");
		foot();
	}
  
?>
<script>
		monvto = location.href=localStorage.getItem("url_login");
		
		window.location.href = moveto;
		</script>
