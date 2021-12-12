<?php
//genres
///posts?categories=7&orderby=date&per_page=9&_fields=author,id,excerpt,title,link,date,_links

$data = array(
    '_fields' => 'id,count,name,slug', //_links
);

if(isset($_COOKIE['genres'])){
    $theJson = json_decode($_COOKIE['genres'], true);
}
else{
    $theJson = json_decode(getIt("/categories", $data), true);
    setcookie('genres', json_encode($theJson), time() + (86400 * 30), "/"); // 86400 = 1 day
}

//12 pr pagge ;
if(isset($_REQUEST['page'])&&$_REQUEST['page']=='genres'&&isset($_REQUEST['id'])){
$parPage = 20;
$currPage = isset($_REQUEST['p'])?$_REQUEST['p']:1;
$offset = array_search($_REQUEST['id'], array_column($theJson, 'id'));
$currentgenres = $theJson[$offset];
    $count = $currentgenres['count'];
    $name = $currentgenres['name'];
    $descr = $currentgenres['description'];
    $link = "?page=genres&id={$_REQUEST['page']}&p={$currPage}";
    head_Tag($name,$descr,null,$link,$type='website');
    ?>

    <br/>
    <div class="container pxy"><h1><?=$name;?></h1><?php
    $pag = $count/$parPage;
    for ($x = 1; $x <=  $pag; $x++) {
        $active = $currPage==$x?" active " :"";
        echo "<a class = 'pagBtn {$active}' href='?page=genres&id={$currentgenres['id']}&p={$x}'>{$x}  </a>";
    }
    ?></div>
    <?php
}

?><ul class="nav"><?php
foreach ($theJson as $key) {
    if($key['count']>0&& $key['id']!=1184){
    ?><li>
        <a class="nowrap" href="?page=genres&id=<?= $key['id']; ?>" title="<?=$key['count'];?>"><?= $key['name'];?></a>
    </li><?php
    }
}
?></ul>