<?php
function videoPage($id)
{
    $data = array(
        '_fields' => 'id,author,excerpt,content,title,link,date,_links,yoast_head_json',
    );
    //getIt('/posts/11689',$data);
    $theJson = json_decode(getIt("/posts/{$id}", $data), true);

    $thecontent = $theJson['content']['rendered'];

    $doc = new DOMDocument();
    $doc->loadHTML($thecontent);
    $selector = new DOMXPath($doc);

    // way 1
    if (count($selector->query('//div[@data-item]')) > 0) {
        $result = $selector->query('//div[@data-item]');
        // loop through all found items
        foreach ($result as $node) {
            $d = $node->getAttribute('data-item');
            $v_link = json_decode($d, true)['sources'][0]['src'];
            $p_link = json_decode($d, true)['splash'];
            videoplayer($p_link, $v_link, $theJson);
        }
    } 
    elseif(count($selector->query("//a[@href]"))>0) {
        $result = $selector->query("//a[@href]");
        foreach ($result as $node) {
            $link = $node->getAttribute('href');
            //if (str_contains('How are you', 'are'))
            //if (preg_match('/\bare\b/', $a)
            //$search = 'are y';
            //if(preg_match("/{$search}/i", $a))
            if (strpos($link, 'mdrive.b-cdn.net') !== false) {
                $v_link = $node->getAttribute('href');
                $p_link = @$theJson['yoast_head_json']['og_image']===null?$theJson['yoast_head_json']['twitter_image']:$theJson['yoast_head_json']['og_image'][0]['url'];
                videoplayer($p_link, $v_link, $theJson);
            }
            else{
                $p_link = @$theJson['yoast_head_json']['og_image']===null?$theJson['yoast_head_json']['twitter_image']:$theJson['yoast_head_json']['og_image'][0]['url'];
                videoplayer($p_link,null,$theJson);
            }
        }
    }
    else{
        $p_link = @$theJson['yoast_head_json']['og_image']===null?$theJson['yoast_head_json']['twitter_image']:$theJson['yoast_head_json']['og_image'][0]['url'];
        videoplayer($p_link,null,$theJson);
    }
};

function videoplayer($p_link, $v_link, $theJson)
{
    head_Tag(
        $theJson['title']['rendered'],
        $theJson['title']['rendered']."ဇတ်ကားကို တိုက်ရိုက်ကြည့် တိုက်ရိုက်ဒေါင်းပါ။",//strip_tags($theJson['excerpt']['rendered'])
        $p_link,
        "?page={$theJson['id']}",
        'video');
        theNav();
?>
    <div style="
        background-image:url(<?= $p_link ?>);
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        ">
        <div style="
            min-height:100vh;
            background-color:rgba(0, 0, 0, 0.6);
            backdrop-filter:blur(4px);
            display:flex;
            align-items:center">
            <div class="container page" >
                <?php 
                if ( $v_link === null ) {
                    echo $theJson['content']['rendered'];
                }
                else { ?>
                <video poster="<?= $p_link; ?>" controls>
                    <source src="<?= $v_link; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <?php } ?>
                <!-- <a class="download" href="<?//= $v_link; ?>" download>Download</a> -->
                <h1><?= $theJson['title']['rendered']; ?></h1>
            </div>
        </div>
    </div>
<?php
}
?>