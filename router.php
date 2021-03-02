<?php 

require('./model.php');
require('./controller.php');
//echo $_SERVER['REQUEST_URI'];
//echo $_SERVER['REQUEST_METHOD'];
$method = $_SERVER['REQUEST_METHOD'];
header('Content-type: text/javascript');
$url = explode('/', $_SERVER['REQUEST_URI']);

// var_dump($url);

if(in_array('planete',$url) !== false){
    if($method == 'GET'){
        if(is_numeric($url[count($url) - 1])){
            $id = intval($url[count($url) - 1]);
            echo giveJSONofAPlanet($id, $planets);
        } else {
            echo 'Wrong parameters, should looks like /planete/4 or another number.';
        }
    } elseif($method == 'DELETE') {
        if(is_numeric($url[count($url) - 1])){
            $id = intval($url[count($url) - 1]);
            $planets = deleteAPlanet($planets, $id);
            echo 'deleted';
        } else {
            echo 'Wrong parameters, should looks like /planete/4 or another number.';
        }
    } else {
        echo 'No method for this.';
    }
    
    

} elseif(in_array('planetes',$url) !== false && $url[count($url) - 1] == 'planetes'){
    if($method == 'GET'){
        echo giveJSONofAllPlanets($planets);
    } elseif($method == 'POST'){
        var_dump($_POST);
        $planets = addAPlanet($planets,$_POST);
        echo giveJSONofAllPlanets($planets);
    } else {
        echo 'No method for this.';
    }
    
} else{
    echo "No match!";
}




?>