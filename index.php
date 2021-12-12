
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

    if (isset($_REQUEST['page'])) {
        $page = test_input($_REQUEST['page']);
        switch ($page) {
            case 'genres':
                include './pages/archives.php';
                $genres = @$_REQUEST['id'];
                $p = @$_REQUEST['p'];

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
    } else {
        include './pages/archives.php';
        archives();
    }
    // include './pages/single.php';
?>
</body>

</html>