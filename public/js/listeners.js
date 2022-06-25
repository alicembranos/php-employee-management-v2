import { addEmployeeRow, hideErrorMessages } from "./functions.js";
import { refreshTable } from "./index.js";
const displayForm = document.getElementById("displayForm");

// toggle row to add new employee
displayForm.addEventListener("click", () => {
  const rowInput = document.getElementById("rowInput");
  rowInput.classList.toggle("hide");
  //delete error messages
  const errorMessages = document.querySelectorAll(".error__validation");
  hideErrorMessages(errorMessages);
});

//add employee form row
const addEmployeeForm = document.getElementById("addEmployeeForm");
addEmployeeForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  let jsonData = Object.fromEntries(formData.entries());
  addEmployeeRow(jsonData, addEmployeeForm);
});

//set the listener for nav to the next page
let formNav = document.getElementById("form-navigation");
formNav.addEventListener("click", () => {
  let inputNext = document.getElementById("nextPage");
  console.log(inputNext.getAttribute("value"));
  refreshTable(inputNext.getAttribute("value"));
});

//set the listener for nav to the back page
let formNavBack = document.getElementById("form-navigation-back");
formNavBack.addEventListener("click", () => {
  let inputBack = document.getElementById("backPage");
  if (inputBack.getAttribute("value") !== "1") {
    refreshTable("-" + inputBack.getAttribute("value"));
  }
});
