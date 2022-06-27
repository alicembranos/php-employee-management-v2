<?php
require_once VIEWS . 'header.php';
?>

<link rel="stylesheet" href="<?= CSS ?>sport.css">
<script src="https://kit.fontawesome.com/ae63adffc0.js" crossorigin="anonymous" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<script src="<?= JS ?>sport.js" type="module"></script>

<section>
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
                        <ol class="ranking" id="stepsRanking">

                        </ol>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="summaryCards">
                        <div class="card-counter danger">
                            <i class="fa-solid fa-fire"></i>
                            <p><span class="count-calories" id="calories">599</span> Kcal</p>
                            <span class="claories-name">Calories</span>
                        </div>
                        <ol class="ranking" id="caloriesRanking">
                        </ol>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="summaryCards">
                        <div class="card-counter success">
                            <i class="fa-solid fa-weight-hanging"></i>
                            <p>-<span class="count-weight" id="weight">6875</span> Kg</p>
                            <span class="weight-name">Weight</span>
                        </div>
                        <ol class="ranking" id="weightRanking">
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

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