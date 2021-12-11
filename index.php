<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/index.css">
    <meta name="referrer" content="never">
</head>

<body>

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
    include './component/nav.php';
    if (isset($_REQUEST['page'])) {
        $page = test_input($_REQUEST['page']);
        switch ($page) {
            case 'genres':
                $genres = @$_REQUEST['id'];

                if (is_numeric($genres)) { //ဂဏန်းဖြစ်ရမည် int ဖြစ်စရာမလို
                    include './pages/archives.php';
                    archives($genres);
                } else {
                    echo 'invalid id';
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