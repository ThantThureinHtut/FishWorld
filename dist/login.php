<?php
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish World</title>
    <link rel="stylesheet" href="output.css">
</head>
<body>
  <form action="login.php" method="post" class="w-full h-screen">
    <div class="flex justify-center text-center h-full items-center ">
        <div class="shadow-lg shadow-gray-400 p-14 rounded-xl xxxs:p-8 xxs:p-10 xs:p-14 sm:p-20 lg:p-24">
            <h2 class="text-blue-700 text-4xl  font-clashDisplay font-bold xxxs:text-3xl xs:text-5xl sm:text-6xl">Fish World</h2>
            <br>
            <?php
            if(isset($_POST["submit"])){
              $name  = $_POST['name'];
              $password = $_POST['password'];
              $result = mysqli_query($conn,"SELECT * FROM users WHERE user_name ='$name' or user_pass='$password'");
              $user = mysqli_fetch_array($result ,MYSQLI_ASSOC);
              if($user){
                if(password_verify($password, $user["password"])){
                  $_SESSION['name'] = $name;
                  $_SESSION['active'] = 'yes';
                  header("Location:index.php");
                }else{
                  echo '<div class="p-3  bg-rose-200 text-rose-600">Password doesn\'t match</div>';
                }
              }else {
                echo '<div class="p-3  bg-rose-200 text-rose-600">Email doesn\'t match</div>';
              }
                
            }
            ?>
            <br>
            <input class="border-solid border-2 border-blue-700 rounded sm:py-3 py-2 pl-2  pr-28 
            xxxs:pr-16 xxs:text-base xxxs:text-sm mb-4 focus:outline-none
             placeholder:text-blue-800 text-blue-800 placeholder:text-opacity-50 
             xxs:pr-20 xs:pr-28 sm:pr-52 lg:pr-72 lg:text-lg" type="text" name="name" placeholder="Enter your name">
            <br> 
            <input class="border-solid border-2 border-blue-700 rounded sm:py-3 py-2 pl-2  pr-28 
            xxxs:pr-16 xxs:text-base xxxs:text-sm mb-4 focus:outline-none
             placeholder:text-blue-800 text-blue-800 placeholder:text-opacity-50 
             xxs:pr-20 xs:pr-28 sm:pr-52 lg:pr-72 lg:text-lg" type="text " type="password" name="password" id="" placeholder="Enter your password">
            <br>

            <button   class="bg-blue-700 text-white   py-2 px-32 xxxs:px-24 xxxs:text-sm  
                    xxs:text-base rounded xxs:px-28 xs:px-32 sm:px-44 sm:text-lg lg:px-56 
                    lg:text-xl ring-2 ring-blue-700 ring-offset-2 focus:bg-blue-700/95 mb-6" name="submit">Login</button>
                
                    <p class="text-base xxxs:text-xs xxs:text-xs xs:text-sm sm:text-base lg:text-lg">If you don't have account <a href="registar.php" class="text-blue-800">Registar</a></p>
        </div>
      
        
    </div>
  </form>  
</body>
</html>