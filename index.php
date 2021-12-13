
    <?php
    // header('Content-Type: application/json; charset=utf-8');

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
    if (isset($_REQUEST['page'])) {
        $page = test_input($_REQUEST['page']);
        switch ($page) {
            case 'genres':
                include './pages/archives.php';
                $genres = test_input(@$_REQUEST['id']);
                $p = test_input(@$_REQUEST['p']);

                if (is_numeric($genres)) { //ဂဏန်းဖြစ်ရမည် int ဖြစ်စရာမလို
                    archives($genres,$p);
                } else {
                    archives();
                }
                break;
            default:
                if (is_numeric($page)) { //ဂဏန်းဖြစ်ရမည် int ဖြစ်စရာမလို
                    include './pages/single.php';
                    videoPage($page);
                } else {
                    echo 'not found';
                }
                break;
        }
    }
    elseif(isset($_REQUEST['search'])){
        $search = test_input($_REQUEST['search']);
        $p = test_input(@$_REQUEST['p']);
        include './pages/search.php';
        search($search,$p);
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