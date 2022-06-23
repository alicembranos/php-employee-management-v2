import { createRow } from "./createRow.js";
import { createListeners, confirmDelete } from "./createListeners.js";
const tableBody = document.getElementById("tableBody");
const BASEURL = document.getElementById("header").dataset["base_url"];

//refresh table with all employees for each page
await refreshTable(0);

export async function refreshTable(empl) {
  //check if table has employees and create the table data
  if (tableBody.children.length !== 0) {
    //charge the employees of data base
    fetch("../src/library/employeeController.php?empl=" + empl).then(
      async (response) => {
        try {
          const data = await response.json();
          if (data.length != 0) {
            Array.from(tableBody.children).forEach((element) => {
              tableBody.removeChild(element);
            });

            let i = 1;
            data.forEach((element) => {
              //Create each row with Data Employeer with variable i for specify the id of each row
              let row = createRow(element, element.id);
              i++;
              //We add the cell to tr and tr to tbody
              tableBody.appendChild(row);
            });
          }
          createListeners(); //create listeners for each row
          setNextPage(); //setNextPage to stablish the next page to navigate
          confirmDelete(); //add the listener for deleting the employee
        } catch (error) {
          console.log(error);
        }
      }
    );
  } else {
    try {
      const response = await fetch(BASEURL + "/employees/showEmployees");
      const data = await response.json();
      let i = 1;
      data.forEach((element) => {
        //row for each employee
        let row = createRow(element, i);
        i++;
        tableBody.appendChild(row);
      });
    } catch (error) {
      console.log(error);
    }
  }
}
//setNextPage to stablish the next page to navigate
function setNextPage() {
  let input = document.getElementById("nextPage");
  let inputBack = document.getElementById("backPage");

  let employeesShown = document.querySelectorAll(".tbody__emplpoyees--tr");
  let lastEmployee =
    employeesShown[employeesShown.length - 1].getAttribute("id");
  let firstEmployee = employeesShown[0].getAttribute("id");

  input.setAttribute("value", lastEmployee);
  inputBack.setAttribute("value", firstEmployee);
}

//set the listener for nav to the next page
let formNav = document.getElementById("form-navigation");
formNav.addEventListener("click", (event) => {
  let input = document.getElementById("nextPage");
  refreshTable(input.getAttribute("value"));
});

//set the listener for nav to the back page
let formNavBack = document.getElementById("form-navigation-back");
formNavBack.addEventListener("click", (event) => {
  let inputBack = document.getElementById("backPage");
  if (inputBack.getAttribute("value") !== "1") {
    refreshTable("-" + inputBack.getAttribute("value"));
  }
});
