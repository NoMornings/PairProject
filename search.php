<?php   
header("Access-Control-Allow-Origin:*");
class search{
function isExist($search) { 
    $mysqli = mysqli_connect('localhost:3306','root','','paperforce') or die("连接数据库失败");
    $paper = $mysqli->query("select * from papers where abstract like  '%".$search."%' or MeetingAndYear like  '%".$search."%' or keyword like  '%".$search."%' or releaseTime like  '%".$search."%' or keyword like  '%".$search."%' or name like  '%".$search."%'");       
    $num_results = $paper->num_rows; 
    for ($i=0; $i <$num_results; $i++)
    {
        $row = $paper->fetch_assoc();
        echo"111"; 
    }
}
}     
$search=new search;  
if(isset($_POST['search']))
{
$search->isExist($_POST['search']);
}
?>