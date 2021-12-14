<?php
// header('Content-Type: application/json; charset=utf-8');
function rootDir()
{
    return 'http://localhost/wp_repeater';
};
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


$pathNquery =  explode("&", $_SERVER['QUERY_STRING']);
$pathArr = explode("/", $pathNquery[0]);

switch ($pathArr[0]) {
    case 'genres':
        include './pages/archives.php';
        $p = test_input(@$_REQUEST['p']);
        if (is_numeric($pathArr[1])) { //ဂဏန်းဖြစ်ရမည် int ဖြစ်စရာမလို
            archives($pathArr[1], $p);
        } else {
            archives();
        }
        break;
    case 'search':
        $search = test_input($pathArr[1]);
        $p = test_input(@$_REQUEST['p']);
        include './pages/search.php';
        search($search, $p);
        break;
    default:
        $movie = test_input($pathArr[0]);
        if (is_numeric($movie)) { //ဂဏန်းဖြစ်ရမည် int ဖြစ်စရာမလို
            include './pages/single.php';
            videoPage($movie);
        }
        elseif (isset($_REQUEST['search']) || isset($_REQUEST['s'])) {
            $p = test_input(@$_REQUEST['p']);
            include './pages/search.php';
            search($_REQUEST['search'], $p);
        }
        else{
            include './pages/archives.php';
            archives(); //home
        }
        break;
}
// // nav(genresArray());
// if (isset($_REQUEST['genres'])) {
//     $genres = test_input($_REQUEST['genres']);
//     include './pages/archives.php';
//     $p = test_input(@$_REQUEST['p']);
//     if (is_numeric($genres)) { //ဂဏန်းဖြစ်ရမည် int ဖြစ်စရာမလို
//         archives($genres,$p);
//     } else {
//         archives();
//     }

// }
// elseif(isset($_REQUEST['search'])){
//     $search = test_input($_REQUEST['search']);
//     $p = test_input(@$_REQUEST['p']);
//     include './pages/search.php';
//     search($search,$p);
// }
// elseif(isset($_REQUEST['movie'])){
//     $movie = test_input($_REQUEST['movie']);
//     if (is_numeric($movie)) { //ဂဏန်းဖြစ်ရမည် int ဖြစ်စရာမလို
//         include './pages/single.php';
//         videoPage($movie);
//     } else {
//         echo $_REQUEST['movie'];
//     }
// }
// else {
//     //home
//     include './pages/archives.php';

//     archives(null,1);
// }
// // include './pages/single.php';
?>
</body>

</html>