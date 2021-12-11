<?php
function videoPage($id)
{
    $data = array(
        '_fields' => 'id,author,excerpt,content,title,link,date,_links',
    );
    //getIt('/posts/11689',$data);
    $theJson = json_decode(getIt("/posts/{$id}", $data), true);

    $thecontent = $theJson['content']['rendered'];

    $doc = new DOMDocument();
    $doc->loadHTML($thecontent);
    $selector = new DOMXPath($doc);

    $result = $selector->query('//div[@data-item]');
    // print_r($theJson );
    // loop through all found items
    foreach ($result as $node) {
        $d = $node->getAttribute('data-item');
        $v_link = json_decode($d, true)['sources'][0]['src'];
        $p_link = json_decode($d, true)['splash'];
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
            backdrop-filter:blur(15px);
            display:flex;
            align-items:center">
                <div class="container">
                    <video poster="<?= $p_link; ?>" controls>
                        <source src="<?= $v_link; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <a class="download" href="<?= $v_link; ?>" download="download">Download</a>
                    <h1><?= $theJson['title']['rendered']; ?></h1>
                </div>
            </div>
        </div>
<?php
    }
};
?>