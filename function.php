<?php
function genresArray(){    
    $data = array(
        'per_page' => 50,
        '_fields' => 'id,count,name,slug', //_links
    );

    if(isset($_COOKIE['genres'])){
        $theJson = json_decode($_COOKIE['genres'], true);
    }
    else{
        $theJson = json_decode(getIt("/categories", $data), true);
        setcookie('genres', json_encode($theJson), time() + (86400 * 30), "/"); // 86400 = 1 day
    }
    return $theJson;
}
?>