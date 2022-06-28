<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= CSS ?>dashboard.css">
    <title>Employee Management</title>
</head>

<body>
    <header id="header" data-base_url="<?= BASE_URL ?>">
        <div class="navBar__container container-fluid">
            <div class="col navBar__menu--logo"><img src="../public/img/buddies-logo.png" alt=""></div>
            <div class="row navBar__menu--buttons">
                <div id="dashboardSportTag" class="col navBar__menu--dashboard"><a href="<?= BASE_URL ?>sport/sportDashboard">Dashboard</a></div>
                <div id="dashboardTag" class="col navBar__menu--dashboard"><a href="<?= BASE_URL ?>employees/dashboard">Employees</a></div>
                <div id="employeeTag" class="col navBar__menu--employee"><a href="<?= BASE_URL ?>employees/employee">Managments</a></div>
                <form class="button__logout col" action="<?= BASE_URL ?>login/logout" method="post">
                    <button class="navBar__button--logout" type="submit" name="destroy">LOGOUT <i class='bx bx-log-out bx-rotate-180'></i></button>
                </form>
            </div>
        </div>
    </header>