<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlyLinx | Hassified</title>
    <!-- social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #e1e2dd;
            text-align: center;
            font-family: "Gill Sans", sans-serif;
            font-size: 16px;
            font-weight: lighter;
            margin-top: 20px;
        }

        .container {
            margin: auto;
            width: 95%;
        }

        .profile {
            height: auto;
            width: 125px;
            border-radius: 90px;
            border: #6a6a6a solid 3px;
            margin: auto;
        }

        #align {
            text-align: center;
            max-width: 600px;
            margin: auto;
        }

        .link {
            background-color: #fffbf4;
            color: #695751;
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            width: 100%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid #c7ab96;
            border-radius: 40px;
            cursor: pointer;
            transition: color 1s;
            text-decoration: none;
        }

        .link:hover {
            background-color: #a65b3b;
            color: #fffbf4;
            border: 2px solid #695751;
            transition: background-color 1s;
        }

        a {
            color: #695751;
        }

        a:hover {
            color: #a65b3b;
            text-decoration: none;
        }

        /* shake effect */
        .shake {
            animation: shake-animation 4.72s ease infinite;
            transform-origin: 50% 50%;
        }

        @keyframes shake-animation {
            0% {
                transform: translate(0, 0);
            }

            1.78571% {
                transform: translate(5px, 0);
            }

            3.57143% {
                transform: translate(0, 0);
            }

            5.35714% {
                transform: translate(5px, 0);
            }

            7.14286% {
                transform: translate(0, 0);
            }

            8.92857% {
                transform: translate(5px, 0);
            }

            10.71429% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(0, 0);
            }
        }

        .user-p {
            font-family: "Brush Script MT", cursive;
            font-size: 35px;
            font-weight: normal;
            color: 4c6165;
            text-shadow: 1px 1px 1px #fffbf4, 2px 2px 1px #fffbf4;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .center-p {
            text-align: center;
            color: 6a6a6a;
            font-size: 16px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .center-footer {
            text-align: center;
            color: 6a6a6a;
            font-size: 15px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        p {
            font-weight: bolder;
        }

        .social {
            display: inline-block;
        }

        .social a {
            display: inline-block;
            margin: 0 5px;
            font-size: auto;
        }

        /* Style all font awesome icons */

        .fa {
            padding: 20px;
            font-size: 50px;
            width: 20px;
            text-align: center;
            text-decoration: none;
        }

        .fa:hover {
            opacity: 0.7;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class='container'>
        <b:section class='header' id='header' name='Header' />
        <img alt='profile' class='profile' src='' />
        <p class='user-p'>OnlyLinx</p>
        <p class='center-p'>A way to share your social links!</p>
        <div id='align'>
            <a class='link shake' href='#'>Web Site</a>
            <a class='link' href='#'>Etsy Shop</a>
            <a class='link' href='#'>Discord</a>
            <a class='link' href='#'>DeviantART</a>
            <a class='link' href='#'>Contact Me</a>
        </div>
        <!-- social icons -->
        <p class="social a">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-pinterest"></a>
        </p>
        <p class='center-footer'>OnlyLinx Created by
            <a href='https://codepen.io/hassified' target="_blank">Hassified</a>
        </p>
    </div>
</body>

</html>
