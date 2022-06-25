<?php
require_once VIEWS . 'header.php';
?>

<script src="<?= JS ?>listenerEmployee.js" type="module"></script>

<!------------ Employee form------------>
<form class="container" id="employeeForm" action="" method="post">
    <input type="hidden" value="<?php echo $_SESSION["time"]; ?>" id="timeStart">
    <input type="hidden" value="<?php echo time(); ?>" id="timeCurrent">
    <input type="hidden" name="employeeId" value="<?= isset($this->employee) ? $this->employee['employee_id'] : 0 ?>">
    <div class=" row g-3">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="name" placeholder="First name" aria-label="First name" value="<?= isset($this->employee) ? $this->employee['name'] : '' ?>">
            <p class="hide error__validation" id="errorName"></p>
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="lastName" placeholder="Last name" aria-label="Last name" value="<?= isset($this->employee) ? $this->employee['lastName'] : '' ?>">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="email" class="form-control" name="email" placeholder="Example@example.com" aria-label="Email" value="<?= isset($this->employee) ? $this->employee['email'] : '' ?>">
            <p class="hide error__validation" id="errorEmail"></p>
        </div>
        <div class="col">
            <label for=""></label>
            <select class="form-control" name="gender" id="">
                <option value="" <?= (isset($this->employee) && !empty($this->employee['gender']))  ? '' : 'selected' ?>>Select gender</option>
                <option value="Man" <?= (isset($this->employee) && $this->employee['gender'] == 'man') ? 'selected' : '' ?>>Man</option>
                <option value="Woman" <?= (isset($this->employee) && $this->employee['gender'] == 'woman') ? 'selected' : '' ?>>Woman</option>
            </select>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="city" placeholder="City" aria-label="City" value="<?= isset($this->employee) ? $this->employee['city'] : '' ?>">
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="streetAddress" placeholder="Street Address" aria-label="Street Address" value="<?= isset($this->employee) ? $this->employee['streetAddress'] : '' ?>">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="state" placeholder="State" aria-label="State" value="<?= isset($this->employee) ? $this->employee['state'] : '' ?>">
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="age" placeholder="Age" aria-label="Age" value="<?= isset($this->employee) ? $this->employee['age'] : '' ?>">
            <p class="hide error__validation" id="errorAge"></p>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="postalCode" placeholder="Postal Code" aria-label="Postal Code" value="<?= isset($this->employee) ? $this->employee['postalCode'] : '' ?>">
            <p class="hide error__validation" id="errorPostalCode"></p>
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="phoneNumber" placeholder="PhoneNumber" aria-label="PhoneNumber" value="<?= isset($this->employee) ? $this->employee['phoneNumber'] : '' ?>">
        </div>
    </div>
    <a href="<?= BASE_URL ?>employees/dashboard" class="btn btn-secondary mt-5 return__button">Return</a>
    <button type="submit" class="btn btn-info mt-5 submit__button">Submit</button>
</form>

<script>
    const dashboardTag = document.getElementById("dashboardTag");
    const employeeTag = document.getElementById("employeeTag");
    // Adds the class to give style depending the page you are
    if (window.location.href.includes("employees/employee")) {
        dashboardTag.classList.remove("navBar-active");
        employeeTag.classList.add("navBar-active");
    }
</script>

<?php
require_once VIEWS . 'footer.php';
?>