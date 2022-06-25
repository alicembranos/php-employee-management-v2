import { addEmployee, updateEmployee, hideErrorMessages } from "./functions.js";

//Create listener in employee view for update and create
const employeeSubmit = document.getElementById("employeeForm");
employeeSubmit.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  let jsonData = Object.fromEntries(formData.entries());
  if (jsonData.hasOwnProperty("employeeId")) {
    updateEmployee(jsonData);
  }
  addEmployee(jsonData);
});
