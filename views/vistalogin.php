<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_UrlBase('./css/style.css'); ?>">
    <title>Login</title>
</head>

<body>
    
    <div class="body-login">
    <div class="linea-izquierda">
        <img src="<?php echo get_UrlBase('./img/lineaizquierda.png'); ?>" alt="Login Image">
    </div>
        <div class="content-login">
            <span class="title">Logname</span>
            <form action="/controllers/controladorlogin.php" method="POST">
                <div class="sub-title">
                    <span>Username</span>
                    <span>
                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15 16C18.866 16 22 12.866 22 9C22 5.13401 18.866 2 15 2C11.134 2 8 5.13401 8 9C8 12.866 11.134 16 15 16ZM15 11C16.1046 11 17 10.1046 17 9C17 7.89543 16.1046 7 15 7C13.8954 7 13 7.89543 13 9C13 10.1046 13.8954 11 15 11Z"
                                fill="#1C274C" />
                            <path opacity="0.5"
                                d="M10.6089 14.4518C10.2187 14.1371 9.86294 13.7813 9.54824 13.3911L2.96967 19.9697C2.67678 20.2626 2.67678 20.7375 2.96967 21.0303C3.26256 21.3232 3.73744 21.3232 4.03033 21.0303L4.5 20.5607L5.46967 21.5303C5.76256 21.8232 6.23744 21.8232 6.53033 21.5303C6.82322 21.2375 6.82322 20.7626 6.53033 20.4697L5.56066 19.5L6.5 18.5607L7.46967 19.5303C7.76256 19.8232 8.23744 19.8232 8.53033 19.5303C8.82322 19.2375 8.82322 18.7626 8.53033 18.4697L7.56066 17.5L10.6089 14.4518Z"
                                fill="#1C274C" />
                        </svg>
                    </span>
                    <span>Password</span>
                </div>
                <div class="input-group">
                    <input type="text" id="txtusername" name="txtusername" placeholder="Username">
                </div>
                <div class="input-group">
                    <input type="password" id="txtpassword" name="txtpassword" placeholder="Password">
                    <span class="toggle-password" onclick="togglePassword()">🧿</span>
                </div>

                <script>
                    function togglePassword() {
                        const passwordInput = document.getElementById('txtpassword');
                        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
                    }
                </script>

                <div class="group-buttons">
                    <button class="remember-button" type="button">Remember</button>
                    <button class="login-button" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>