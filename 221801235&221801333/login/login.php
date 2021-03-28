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
    <label id="login">登录</label>
    <form id="putin" action="login.php" method="POST">
      <input type="text" id="id" name="id" placeholder="请输入用户名">
      <img id="id_p" src="userid.svg">
      <input type="password" id="password" name="password" placeholder="请输入密码">
      <img id="password_p" src="password.svg">
      <a id="register_label" href="\221801333&221801235\src\register\register.php">注册账号</a>   
      <input type="submit" id="button" value="登录">
    </form>
    <?php    
      class login{
        function isExist($id,$password) { 
          $mysqli = mysqli_connect('localhost:3306','root','','paperforce') or die("连接数据库失败");
          $user = $mysqli->query("select id from user where id = '".$id."' and password = '".$password."' limit 1");

          $result = mysqli_fetch_array($user);
          if($result) {
              //header("Location: /ceshi/ue.php");exit;
          }else{
              echo "<label class=\"wrong\" style=\"position:absolute;left: 560px;top: 155px;
              width: 300px;height: 36px;font-size: 20px;text-align: left;\">用户名或密码错误!</label>";
              exit;
          }
        }
      }    
      session_start();    
      $login=new login;  
      if(isset($_POST['id']) and $_POST['password'])
      {
        $_SESSION['val']=$_POST['id']; 
        $login->isExist($_POST['id'],$_POST['password']);
      }
    ?>
    </div>
  </body>
</html>
