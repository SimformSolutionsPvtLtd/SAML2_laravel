<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAML2</title>
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
        <section class='header' id='header' name='Header' >
        <img alt='profile' class='profile'
        src='https://bookstack.soffid.com/uploads/images/gallery/2021-09/0dNsaml-logo.png' />
        <p class='center-p'>A easiest way to inetgrate SAML2!</p> <br>
        <div id='align'>
            <a class='link shake' href='#'>Light Saml</a>
            <a class='link' href='#'>Using OneLogin Toolkit</a>
            <a class='link' href='#'>Auth0 SDK</a>
            <a class='link' href='#'>OneLogin SDK</a>
        </div>
    </div>
</body>

</html>
