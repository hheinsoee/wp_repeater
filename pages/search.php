<?php
//genres
///posts?categories=7&orderby=date&per_page=9&_fields=author,id,excerpt,title,link,date,_links

include './videobg.php';
theNav();
function search($search=null,$page=1)
{
    $data = array(
        'search' => $search,
        // 'type'=> 'post',
        // // 'orderby' => 'date', search တွင်လုံးဝနသုံးသင့်
        // 'per_page' => 20,
        // 'page' => is_int($page)&&$page>0?$page:1,
        // '_fields' => 'id,author,excerpt,content,title,link,date,jetpack_featured_media_url,yoast_head_json', //_links
    );
    $theJson = json_decode(getIt("/search", $data), true);
    

    ?><div class="container page ">
        <div class="thumbnail_container">
            <ol><?php
                foreach ($theJson as $d) {
                    ?><li><a class="" href="?page=<?= $d['id']; ?>" title="<?= $d['title']; ?>"><?= $d['title']; ?></a></li><?php
                }
                ?>
            </ol>
        </div>
    </div> <?php
};
?>
