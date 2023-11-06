<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
</head>
<body>
  <form action="login.php" method="post" class="w-full h-screen">
    <div class="flex justify-center text-center h-full items-center ">
        <div class="shadow-lg shadow-gray-400 p-14">
            <h2 class="text-blue-700 text-4xl font-clashDisplay font-bold ">Fish World</h2>
            <br>
            <input class="border-solid border border-blue-800 rounded py-2 pl-2 pr-28 mb-4 focus:outline-none
             placeholder:text-blue-800 text-blue-800 placeholder:text-opacity-50" type="text" name="name" placeholder="Enter your name">
            <br> 
            <input class="border-solid border border-blue-800 rounded py-2 pl-2 pr-28 mb-4 focus:outline-none
             placeholder:text-blue-800 text-blue-800 placeholder:text-opacity-50" type="text " type="password" name="password" id="" placeholder="Enter your password">
            <br>

            <button class="bg-blue-800 text-white   py-2 px-32 rounded ">Login</button>
        </div>
    </div>
  </form>  
</body>
</html>