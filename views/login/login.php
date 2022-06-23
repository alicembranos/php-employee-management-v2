<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'>
    <link rel="stylesheet" href="<?= CSS ?>login.css">
    <title>Document</title>
</head>

<body>
    <div class="login__container--box">
        <h2 class="login__container--title">LOGIN</h2>
        <form class="login__form" action="<?= BASE_URL . 'login/login' ?>" method="post">
            <div class="user__input">
                <label for="">Email address</label>
                <input type="email" name="email" id="email">
                <i class='bx bxs-user icon__user--log'></i>
            </div>
            <div class="user__input">
                <label for="">Password</label>
                <input type="password" name="pass" id="pass">
                <i class='bx bxs-lock icon__pass--log'></i>
            </div>
            <div class="login__user--container">
                <button class="login__user--button" type="submit" name="login" value="login">Sign in</button>
            </div>
            <?php
                echo isset($this->msgLogin) ? $this->msgLogin : '';
            ?>
        </form>
    </div>

</body>

</html>