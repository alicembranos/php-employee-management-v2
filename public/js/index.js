import { createRow } from "./createRow.js";
import { createListeners, confirmDelete } from "./createListeners.js";
const tableBody = document.getElementById("tableBody");
const BASEURL = document.getElementById("header").dataset["base_url"];

//display table
await refreshTable(0);

async function refreshTable(empl) {
  try {
    const response = await fetch(
      BASEURL + "employees/paginationEmployees/" + String(empl)
    );
    const data = await response.json();
    console.log(data);
    if (tableBody.children.length > 0) {
      Array.from(tableBody.children).map((tr) => {
        tableBody.removeChild(tr);
      });
    }
    data.forEach((element) => {
      //create employee row
      let row = createRow(element, element.employee_id);
      tableBody.appendChild(row);
    });
    createListeners(); //create listeners for each row
    setNextPage(); //set next navigation page
    confirmDelete(); //add the listener for deleting the employee
  } catch (error) {
    console.log(error);
  }
}
//setNextPage to stablish the next page to navigate
function setNextPage() {
  let inputNext = document.getElementById("nextPage");
  let inputBack = document.getElementById("backPage");

  let employeesShown = document.querySelectorAll(".tbody__emplpoyees--tr");
  let lastEmployee =
    employeesShown[employeesShown.length - 1].getAttribute("id");
  let firstEmployee = employeesShown[0].getAttribute("id");

  inputNext.setAttribute("value", lastEmployee);
  inputBack.setAttribute("value", firstEmployee);
}

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

export { refreshTable, BASEURL };
