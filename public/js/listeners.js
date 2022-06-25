import { addEmployee, updateEmployee, hideErrorMessages } from "./functions.js";
const displayForm = document.getElementById("displayForm");
const addBtn = document.getElementById("addBtn");
const newEmployeeMessage = document.getElementById("newEmployeeMessage");

// Add Employee form listener
displayForm.addEventListener("click", () => {
  const rowInput = document.getElementById("rowInput");
  rowInput.classList.toggle("hide");
  //delete error messages
  const errorMessages = document.querySelectorAll(".error__validation");
  console.log(errorMessages);
  hideErrorMessages(errorMessages);
});

//Create a listener in add employee form
const addEmployeeForm = document.getElementById("addEmployeeForm");
addEmployeeForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  let jsonData = Object.fromEntries(formData.entries());
  addEmployee(jsonData);
});

