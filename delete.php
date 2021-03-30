<?php   
header("Access-Control-Allow-Origin:*");
class search{
function isExist($search) { 
    $mysqli = mysqli_connect('localhost:3306','root','','paperforce') or die("连接数据库失败");
    $paper = $mysqli->query("delete from papers where abstract = '%".$search."%'");       
    if($paper)
    {
        echo "111";
    }
}
}     
$search=new search;  
if(isset($_POST['search']))
{
$search->isExist($_POST['search']);
}
?>