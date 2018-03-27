<?php
$link_status = 'on';
$link_force = 'off';
$link_reward = 10;
$link[1] = "http://onlinebee.in/api?api=311d20f3718b9ee429b3d926c7e21c9be106d331&url=http://coinbox.club/check.php?k={key}&format=text";
$link[2] = "http://onlinebee.in/api?api=311d20f3718b9ee429b3d926c7e21c9be106d331&url=http://coinbox.club/check.php?k={key}&format=text";
$link_default = "http://onlinebee.in/api?api=311d20f3718b9ee429b3d926c7e21c9be106d331&url=http://coinbox.club/check.php?k={key}&format=text";








function get_token($length) {
	$str = "";
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}
?>