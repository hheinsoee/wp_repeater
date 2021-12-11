<?php
//genres
///posts?categories=7&orderby=date&per_page=9&_fields=author,id,excerpt,title,link,date,_links

$data = array(
    '_fields' => 'id,count,name,slug', //_links
);
$theJson = json_decode(getIt("/categories", $data), true);
?><ul class="nav"><?php
foreach ($theJson as $key) {
    ?>
    <li>
        <a class="nowrap" href="?page=genres&id=<?= $key['id']; ?>"><?= $key['name']; ?></a>
    </li>
    <?php
}
?></ul>