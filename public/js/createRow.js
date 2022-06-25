import { BASEURL } from "./index.js";

function createRow(element, i) {
  //Create row, add class and id for the future listener
  let tableRow = document.createElement("tr");
  tableRow.classList.add("tbody__emplpoyees--tr");
  tableRow.setAttribute("id", i);
  let employeeForm = document.createElement("form");
  employeeForm.setAttribute("id", "employeeForm-" + i);
  employeeForm.setAttribute(
    "action",
    BASEURL + "employees/getEmployeeInfo/" + String(i)
  );
  employeeForm.setAttribute("method", "post");
  let inputHidden = document.createElement("input");
  inputHidden.setAttribute("type", "hidden");
  inputHidden.setAttribute("name", "info");
  inputHidden.setAttribute("value", i);

  //we create the tablecells
  let tableCellName = document.createElement("td");
  let tableCellEmail = document.createElement("td");
  let tableCellAge = document.createElement("td");
  let tableCellStreet = document.createElement("td");
  let tableCellCity = document.createElement("td");
  let tableCellState = document.createElement("td");
  let tableCellPostal = document.createElement("td");
  let tableCellPhone = document.createElement("td");
  let tableCellIcon = document.createElement("td");
  let formButton = document.createElement("form");
  let btnDel = document.createElement("button");
  let icon = document.createElement("i");

  //Add class to each tableCell
  tableCellName.classList.add("tbody__employee--td");
  tableCellEmail.classList.add("tbody__employee--td");
  tableCellAge.classList.add("tbody__employee--td");
  tableCellStreet.classList.add("tbody__employee--td");
  tableCellCity.classList.add("tbody__employee--td");
  tableCellState.classList.add("tbody__employee--td");
  tableCellPostal.classList.add("tbody__employee--td");
  tableCellPhone.classList.add("tbody__employee--td");
  tableCellIcon.classList.add("tbody__employee--icon");
  icon.classList.add("bx");
  icon.classList.add("bxs-trash");
  btnDel.classList.add("btn__trash--icon");
  formButton.setAttribute("action", "./library/employeeController.php");
  formButton.setAttribute("method", "post");
  btnDel.setAttribute("name", "delete");
  btnDel.setAttribute("value", i);
  btnDel.setAttribute("id", "btnDel-" + i);

  // get the employer name and add to the cell
  tableCellName.append(element.name);
  tableCellEmail.append(element.email);
  tableCellAge.append(element.age);
  tableCellStreet.append(element.streetAddress);
  tableCellCity.append(element.city);
  tableCellState.append(element.state);
  tableCellPostal.append(element.postalCode);
  tableCellPhone.append(element.phoneNumber);
  tableCellIcon.setAttribute("id", "delete-" + i);
  btnDel.append(icon);
  formButton.appendChild(btnDel);
  tableCellIcon.appendChild(formButton);
  employeeForm.append(inputHidden);

  //Add the data of each cell to row
  tableRow.append(
    employeeForm,
    tableCellName,
    tableCellEmail,
    tableCellAge,
    tableCellStreet,
    tableCellCity,
    tableCellState,
    tableCellPostal,
    tableCellPhone,
    tableCellIcon
  );

  //return the row created with data employeer
  return tableRow;
}

export { createRow };
