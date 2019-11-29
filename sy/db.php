<?php
	function trylogin($user, $pass) {
		if($user=="admin" && $pass=="admin") {
			$idFromUser = 1;
			$return = $idFromUser;
		} else $return = "error";
		return $return;
	}
?>