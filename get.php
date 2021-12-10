<?php

function getIt($path, $data)
{

    $protocol = 'https';
    $fulldomain = 'sharemal.fun'; //contain if subdomain
    // $port = null;
    $defaultpath = 'wp-json/wp/v2';

    $url = "{$protocol}://{$fulldomain}/{$defaultpath}{$path}";


    // making parfact url
    $query = http_build_query($data);

    $opts = array(
        'http' =>
        array(
            'method'  => 'GET',
            'header'  => 'Content-type: application/x-www-form-urlencoded'
        )
    );

    $context = stream_context_create($opts);
    // print_r($postdata);
    $result = file_get_contents("{$url}?{$query}", false, $context);
    return $result;
}
