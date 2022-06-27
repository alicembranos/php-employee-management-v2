import { BASEURL } from "./index.js";
const goalForm = document.getElementById("goalForm");

const getSession = async () => {
  const sessionContent = document.getElementById("sessionContent");
  try {
    const response = await fetch(BASEURL + "sport/getActiveSession");
    console.log(response);
    const data = await response.json();
    console.log(data);
    if (data !== false) {
      updateSessionNumber(data.session_id);
      setGoal(data.goal);
      daysRemaining(data.date_to);
      updateEndDateGoal(data.date_to);
      await summary("steps", data.session_id);
      await summary("calories", data.session_id);
      await summary("weight", data.session_id);
      await summary("distance", data.session_id);
      await ranking("steps", data.session_id);
      await ranking("calories", data.session_id);
      await ranking("weight", data.session_id);
      kmLeft();
      sessionContent.classList.contains("hide")
        ? toogleDisplay(sessionContent)
        : "";
    } else {
      //hide dashboard panel
      !sessionContent.classList.contains("hide")
        ? toogleDisplay(sessionContent)
        : "";
    }
  } catch (error) {
    // console.log(error);
  }
};

const summary = async (type, idSession) => {
  const info = {
    a: type,
    b: idSession,
  };
  try {
    const response = await fetch(BASEURL + "sport/getCountSummary", {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(info),
    });
    const data = await response.text();
    console.log(data);
    const typeData = document.getElementById(type);
    typeData.textContent = data;
  } catch (error) {
    console.log(error);
  }
};

const ranking = async (type, idSession) => {
  const info = {
    a: type,
    b: idSession,
  };
  try {
    const response = await fetch(BASEURL + "sport/getRanking", {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(info),
    });
    const data = await response.json();
    console.log(data);
    const rankingElement = document.getElementById(type + "Ranking");
    if (rankingElement.children.length > 0) {
      Array.from(rankingElement.children).map((element) => {
        element.remove();
      });
    }
    //create rows
    let rankingContent = "";
    Array.from(data).map((user) => {
      rankingContent +=
        "<li><a href='" +
        BASEURL +
        "employees/getEmployeeInfo/" +
        String(user.employee_id) +
        "'><p>" +
        user.name +
        "<span> " +
        user["1"] +
        " " +
        unit(type) +
        "</span></p></a></li>";
    });
    rankingElement.innerHTML = rankingContent;
  } catch (error) {
    console.log(error);
  }
};

const updateSessionNumber = (sessionId) => {
  const sessionNumber = document.getElementById("session");
  sessionNumber.value = parseInt(sessionId);
};

const updateEndDateGoal = (date) => {
  const endDateGoal = document.getElementById("firstEndDate");
  endDateGoal.value = date;
};

const setGoal = (goal) => {
  const goalText = document.getElementById("kmGoal");
  const kilometers = document.getElementById("kilometers");
  kilometers.value = goal;
  goalText.textContent = goal;
};

const daysRemaining = (finnishDate) => {
  const currentDate = new Date();
  const endDate = new Date(finnishDate);
  const diffTime = Math.abs(endDate - currentDate);
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  const daysRemaining = document.getElementById("daysRemaining");
  const daysToAdd = document.getElementById("days");
  daysToAdd.value = diffDays;
  daysRemaining.textContent = diffDays;
};

const kmLeft = async () => {
  const kmGoal = parseInt(document.getElementById("kmGoal").textContent);
  const distance = parseInt(document.getElementById("distance").textContent);
  const kmRemaining = document.getElementById("kmRemaining");
  kmRemaining.textContent = kmGoal - distance;
};

const unit = (type) => {
  switch (type) {
    case "steps":
      return "steps";
    case "calories":
      return "Kcal";
    case "weight":
      return "Kg";
    default:
      break;
  }
};

const toogleDisplay = (element) => {
  element.classList.toggle("hide");
};

const unitConversion = (unit, number) => {
  const factor = 1.609344;
  switch (unit) {
    case "km":
      const km = Number.parseInt(number) * factor;
      return km.toFixed(2);
    case "mi":
      const mi = Number.parseInt(number) / factor;
      console.log("aqui");
      return mi.toFixed(2);
    default:
      break;
  }
};

const updateGoal = async () => {
    const firstEndDate = document.getElementById("firstEndDate").value;
    const daysToAdd = document.getElementById("days").value;
    const newEndDate = addDays(firstEndDate, daysToAdd);
    const newGoalKm = document.getElementById("kilometers").value;
    const sessionId = document.getElementById('session').value;
    const info = {
        a: newEndDate,
        b: newGoalKm,
        c: sessionId
    };
    try {
        const response = await fetch(BASEURL + "sport/updateGoal", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(info),
        });
        const data = await response.json();
        console.log(data);
      } catch (error) {
        console.log(error);
      }
}

const addDays = (date, days) => {
  let result = new Date(date);
  result.setDate(result.getDate() + days);
  return result;
};

getSession();

goalForm.addEventListener("submit", (e) => {
    e.preventDefault();
    updateGoal();
});
