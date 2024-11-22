<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        body {
            background-color: beige;
            font-family: "Poppins", Arial, sans-serif;
            margin: 0;
            height: 100vh;      /*  persen tinggi viewport  */
            width: 100vw;       /*  persen lebar viewport   */
            overflow: hidden;   /*  Hilangkan scroll        */
        }

        main {
            background-color: cyan;
            padding: 50px;
            width: 5%;
            height: 50%;
            min-width: 200px;
            /*  posisi di tengah */
            position: absolute;                 /*  Mengapung bebas                 */
            top: 50%;                           /*  Bagian atas berjarak 50%        */
            left: 50%;                          /*  Bagian kiri berjarak 50%        */
            transform: translate(-50%, -50%);   /*  Tumpuan menjadi di engah object */
        }

        h2 {
            font-size: 64;
            text-align: center;
        }
    </style>
</head>
<body>
    <main>
        <h2 class="login">Register</h2>
        <form name="register">
            <div class="name">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"><br>
            </div>
            <div class="email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email"><br>
            </div>
            <div class="password">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"><br>
            </div>
            <input type="submit" value="register">
        </form>
    </main>
</body>
</html>
