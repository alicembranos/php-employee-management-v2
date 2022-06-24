import { refreshTable, BASEURL } from "./index.js";

//Create listener for each row to show the employee info
export function createListeners() {
  const tr = document.getElementsByClassName("tbody__emplpoyees--tr");
  Array.from(tr).map((row) => {
    Array.from(row.children).map((cell) => {
      if (!cell.classList.contains("tbody__employee--icon")) {
        cell.addEventListener("click", (event) => {
          let employeeId = event.target.parentElement.id;
          let form = document.getElementById("employeeForm-" + employeeId);
          form.submit();
        });
      }
    });
  });
}

//confirmation and delete listeners to delete buttons
export function confirmDelete() {
  const btnDel = document.querySelectorAll('[name="delete"]');
  Array.from(btnDel).map((btn) => {
    btn.addEventListener("click", async (e) => {
      e.preventDefault();
      if (confirm("Are you sure you want to delete this employee?")) {
        try {
          const employeeId = btn.value;
          const response = await fetch(
            BASEURL + "employees/deleteEmployee/" + String(employeeId)
          );
          const data = await response.text();
          console.log(data);
          if (response.ok) {
            refreshTable(0);
            newEmployeeMessage.textContent = "Employee deleted successfully";
            newEmployeeMessage.classList.toggle("hide");
            setTimeout(function () {
              newEmployeeMessage.classList.toggle("hide");
            }, 3000);
          }
        } catch (error) {
          console.log(error);
        }
      }
    });
  });
}
