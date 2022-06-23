import { refreshTable, BASEURL } from "./index.js";
const displayForm = document.getElementById("displayForm");
const addBtn = document.getElementById("addBtn");
const newEmployeeMessage = document.getElementById("newEmployeeMessage");

// Add Employee form listener
displayForm.addEventListener("click", () => {
  const rowInput = document.getElementById("rowInput");
  rowInput.classList.toggle("hide");
});

//Create a listener in addBtn that will send the data to the server and refresh the table with a fetch
addBtn.addEventListener("click", async (event) => {
  event.preventDefault();
  const addEmployeeForm = document.getElementById("addEmployeeForm");
  const formData = new FormData(addEmployeeForm);
  let formJson = {};
  formData.forEach((value, key) => {
    formJson[key] = value;
  });
  const response = await fetch(BASEURL + "/employees/addEmployee", {
    method: "POST",
    header: {
      "Content-Type": "application/json",
    },
    body: formJson,
  });
  const data = await response.json();
  console.log(data);
  if (data.id) {
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
    //print errors
  }
});
