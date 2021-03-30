<!DOCTYPE html>
<html>
  <head>    
    <meta charset="utf-8">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap-theme.min.css" rel="stylesheet">
    <title>force paper</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
  <div>
    <?php   
    //形成关键词表 
      class login{
        function isExist() { 
          $mysqli = mysqli_connect('localhost:3306','root','','paperforce') or die("连接数据库失败");
          $user = $mysqli->query("select * from papers");
          $num_results = $user->num_rows; 
            for ($i=0; $i <$num_results; $i++)
            {
                $row = $user->fetch_assoc();
                $pattern = '#"(.*?)"#i'; 
                $name=$row["name"];
                $MeetingAndYear=$row["MeetingAndYear"];
                preg_match_all($pattern, $row["keyword"], $matches); 
                foreach($matches as $list=>$things){
                  if(is_array($things)){
                  foreach($things as $newlist=>$counter){                    
                  $result = preg_replace("/[^a-zA-Z0-9]+/", "", $counter);
                  $mysqli->query("insert into keyword values('".$result."','".$name."','1','".$MeetingAndYear."')");  
                  }
                 }
                }
            }
        }
        //热门领域
        function statistics(){
          $mysqli = mysqli_connect('localhost:3306','root','','paperforce') or die("连接数据库失败");
          $user = $mysqli->query("select keyword,sum(num) as total from keyword group by keyword order by total DESC limit 10");
          $num_results = $user->num_rows; 
            for ($i=0; $i <$num_results; $i++)
            {
                $row = $user->fetch_assoc();
                echo $row["keyword"].$row['total']."</br>";
            }
        }
        //热门领域的变化趋势
        function trend(){
          //获得十大热门领域
          $mysqli = mysqli_connect('localhost:3306','root','','paperforce') or die("连接数据库失败");
          $user = $mysqli->query("select keyword,sum(num) as total from keyword group by keyword order by total DESC limit 10");
          $num_results = $user->num_rows; 
          $arr=array();
          for ($i=0; $i <$num_results; $i++)
          {
              $row = $user->fetch_assoc();
              array_push($arr,$row["keyword"]);
          }
          foreach($arr as $list=>$things){  
            $year=array("ECCV 2016","ECCV 2018","ECCV 2019","ECCV 2020");                
            $a = $mysqli->query("select * from keyword where MeetingAndYear = '".$year[0]."' and keyword = '".$things."'");
            echo $a->num_rows;
            $b = $mysqli->query("select * from keyword where MeetingAndYear = '".$year[1]."' and keyword = '".$things."'");
            echo $b->num_rows; 
          }
        }
      }       
      $login=new login; 
    ?>
    </div>
  </body>
</html>
