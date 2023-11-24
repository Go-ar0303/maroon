<?
require "db.php";

$data = $_POST;

$showError = false;

if(isset($data['signin']))
{
   $errors = array();
   $showError = true; 

   if(trim($data['email']) == '')
   {
     $errors[] = 'Укажите Email!';
   }
  
   if(trim($data['password']) == '')
   {
     $errors[] = 'Укажите пароль!';
   }


   $user = R::findOne('users', 'email = ?', array($data['email']));
   if($user)
   {
     if(password_verify($data['password'], $user->password))
     {
       $_SESSION['user'] = $user;
       $_SESSION['auth'] = true;
       $_SESSION['id']=$user->id;
       $_SESSION['firstname'] = $user->firstname;
       $_SESSION['lastname'] = $user->lastname;
       $_SESSION['email'] = $user->email;
       $_SESSION['admin'] = $user->admin;
       $_SESSION['avatar'] = $user->avatar;
        echo  '<div style="color: green;"> Добро пожаловать <br>
       можете перейти на <a href="index.php"> главная </a>  страницу</div>';
     }else{
       $errors[] = 'неверный пароль';
     }
   }else{
     $errors[] = 'пользователь не найден';
   }
   if($data['admin'] == '')
   {
     
     $errors[] =  "вы не являетесь админом";
   }else
   {
     echo 'вы админ!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>

  <div class="content" align="center">
    
    

      <form action="/login.php" method="post" class="auth_form">
        <h2>Авторизация</h2>
       
       <input type="email" name="email" placeholder="email"><br><br>
       <input type="password" name="password" placeholder="пароль"><br>
       <P><strong> зайти как админ </strong>:</p><br>

       <input type="checkbox" name="admin" value="<?php echo @$data['admin']; ?>">
       


       <button type="submit" name="signin">войти</button>
     </form>


   <p>
     <?php
       if($showError) 
          {
            echo showError($errors);
          }
       ?>
    </p>

  </div>
  
</body>
</html>