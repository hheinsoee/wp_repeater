
    <?php
    // header('Content-Type: application/json; charset=utf-8');
    function rootDir(){return 'http://localhost/wp_repeater';};
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    include 'get.php';
    include './head.php';
    include './component/nav.php';
    include './function.php';
    // nav(genresArray());
    if (isset($_REQUEST['genres'])) {
        $genres = test_input($_REQUEST['genres']);
        include './pages/archives.php';
        $p = test_input(@$_REQUEST['p']);
        if (is_numeric($genres)) { //ဂဏန်းဖြစ်ရမည် int ဖြစ်စရာမလို
            archives($genres,$p);
        } else {
            archives();
        }
        
    }
    elseif(isset($_REQUEST['search'])){
        $search = test_input($_REQUEST['search']);
        $p = test_input(@$_REQUEST['p']);
        include './pages/search.php';
        search($search,$p);
    }
    elseif(isset($_REQUEST['movie'])){
        $movie = test_input($_REQUEST['movie']);
        if (is_numeric($movie)) { //ဂဏန်းဖြစ်ရမည် int ဖြစ်စရာမလို
            include './pages/single.php';
            videoPage($movie);
        } else {
            echo 'not found';
        }
    }
    else {
        //home
        include './pages/archives.php';
        
        archives(null,1);
    }
    // include './pages/single.php';
?>
</body>

</html>