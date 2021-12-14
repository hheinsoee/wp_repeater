<?php
function archives($genres = null, $page = 1)
{
    $data = array(
        'categories' => $genres,
        'orderby' => 'date',
        'per_page' => 20,
        'page' => is_numeric($page) && $page > 0 ? $page : 1,
        '_embed'=>'wp:featuredmedia',
        '_fields' => 'id,content,title,jetpack_featured_media_url,yoast_head_json,_links,_embedded', //_links,author,excerpt,link,date,
    );
    $theJson = json_decode(getIt("/posts", $data), true);





    // pake a page


    //add html head
    //head tag 
    head_Tag('Free ဇာတ်ကားများ', 'Free ဇာတ်ကားများ', null, null, 'website');


    include './component/videobg.php';
    include './component/thumbnail.php';

    include './component/search.php';?>
    <div class="archivePage">
        <div>
            <?php
            nav(genresArray(),$genres);
            ?>
        </div>
        <div class="container page ">
            <?php theNav($genres); ?>
            <div class="thumbnail_container">
                <?php
                foreach ($theJson as $key) {
                    if ($key['jetpack_featured_media_url'] !== '') {
                        thumbnail($key);
                    };
                }
                ?>
            </div>
            <?php theNav($genres); ?>
        </div>
    </div>
<?php




    //add footer

    //    ----- END ------   //

};

?>