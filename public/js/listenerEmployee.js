import { addEmployee, updateEmployee } from "./functions.js";
//Create listener in employee view for update and create
const employeeSubmit = document.getElementById("employeeForm");
employeeSubmit.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  let jsonData = Object.fromEntries(formData.entries());
  console.log(jsonData);
  if (jsonData.employeeId !== "0") {
    console.log('go to update employee');
    updateEmployee(jsonData);
  } else {
    addEmployee(jsonData);
  }
});
