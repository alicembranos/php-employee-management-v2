import { refreshTable, BASEURL } from "./index.js";
const displayForm = document.getElementById("displayForm");
const addBtn = document.getElementById("addBtn");
const newEmployeeMessage = document.getElementById("newEmployeeMessage");

// Add Employee form listener
displayForm.addEventListener("click", () => {
  const rowInput = document.getElementById("rowInput");
  rowInput.classList.toggle("hide");
  //delete error messages
  const errorMessages = document.querySelectorAll(".error__validation");
  Array.from(errorMessages).map((message) => {
    if (!checkHideClass(message)) {
      message.classList.add("hide");
    }
  });
});

//Create a listener in add employee form
const addEmployeeForm = document.getElementById("addEmployeeForm");
addEmployeeForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  let jsonData = Object.fromEntries(formData.entries());
  const response = await fetch(BASEURL + "/employees/addEmployee", {
    method: "POST",
    header: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(jsonData),
  });
  const data = await response.json();
  console.log(data);
  if (data.employee_id) {
    // Clear the form after submit
    addEmployeeForm.reset();
    const rowInput = document.getElementById("rowInput");
    rowInput.classList.toggle("hide");
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
});

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

function checkHideClass(element) {
  if (element.classList.contains("hide")) return true;
  return false;
}
