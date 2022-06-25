import { addEmployee, updateEmployee } from "./functions.js";
console.log("entro");
//Create listener in employee view for update and create
const employeeSubmit = document.getElementById("employeeForm");
employeeSubmit.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  let jsonData = Object.fromEntries(formData.entries());
  if (jsonData.employeeId !== "0") {
    updateEmployee(jsonData);
  }
  addEmployee(jsonData);
});
