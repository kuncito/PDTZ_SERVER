<?php
function Authorize()
{
    $userId = $_SESSION["id_user"];

    if (is_null($userId)) { 
		$url = "http://" . $_SERVER['HTTP_HOST'] . "/login.php?returnUrl=" . "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        header('Location:'.$url);
    }
    return $userId;
}
?>
