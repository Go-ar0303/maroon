<?
require "db.php";



if ($_POST['set_avatar']) {
  // $name = md5(microtime()).'.'.substr($type, strlen("image/"));
  // $dir = 'uploads/avatar/';
  // $uploadfile = $dir.$name;
  //zagruzka djamanakavor papkaic mshtakan papaka
  //  if(move_uploaded_file($avatar['tmp_name'], $dir))
  //  {
  //    //$user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));

  //   // $_SESSION['avatar']-> $name;
  //    //R::store($user);
  //  }else {
  //    return false;
  //  }
  //  return true;




  $uploaddir = 'uploads/avatar/';
  $uploadfile = $uploaddir . basename($_FILES['avatar']['name']);

  echo '<pre>';
  if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
    $id = $_SESSION['id'];

    $uploadfile = '/' . $uploadfile;
    $db->query("UPDATE `users` SET `avatar`='$uploadfile' WHERE `id` = '$id'");
    $_SESSION['avatar'] = $uploadfile;
  } else {
    echo 'error';
  }
}
// $data = $_POST;
  $user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));

//   session_start();
//   function loadAvatar($avatar)
//   {
//     $type = $avatar['type'];
//     $name = md5(microtime()).'.'.substr($type, strlen("image/"));
//     $dir = 'uploads/avatar/';
//     $uploadfile = $dir.$name;
//  //zagruzka djamanakavor papkaic mshtakan papaka
//      if(move_uploaded_file($avatar['tmp_name'], $uploadfile))
//      {
//        //$user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));
//        $_SESSION['avatar']-> $name;
//        //R::store($user);
//      }else {
//        return false;
//      }
//      return true;
//   }







//  if(isset($data['set_avatar']))
//  {
//    $avatar = $_FILES['avatar'];

//    if(avatarSecurity($avatar)) loadAvatar($avatar);
//    //else echo 'duuuu';
//  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maroon</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="/css/style.css">

</head>

<body>


  

  <div class="header_menu">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">MAROON</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <div class="avat">
    <?php
     $user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));
    if ($_SESSION['auth']) : ?>
     
      
        <!--form action="" method="post" class="form" enctype="multipart/form-data">

           <input type="file"  name="avatar" class="av" value="выбрать файл">
           <input type="submit" class="upload" name="set_avatar" value="обновить Аватар">
        </form--->
        

      <p class="ava">welcome,<?= $_SESSION['firstname'] ?> </p>

      <a class="logout" href="logout.php">
           выйти
     </a>


    <? else : ?>
      <a href="/login.php">авторизоваться</a><br>
      <a href="/regist.php">зарегистрироваться</a><br>
    <? endif; ?>

  </div>
        <a class="navbar-brand" href="#">
          <img src="<?= $_SESSION['avatar'] ?><? echo $user->avatar; ?>" class="avatar"  alt="Avatar" style="width:40px;" class="rounded-pill"> 
           </a>
        
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="catalog.php">Каталог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="regist.php"><img src="image/icons8-female-user.gif" alt=""></a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="image/icons8-briefcase-24.png" alt=""></a>
                </li>

            </ul>
            

        </div>
    </div>
</nav>
</div>

<div class="cont">

<div class="header_body">
    <div class="header_img">
        <img class="header_img" src="image/Rectangle 5.jpg" alt="">
        <p>Уход для лица</p>
    </div>
    <div class="header_center">
        <h1>MAROON</h1>
        <p>Натуральная косметика
            для бережного ухода за кожей</p>
        <div> Подробнее</div>
    </div>


    <div class="header_img">
        <img class="header_img" src="image/Rectangle 6.jpg" alt="">
        <p>Уход для тела</p>
    </div>

</div>

</div>



<div class="cont">
<div class="card-group">
    <div class="card">

        <div class="card-body">
            <h5 class="card-title">Бестселлеры</h5>
            <p class="card-text">Легендарные продукты,
                завоевавшие любовь наших клиентов</p>
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-primary">Смотреть все</a>
        </div>
    </div>


    <div class="card">
        <img src="image/крем_1.jpg." class="card-img-top card_img" alt="...">
        <div class="card-body">
            <h5 class="card-title">High</h5>
            <p class="card-text">крем для лица</p>
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

    <div class="card">
        <img src="image/крем_2 1.jpg" class="card-img-top card_img" alt="...">
        <div class="card-body">
            <h5 class="card-title">Rest</h5>
            <p class="card-text">минеральная пудра</p>
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>


    <div class="card">
        <img src="image/крем_3 1.jpg" class="card-img-top card_img" alt="...">
        <div class="card-body">
            <h5 class="card-title">Rose</h5>
            <p class="card-text">крем для лица</p>
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>


    <div class="card">
        <img src="image/крем_4 1.jpg" class="card-img-top card_img" alt="...">
        <div class="card-body">
            <h5 class="card-title">Milk</h5>
            <p class="card-text">крем для лица</p>
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

</div>

</div>



<div class="cream">
<div> </div>
<div>
    <div class="cream_text">
        <h1>Встречайте весну
            вместе с нами</h1>
        <p>Попробуйте новую коллекцию ухаживающих средств для лица с SPF защитой</p>
    </div>
    <div> Подробнее</div>

</div>



</div>



<div class="cont">
<div class="cream2">
    <div class="cream2_txt">
        <div class="cream2_title">
            <h1>Индивидуальный уход</h1>
        </div>
        <div class="cream2_text">
            <p>Не всегда очевидно, какие элементы и минералы необходимы коже, а многочисленные эксперименты с
                разными средствами только ухудшают ее качество.
                Заполните анкету, и мы подберем уход, подходящий именно вам, учитывая ваш образ жизни, место
                жительства и другие факторы.
            </p>

        </div>
        <div>
            Заполнить анкету
        </div>

    </div>

    <div>
        <img src="image/aroma (1).jpg" alt="">
    </div>
</div>
</div>

<div class="roma">
<div>

</div>
<div class="roma_titl">
    <h1 class="roma_txt"> “Мы стремимся сделать уход за кожей доступным
        и приятным ритуалом для всех, кто хочет
        заботиться о себе и своем теле” </h1>

    <div class="roma_txt">Наша история</div>
</div>

</div>

<div class="cont">
<div class="us">

    <div class="photo">
        <img src="image/aroma (3).jpg" alt="">
        <img src="image/2993554 1.jpg" alt="">
        <img src="image/aroma (2).jpg" alt="">
        <img src="image/3397879 1.jpg" alt="">
        <img src="image/2693637 1.jpg" alt="">
        <img src="image/2693661 1.jpg" alt="">
    </div>
    <div>
        <h3>Присоединяйтесь к нам</h3>
        <p>и узнавайте о новиках и акциях первыми</p>
        <div>Подписаться</div>
    </div>
</div>
</div>

<div class="cont">
<div class="map">


    <section class="text-left">


        <h3 class="mb-5">Контакты</h3>

        <div class="row">


            <div class="col-lg-7">
                <form>
                    <div class="row">

                        <div class="col-md-5">
                            <ul class="list-unstyled">Адрес
                                <li>
                                    <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                    <p>
                                        <small>Санкт-Петербург,
                                            ул. Большая Конюшенная, 19
                                        </small>
                                    </p>
                                </li>
                                <li>
                                    <i class="fas fa-phone fa-2x text-primary">Телефон</i>
                                    <p>
                                        <small>+7 (923) 888-90-60</small>
                                    </p>
                                </li>
                                <li>
                                    <i class="fas fa-envelope fa-2x text-primary">E-mail</i>
                                    <p><small>info@maroon.ru</small></p>
                                </li>
                                <li>
                                    <!-- Facebook -->
                                    <a class="btn text-white btn-floating m-1"
                                        style="background-color: #3b5998;" href="#!" role="button">
                                        <i class="bi bi-facebook"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                        </svg>
                                    </a>

                                    <!-- Twitter -->
                                    <a class="btn text-white btn-floating m-1"
                                        style="background-color: #55acee;" href="#!" role="button">
                                        <i class="bi bi-twitter"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path
                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg>
                                    </a>


                                    <!-- Instagram -->
                                    <a class="btn text-white btn-floating m-1"
                                        style="background-color: #ac2bac;" href="#!" role="button">
                                        <i class="bi bi-instagram"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>

            </div>

            <div class="col-lg-5">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12094.57348593182!2d-74.00599512526003!3d40.72586666928451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2598f988156a9%3A0xd54629bdf9d61d68!2sBroadway-Lafayette%20St!5e0!3m2!1spl!2spl!4v1624523797308!5m2!1spl!2spl"
                    class="h-100 w-100" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>


    </section>
</div>
</div>



<footer class="bg-light text-end text-white " style="background-color: rgba(0, 0, 0, 0.2);">
<!-- Grid container -->
<div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
        <!-- Facebook -->
        <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button">
            <i class="bi bi-facebook"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-facebook" viewBox="0 0 16 16">
                <path
                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
            </svg>
        </a>

        <!-- Twitter -->
        <a class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button">
            <i class="bi bi-twitter"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-twitter" viewBox="0 0 16 16">
                <path
                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
            </svg>
        </a>


        <!-- Instagram -->
        <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button">
            <i class="bi bi-instagram"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-instagram" viewBox="0 0 16 16">
                <path
                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
            </svg>
        </a>


    </section>
    <!-- Section: Social media -->
</div>
<!-- Grid container -->

<!-- Copyright -->
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="">2020 Все права защищены</a>
</div>
<!-- Copyright -->
</footer>






  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
       integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>

 <script src="js/jquery.js"></script>

 <script src="js/main.js"></script>
 <script src="js/json.json"></script>
 <script src="js/price.js"></script>



  
</body>

</html>
  

