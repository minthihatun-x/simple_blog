<?php 
    require_once("postgenerator.php");


$data = file_get_contents("gendata.json");
$posts = json_decode($data, true);

$types = [1,2];
$i = 0;
$writers = ["Min Thiha Tun", "Wenn", "Htain Htain", "Aung Thet"];
$imglinks = ["1749399653_Love.png", "1749407926_Screenshot 2025-06-07 140746.png", "1749408464_Screenshot 2025-06-08 213114.png", "1749408307_Screenshot 2025-06-07 140746.png"];
$subjects = [1,2,3,4];

foreach ($posts as $post) {
    $i++;
    $title = $post["title"];
    $content = $post["content"];
    $type = $types[$i%2];
    $writer = $writers [$i%4];
    $imglink = $imglinks [$i%4];
    $subject = $subjects [$i%4];

    insertPost($title,$type, $subject, $writer,$content, $imglink);
}

?>