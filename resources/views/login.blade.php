<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body
        {
            background-color: beige;
            font-family: "Poppins", Arial, sans-serif;
            margin: 0;
            height: 100vh;          /*  persen tinggi viewport  */
            width: 100vw;           /*  persen lebar viewport   */
            overflow: hidden;       /*  Hilangkan scroll        */
        }
        main
        {
            background-color: cyan;
            padding: 50px;
            height: 340px;
            width: 200px;
            /*  posisi di tengah */
            position: absolute;                 /*  Mengapung bebas                 */
            top: 50%;                           /*  Bagian atas berjarak 50%        */
            left: 50%;                          /*  Bagian kiri berjarak 50%        */
            transform: translate(-50%, -50%);   /*  Tumpuan menjadi di engah object */
        }
        h2
        {
            font-size: 24px;
            text-align: center;
        }
        p
        {
            font-size: 10px;
        }
    </style>
</head>
<body>
    <main>
        <h2 class="login">Login</h2>
        <form name="login">
            <div class="user">
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username" required><br>
            </div>
            <div class="password">
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required><br>
            </div>
            <input type="submit" value="Login">
        </form>
        <p>Tidak memiliki akun? <a href="{{ route('register')}}">Daftar sekarang</a></p>
    </main>
</body>
</html>
