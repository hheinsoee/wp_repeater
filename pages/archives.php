<?php
function archives($genres = null, $page = 1)
{
    $data = array(
        'categories' => $genres,
        'orderby' => 'date',
        'per_page' => 20,
        'page' => is_int($page) && $page > 0 ? $page : 1,
        '_fields' => 'id,author,excerpt,content,title,link,date,jetpack_featured_media_url,yoast_head_json', //_links
    );
    $theJson = json_decode(getIt("/posts", $data), true);








    // pake a page


    //add html head
    //head tag အတွက် theNav ကလုပ်ပါလိမ်မေ
    
    //add nav
    theNav();
    //add body
    include './component/videobg.php';
    include './component/thumbnail.php';
    
    ?><div class="container page "><div class="thumbnail_container"><?php
    foreach ($theJson as $key) {
        if ($key['jetpack_featured_media_url'] !== '') {
            thumbnail($key);
        };
    }
    ?></div></div><?php
    



    //add footer

    //    ----- END ------   //

};

?>