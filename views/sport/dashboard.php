<?php
require_once VIEWS . 'header.php';
?>

<link rel="stylesheet" href="<?= CSS ?>sport.css">
<script src="https://kit.fontawesome.com/ae63adffc0.js" crossorigin="anonymous" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<script src="<?= JS ?>sport.js" type="module"></script>

<div class="container">
    <div class="goal">
        <div class="goalText">
            <p class="mediumPoppins">GOAL</p>
            <p>20.000 KM</p>
            <p>16.000 KM/20.000 KM</p>
        </div>
        <div class="goalDays">
            <p class="calendarPoppins">14</p>
            <p>days</p>
        </div>

    </div>
    <div class="resumeText">
        <p>You need 2000 KM and 2 days
            to complete the goal.</p>
    </div>
</div>
<div class="distance"></div>
<div class="ranking">
    <div class="steps"></div>
    <div class="calories"></div>
    <div class="weight"></div>
</div>

<!-- <section>
    <form action="" id="goalForm" method="POST">
        <input type="hidden" name="beginDate" id="beginDate" value>
        <label for="days"><input type="number" id="days" name="days"> days</label>
        <label for="kilometers"><input type="number" id="kilometers"> Km</label>
        <button type="submit">Save</button>
    </form>

    <div class="session__container hide " id="sessionContent">
        <input type="hidden" name="session" id="session" value="">
        <p>GOAL</p>
        <p><span id="kmRemaining"></span> km and <span id="daysRemaining"></span> days left to achieve the goal!!</p>
        <p>DISTANCE KM</p>
        <p><span id="distance"></span> KM / <span id="kmGoal"></span> KM (GOAL)</p>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="summaryCards">
                        <div class="card-counter primary">
                            <i class="fas fa-shoe-prints"></i>
                            <p><span class="count-steps" id="steps">12</span></p>
                            <span class="step-name">Steps</span>
                        </div>
                        <ul class="ranking" id="stepsRanking">

                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="summaryCards">
                        <div class="card-counter danger">
                            <i class="fa-solid fa-fire"></i>
                            <p><span class="count-calories" id="calories">599</span> Kcal</p>
                            <span class="claories-name">Calories</span>
                        </div>
                        <ul class="ranking" id="caloriesRanking">
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="summaryCards">
                        <div class="card-counter success">
                            <i class="fa-solid fa-weight-hanging"></i>
                            <p>-<span class="count-weight" id="weight">6875</span> Kg</p>
                            <span class="weight-name">Weight</span>
                        </div>
                        <ul class="ranking" id="weightRanking">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section> -->

<script>
    const dashboardTag = document.getElementById("dashboardTag");
    const employeeTag = document.getElementById("employeeTag");
    const dashboardSportTag = document.getElementById("dashboardSportTag");
    // Adds the class to give style depending the page you are
    if (window.location.href.includes("sport/sportDashboard")) {
        dashboardSportTag.classList.add("navBar-active");
        employeeTag.classList.remove("navBar-active");
        dashboardTag.classList.remove("navBar-active");
    }
</script>

<?php
require_once VIEWS . 'footer.php';
?>