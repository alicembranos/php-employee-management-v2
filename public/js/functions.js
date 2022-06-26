import { refreshTable, BASEURL } from "./index.js";

async function addEmployeeRow(formdata, form) {
  const response = await fetch(BASEURL + "/employees/addEmployee", {
    method: "POST",
    header: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formdata),
  });
  const data = await response.json();
  console.log(data);
  if (data.employee_id) {
    // Clear the form after submit
    form.reset();
    const rowInput = document.getElementById("rowInput");
    rowInput.classList.toggle("hide");
    //delete error messages
    const errorMessages = document.querySelectorAll(".error__validation");
    hideErrorMessages(errorMessages);
    refreshTable(0);
    newEmployeeMessage.textContent = "Employee added successfully";
    newEmployeeMessage.classList.toggle("hide");
    setTimeout(function () {
      newEmployeeMessage.classList.toggle("hide");
    }, 3000);
  } else {
    for (let [key, value] of Object.entries(data)) {
      if (value !== "") {
        const idElement = "error" + capitalizeFirstLetter(key);
        let errorMessage = document.getElementById(idElement);
        errorMessage.textContent = value;
        if (checkHideClass(errorMessage)) {
          errorMessage.classList.remove("hide");
        }
      } else {
        if (checkHideClass(errorMessage)) {
          errorMessage.classList.add("hide");
        }
      }
    }
  }
}

async function addEmployee(formdata) {
  console.log(formdata);
  const response = await fetch(BASEURL + "/employees/addEmployee", {
    method: "POST",
    header: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formdata),
  });
  const data = await response.json();
  console.log(data);
  if (data.employee_id) {
    //delete error messages
    const errorMessages = document.querySelectorAll(".error__validation");
    hideErrorMessages(errorMessages);
    newEmployeeMessage.textContent = "Employee added successfully";
    newEmployeeMessage.classList.toggle("hide");
    setTimeout(function () {
      newEmployeeMessage.classList.toggle("hide");
    }, 3000);
  } else {
    for (let [key, value] of Object.entries(data)) {
      if (value !== "") {
        const idElement = "error" + capitalizeFirstLetter(key);
        let errorMessage = document.getElementById(idElement);
        errorMessage.textContent = value;
        if (checkHideClass(errorMessage)) {
          errorMessage.classList.remove("hide");
        }
      } else {
        if (checkHideClass(errorMessage)) {
          errorMessage.classList.add("hide");
        }
      }
    }
  }
}

async function updateEmployee(formdata) {
  const id = formdata.employeeId;
  const response = await fetch(BASEURL + "/employees/updateEmployee/", {
    method: "POST",
    header: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formdata),
  });
  const data = await response.json();
  console.log(data);
  if (data.employee_id) {
    refreshTable(0);
    newEmployeeMessage.textContent = "Employee updated successfully";
    newEmployeeMessage.classList.toggle("hide");
    setTimeout(function () {
      newEmployeeMessage.classList.toggle("hide");
    }, 3000);
  }
}

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

function checkHideClass(element) {
  if (element.classList.contains("hide")) return true;
  return false;
}

function hideErrorMessages($elements) {
  Array.from($elements).map((message) => {
    if (!checkHideClass(message)) {
      message.classList.add("hide");
    }
  });
}

export { addEmployeeRow, addEmployee, updateEmployee, hideErrorMessages };
