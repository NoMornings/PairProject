<!DOCTYPE html>
<html>
  <head>    
    <meta charset="utf-8">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap-theme.min.css" rel="stylesheet">
    <title>force paper</title>
    <link rel="stylesheet" href="register.css">
  </head>
  <body>
  <div>
    <label id="register">注册</label>
    <form id="putin" action="register.php" method="POST">
      <input type="text" id="id" name="id" placeholder="请设置用户名">
      <img id="id_p" src="userid.svg">
      <input type="password" id="password" name="password" placeholder="请设置密码">
      <img id="password_p" src="password.svg">
      <a id="login_label" href="\221801333&221801235\src\login\login.php">返回登录</a>  
      <input type="submit" id="button" value="注册">
    </form>
    <?php    
      class register{
        function isExist($id,$password) { 
          $mysqli = mysqli_connect('localhost:3306','root','','paperforce') or die("连接数据库失败");
          $user = $mysqli->query("select id from user where id = '".$id."' and password = '".$password."' limit 1");
          $result = mysqli_fetch_array($user);
          if($result) {
              echo "<label class=\"wrong\" style=\"position:absolute;left: 580px;top: 155px;
              width: 300px;height: 36px;font-size: 20px;text-align: left;\">该用户名已存在!</label>";
              exit;
          }else{
              $user = $mysqli->query("insert into user values('".$id."','".$password."')");
              echo "<label class=\"wrong\" style=\"position:absolute;left: 610px;top: 155px;
              width: 300px;height: 36px;font-size: 20px;text-align: left;\">注册成功!</label>";
              header("refresh:3;url=/221801333&221801235/src/login/login.php");
          }
        }
      }    
      session_start();    
      $register=new register;  
      if(isset($_POST['id']) and $_POST['password'])
      {
        $_SESSION['val']=$_POST['id']; 
        $register->isExist($_POST['id'],$_POST['password']);
      }
    ?>
    </div>
  </body>
</html>
