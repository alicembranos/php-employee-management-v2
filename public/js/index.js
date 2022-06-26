import { createRow } from "./createRow.js";
import { createListeners, confirmDelete } from "./createListeners.js";

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
    const tableBody = document.getElementById("tableBody");
    if (tableBody.children.length > 0) {
      Array.from(tableBody.children).map((tr) => {
        tableBody.removeChild(tr);
      });
    }
    //create employee row
    data.forEach((element, i) => {
      let row = createRow(element, element.employee_id, i);
      tableBody.appendChild(row);
    });
    createListeners(); //listener to show employee info
    setNextPage(); //set next navigation page
    confirmDelete(); //listener to delete employee
  } catch (error) {
    // console.log(error);
  }
}

//set pagination navigation
function setNextPage() {
  let inputNext = document.getElementById("nextPage");
  let inputBack = document.getElementById("backPage");

  let employeesShown = document.querySelectorAll(".tbody__emplpoyees--tr");
  let lastEmployee =
    employeesShown[employeesShown.length-1].getAttribute("index");
  let firstEmployee = employeesShown[0].getAttribute("index");

  inputNext.setAttribute("value", lastEmployee);
  inputBack.setAttribute("value", firstEmployee);
}

export { refreshTable, BASEURL };
