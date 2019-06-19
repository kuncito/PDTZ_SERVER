<?php
session_start();
$returnUrl = null;
if (is_null($returnUrl)) {
    $returnUrl = "dash.php";
}
//echo "Cierro 1:" . $_GET["logout"];
//echo "id: " . $_SESSION['id'];
if ($_GET["logout"]==1 AND $_SESSION['id_user']) {
    session_destroy();
    $message = "Has cerrado la sesión correctamente";
}

require_once("config.php");

if ($_POST['submit']=="Registrar"){ //Registro
	//Comprobar password
    if (!$_POST['password']) $error.="<br />Por favor, introduzca su contrase&ntilde;a";
    else{
        if (strlen($_POST['password']) < 6) $error.="<br />La contrase&ntilde;a debe tener un m&iacute;nimo de 6 car&aacute;cteres, la tuya tiene " . strlen($_POST['password']);
    }

    if ($error) {  //Hay errores
		$error = "Hay error(es) en el registro: $error";
	}
    else { //Todo OK
        $query= "SELECT * FROM `docentes` WHERE username ='".mysqli_real_escape_string($conn, $_POST['email'])."'";
        $result = mysqli_query($conn, $query);
        $num_results = mysqli_num_rows($result);
        if ($num_results) { //Compruebo si el username ya existe en la BD
            $error = "Este nombre ya est&aacute; registrado. &iquest;Quieres hacer login?";
        }
        else { //No existe el username en la BD, todo OK
            $query = "INSERT INTO `docentes` (username, password) VALUES ('".mysqli_real_escape_string($conn, $_POST['email'])."', '".sha1(sha1($_POST['email']).$_POST['password'])."')";
            mysqli_query($conn, $query);
            $message = "Registro completado";

            $_SESSION['id_user']=mysqli_insert_id($conn);
            $_SESSION['username'] =$_POST['email'];
            //print_r($_SESSION);

            //Redirigir a la página de logged
            header("Location:" . $returnUrl);
        }
    }
}

else if ($_POST['submit'] == "Acceder")  //Login
{
	//Uso sha1 por seguridad
    $query="SELECT * FROM `docentes` WHERE username='".mysqli_real_escape_string($conn, $_POST['loginemail'])."' AND password='".sha1(sha1($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";
    //echo $query;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    if ($row){  //Login correcto, actualizo log	
        $_SESSION['id_user']=$row['id_docente'];
        $_SESSION['username'] =$_POST['loginemail'];
        header("Location: dash.php");
    }
    else{
        $error = "Acceso incorrecto. Vuelva a intentarlo";
    }
}
?>
