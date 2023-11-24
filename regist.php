<?
 require "db.php";
 $data = $_POST;

 $showError = false;

 
ini_set('display_errors', 1);

?><pre><?
//var_dump($_SESSION);
?></pre><?

$hex = array(
  '#F29B34',
  '#A19C69',
  '#3C3741',
  '#25373D',
  '#EB9532',
  '#60646D'
);

if (
  isset($_POST['firstname']) && isset($_POST['email']) &&
  !empty($_POST['firstname']) && !empty($_POST['email'])
) {

$firstname = $_POST['firstname'];
$email = $_POST['email'];

$avatar_example = file_get_contents('./uploads/avatar/avatar.png');

$dir = __DIR__.'/uploads/avatar';

if ( !empty($_FILES['avatar']['name']) ) {

  $filename = $dir.'/'.basename($_FILES['avatar']['name']);

  if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $filename)) {
    die('Error: avatar not uploaded!');
  }

  // Далее сохраняем картинку в БД и т.п...

} else {

  $avatar_example = str_replace('USERNAME', $letters, $avatar_example);
  $avatar_example = str_replace('HEX_COLOR', $hex[array_rand($hex, 1)], $avatar_example);

  $gen_avatar = md5($letters).'.png';

  file_put_contents($dir.'/'.$gen_avatar, $avatar_example);

  echo <<<HTML

<h1>{$firstname} {$email}</h1>
<br>
<img src="uploads/{$gen_avatar}" />

HTML;

}

}

 if(isset($data['signup']))
 {
  $errors =  array();
  $showError = true; 

  if(trim($data['firstname']) == '')
  {
    $errors[] = 'Укажите имя!';
  }
  
  if(trim($data['lastname']) == '')
  {
    $errors[] = 'Укажите фамилю!';
  }
  
  if(trim($data['email']) == '')
  {
    $errors[] = 'Укажите Email!';
  }
  
  if(trim($data['password']) == '')
  {
    $errors[] = 'Укажите пароль!';
  }
  
  if(trim($data['password']) != trim($data['password_2']))
  {
    $errors[] = 'неверный пароль!';
  }
  if(R::count('users', 'email = ?', array($data['email'])) > 0)
  {
    $errors[] = 'пользователь с таким e-mail уже существует';
  }

    
  if($data['admin'] == '')
  {
    
    $errors[] =  "вы не являетесь админом";
  }else
  {
    echo 'вы админ!';
  }

  if(empty($errors))
  {
    $user = R::dispense('users');
    $user->firstname = $data['firstname'];
    $user->lastname = $data['lastname'];
    $user->email = $data['email'];
    $user->admin = $data['admin'];
    $user->avatar = 'uploads/avatar/';
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
    R::store($user);

    echo  '<div style="color: green;"> Вы успешно зарегистрированы <br>
        можете перейти на <a href="login.php"> </a> авторизований.</div>';
  }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<div class="content" align="center">
<img src="/uploads/avatar/avatar.png" rel="stylesheet"/>
  <form action="/regist.php" method="post" class="auth_form">
   <h2>регистрация</h2>
   <input id="avatar" type="file" name="avatar"/><br><br>
   <input type="text" name="firstname" placeholder="имя"><br>
   <input type="text" name="lastname" placeholder="фамилия"><br>
   <input type="email" name="email" placeholder="Email"><br>
   <input type="password" name="password" placeholder="пароль"><br>
   <input type="password" name="password_2" placeholder="подтвердить пароль"><br>
   <p>являетесь вы админом</p>
   <input type="checkbox" name="admin"><br>
  <button type="submit" name="signup">регистрация</button>
  </form>
  
  <p><?php
    if($showError) 
    {
      echo showError($errors);
    }
  ?></p>

<a href="login.php">у вас уже есть аккаунт</a>

</div>
  
</body>
</html>