<?php
require_once VIEWS . 'header.php';
?>

<link rel="stylesheet" href="<?= CSS ?>sport.css">
<script src="https://kit.fontawesome.com/ae63adffc0.js" crossorigin="anonymous" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<script src="<?= JS ?>sport.js" type="module"></script>

<div class="container hide" id="sessionContent">
    <input type="hidden" name="session" id="session" value="">
    <div class="goal">
        <form action="" id="goalForm" class="hide" method="POST">
            <input type="hidden" name="beginDate" id="beginDate" value>
            <label for="days"><input type="number" id="days" name="days"> days</label>
            <label for="kilometers"><input type="number" id="kilometers"> Km</label>
            <button type="submit">Save</button>
        </form>
        <div class="goalText">
            <p class="mediumPoppins">GOAL</p>
            <div class="kmPoppins">
                <p id="kmGoal"></p>
                <p>KM</p>
            </div>
            <div class="kmRestPoppins">
                <p><span id="distance"></span> KM / </p>
                <p><span id="kmGoal2"></span> KM</p>
            </div>
            <progress id="file" max="100" value="70"></progress>
        </div>
        <div class="goalDays">
            <p class="calendarPoppins" id="daysRemaining1"></p>
            <p class="daysPoppins">DAYS</p>
        </div>

    </div>
    <div class="resumeText">
        <p class="goalResumeText">You need <strong id="kmRemaining"></strong> and <strong id="daysRemaining2"></strong> to complete the goal.</p>
    </div>
</div>
<div class="distance">
    <p class="coverage">Your team has covered a distance of <mark id="distance2" class="yellow"></mark> in <mark class="yellow" id="daysCovered"></mark> </p>
</div>
<div class="ranking">
    <div class="rankingType">
        <div class="rankingHeader">
            <p class="rankingTotal__img"><img src="../public/img/Steps.png" alt="Steps"></p>
            <p class="rankingTotal__p" id="steps">85.762</p>
            <div class="rankingText__p">
                <p>Buddies</p>
                <p>Total Steps</p>
            </div>
        </div>
        <div class="rankingBody">
            <ul class="ranking__ul" id="stepsRanking">
            </ul>
        </div>
    </div>
    <div class="rankingType">
        <div class="rankingHeader">
            <p class="rankingTotal__img"><img src="../public/img/calories.png" alt="Steps"></p>
            <p class="rankingTotal__p" id="calories">2.102</p>
            <div class="rankingText__p">
                <p>Buddies</p>
                <p>Total Calories</p>
            </div>
        </div>
        <div class="rankingBody">
            <ul class="ranking__ul" id="caloriesRanking">

            </ul>
        </div>
    </div>
    <div class="rankingType">
        <div class="rankingHeader">
            <p class="rankingTotal__img"><img src="../public/img/weight-scale.png" alt="Steps"></p>
            <p class="rankingTotal__p" id="weight">15,4</p>
            <div class="rankingText__p">
                <p>Buddies</p>
                <p>Weight Loss</p>
            </div>
        </div>
        <div class="rankingBody">
            <ul class="ranking__ul" id="weightRanking">

            </ul>
        </div>
    </div>
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