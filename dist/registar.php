<?php
    include "dbconnect.php";
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
<form action="registar.php" method="post" class="w-full h-screen">
    <div class="flex justify-center text-center h-full items-center ">
        <div class="shadow-lg shadow-gray-400 p-14 rounded-xl xxxs:p-8 xxs:p-10 xs:p-14 sm:p-20 lg:p-36">
            <h2 class="text-blue-700 text-4xl  font-clashDisplay font-bold xxxs:text-3xl xs:text-5xl sm:text-6xl">Fish World</h2>
            <br>
            <?php
            
            if(isset($_POST["registar"])) {
                $name = $_POST['name'];
                $password = $_POST['password'];
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $confirm = $_POST['confirm'];
                $year = $_POST['year'];
                $errors = array();

                if(empty($name) || empty($password) || empty($confirm) || empty($year)) {
                    array_push($errors,'All Feilds are required');
                }
                if($password != $confirm) {
                    array_push($errors,'Password doesn\'t match');
                }

                $query = mysqli_query($con,"SELECT * FROM users WHERE user_name = '$name'");
                $row = mysqli_num_rows($query);
                if($row > 0) {
                    array_push($errors,"It already exists");
                }

                if(count($errors) > 0) {
                    foreach($errors as $error) {
                        echo "<div class='p-3 bg-rose-200 text-rose-600 rounded'>$error</div>";
                    }
                }else {
                    require_once "dbconnect.php";
                    $sql = "INSERT INTO users (user_name , user_year , user_pass) VALUES (? , ? , ? )";
                    $stmt = mysqli_stmt_init($conn);
                    $prepare = mysqli_stmt_prepare($stmt,$sql);
                   
                    if($prepare) {
                        mysqli_stmt_bind_param($stmt,"sss", $name , $year ,$passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='p-3 bg-green-200 text-green-600'>Registar successfully</div>";
                    }else {
                        echo 'something wrong';
                    }
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
             xxs:pr-20 xs:pr-28 sm:pr-52 lg:pr-72 lg:text-lg"  type="text" name="year" id="" placeholder="Enter your birth year">
            <br>
            <input class="border-solid border-2 border-blue-700 rounded sm:py-3 py-2 pl-2  pr-28 
            xxxs:pr-16 xxs:text-base xxxs:text-sm mb-4 focus:outline-none
             placeholder:text-blue-800 text-blue-800 placeholder:text-opacity-50 
             xxs:pr-20 xs:pr-28 sm:pr-52 lg:pr-72 lg:text-lg"  type="password" name="password" id="" placeholder="Enter your password">
            <br>
            <input class="border-solid border-2 border-blue-700 rounded sm:py-3 py-2 pl-2  pr-28 
            xxxs:pr-16 xxs:text-base xxxs:text-sm mb-4 focus:outline-none
             placeholder:text-blue-800 text-blue-800 placeholder:text-opacity-50 
             xxs:pr-20 xs:pr-28 sm:pr-52 lg:pr-72 lg:text-lg"  type="password" name="confirm" id="" placeholder="Comfirm your password">
            <br>

            <button   class="bg-blue-700 text-white   py-2 px-32 xxxs:px-20 xxxs:text-sm  
                    xxs:text-base rounded xxs:px-28 xs:px-28 sm:px-40 sm:text-lg lg:px-52 
                    lg:text-xl ring-2 ring-blue-700 ring-offset-2 focus:bg-blue-700/95 mb-6" name="registar">Registar</button>
                
                    <p class="text-base xxxs:text-xs xxs:text-xs xs:text-sm sm:text-base lg:text-lg">Go back to <a href="login.php" class="text-blue-800">Login</a></p>
        </div>
      
    
    </div>
  </form>  
</body>
</html>