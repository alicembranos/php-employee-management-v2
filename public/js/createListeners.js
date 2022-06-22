import { refreshTable } from "./index.js";

//Create listener for each row to show the employee info
export function createListeners(){
    const tr = (document.getElementsByClassName("tbody__emplpoyees--tr"));
    Array.from(tr).map(row=>{
        Array.from(row.children).map(cell => {
            if(!cell.classList.contains("tbody__employee--icon")){
            cell.addEventListener("click", (event) => {
                let employeeId = event.target.parentElement.id;
                let form = document.getElementById("employeeForm-" + employeeId);
                form.submit();
        });
    }
    })
});
}

//function to confirm delete before deleting the employee with an async call
export function confirmDelete() {
    //Get all the delete buttons
    const btnDel = document.querySelectorAll('[name="delete"]');
    //Add event listener to each button to confirm deletion
    Array.from(btnDel).map(btn => {
        btn.addEventListener("click", async (event) => {
            event.preventDefault();
            if (confirm("Are you sure you want to delete this employee?")) {
                try{
                    let employeeId = btn.value;
                    let data = {
                        id: employeeId
                    };
                    const req = await fetch("../src/library/employeeController.php", {
                        method: "POST",
                        header: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(data)
                    });
                    const response = await req.text();
                    console.log(response);
                    refreshTable(0);
                    newEmployeeMessage.textContent = "Employee deleted successfully";
                    newEmployeeMessage.classList.toggle("hide");
                    setTimeout(function(){
                    newEmployeeMessage.classList.toggle("hide");
                    }, 3000);
                }
                catch(error){
                    console.log(error);
                }
            }
        });
    });
}