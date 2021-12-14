<?php
//genres
///posts?categories=7&orderby=date&per_page=9&_fields=author,id,excerpt,title,link,date,_links
function nav($theJson,$selected=null){
    $blackList= array();
    ?>
    <div class="genresMenu">
        <div class="container">
        <ul>
            <?php
        foreach ($theJson as $key) {            
            $active =$selected==$key['id']?" active " :"";
            if($key['count']>0&&!in_array($key['id'], $blackList)){
            ?><li>
                <a class="genresMenuLink nowrap <?=$active;?>" href="<?=rootDir();?>/genres/<?= $key['id']; ?>" title="<?=$key['count'];?>"><?= $key['name'];?></a>
            </li><?php
            }
        }
        ?></ul>
        </div>
    </div>
    <?php 
    }

function theNav($id=null){
    if($id!==null){
        $parPage = 20;
        $currPage = isset($_REQUEST['p'])?$_REQUEST['p']:1;
        $offset = array_search($id, array_column(genresArray(), 'id'));     
        $currentgenres = genresArray()[$offset];
        $count = $currentgenres['count'];
        $name = $currentgenres['name'];
        $descr ='';
        $link = "/genres{$id}?p={$currPage}";
        // head_Tag($name.' ဇာတ်ကားများ',$descr,null,$link,'website');
        ?>

        <div class="container pxy"><h1><?=$name;?></h1><?php
        $pag = $count/$parPage;
        for ($x = 1; $x <=  $pag; $x++) {
            $active = $currPage==$x?" active " :"";
            echo "<a class = 'pagBtn {$active}' href='?p={$x}'>{$x}  </a>";
        }
        ?></div>
        <?php
    }
}

?>