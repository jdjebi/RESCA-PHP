<?php 
/* HTTP */
function get_static($path){
	// Retourne une url vers un fichier static
	return PROTOCOL."://".HOST."/static/".$path;
}

function get_url($path){
	// Retourne unr url vers une page
	return HTTP_HOST."/".$path;
}

function is_current_page($file, $tag="active"){
		// Vérifie si file est le fichier de fin d'url 
    $script_name = $_SERVER["SCRIPT_NAME"];
    $explode = explode('/',$script_name);
	$page = array_pop($explode);
	
	if($page == $file.'.php'){
		return $tag;
	} else{
		echo "not_active";
		return '';
	}
}

// Effectue un redirection à l'aide de l'expression http sur la page spécifiée
function http_redirect($page){
	$location = HTTP_HOST."\\".$page;
	header("Location:$location");
	exit();
}


/* Formulaires */
function get_if_key_exist($val,$key,$errors){
	// retourne $val si $key existe dans $errors
	if(isset($errors[$key]))
		return $val;
	else
		return "";
}

function get_clear_data($key,$form_data){
	// retourne $val si $key existe dans $errors
	if(isset($form_data[$key]))
		return $form_data[$key];
	else
		return "";
}
?>