<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/index.js" type="module"></script>
    <script src="../assets/js/listeners.js" type="module"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <title>Employee Management</title>
</head>

<body>
    <header>
        <div class="navBar__container container-fluid">
            <div class="col navBar__menu--logo"><img src="../assets/img/buddies-logo.png" alt=""></div>
            <div class="row navBar__menu--buttons">
                <div id="dashboardTag" class="col navBar__menu--dashboard"><a href="./dashboard.php">Dashboard</a></div>
                <div id="employeeTag" class="col navBar__menu--employee"><a   href="./employee.php">Employees</a></div>
                <form class="button__logout col" action="./library/sessionHelper.php" method="post">
                    <button class="navBar__button--logout" type="submit" name="destroy">LOGOUT <i class='bx bx-log-out bx-rotate-180' ></i></button>
                </form>
            </div>
        </div>
    </header>