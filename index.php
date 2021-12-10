<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="referrer" content="never">
</head>
<body>

<?php
// header('Content-Type: application/json; charset=utf-8');

include 'get.php';
$data = array(
    '_fields' => 'id,author,excerpt,content,title,link,date,_links',
);
//getIt('/posts/11689',$data);
$theJson = json_decode(getIt('/posts/11484', $data), true);
$thecontent = $theJson['content']['rendered'];

$doc = new DOMDocument();
$doc->loadHTML($thecontent);
$selector = new DOMXPath($doc);

$result = $selector->query('//div[@data-item]');

// loop through all found items
foreach ($result as $node) {
    $d = $node->getAttribute('data-item');
    $v_link = json_decode($d, true)['sources'][0]['src'];
    $p_link = json_decode($d, true)['splash'];
?>
    <video poster="<?=$p_link;?>" controls>
        <source src="<?=$v_link;?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <a href="<?=$v_link;?>" download="download">Download</a>
<?php
}

?>

</body>
</html>