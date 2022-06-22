import { refreshTable } from "./index.js";
const displayForm = document.getElementById("displayForm");
const addBtn = document.getElementById('addBtn');
const newEmployeeMessage = document.getElementById('newEmployeeMessage');

// Add Employee form listener
displayForm.addEventListener("click", () =>{
    const rowInput = document.getElementById("rowInput");
    rowInput.classList.toggle("hide");
});


//Create a listener in addBtn that will send the data to the server and refresh the table with a fetch
addBtn.addEventListener("click", async (event) => {
    event.preventDefault();
    const addEmployeeForm = document.getElementById("addEmployeeForm");
    const formData = new FormData(addEmployeeForm);
    let data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    }
    );
    const req = await fetch("../src/library/employeeController.php", {
        method: "POST",
        header : {
            "Content-Type" : "application/json"
        },
        body: JSON.stringify(data)
    })
    const response = await req.text();
    console.log(response);
    // Clear the form after submit
    addEmployeeForm.reset();
    const rowInput = document.getElementById("rowInput");
    rowInput.classList.toggle("hide");
    refreshTable(0);
    newEmployeeMessage.textContent = "Employee added successfully";
    newEmployeeMessage.classList.toggle("hide");
    setTimeout(function(){
    newEmployeeMessage.classList.toggle("hide");
    }, 3000);
}
);








