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
      updateFirstDateGoal(data.date_from);
      await summary("steps", data.session_id);
      await summary("calories", data.session_id);
      await summary("weight", data.session_id);
      await summary("distance", data.session_id);
      await ranking("steps", data.session_id);
      await ranking("calories", data.session_id);
      await ranking("weight", data.session_id);
      kmLeft();
      daysUsed();
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
    let index = 1;
    let classSpan="";
    Array.from(data).map((user) => {
      if (index < 4) {
        classSpan = "rankingPosition__green";
      } else {
        classSpan = "rankingPosition__red";
      }
      rankingContent +=
        "<li class='ranking__li'><a href='" +
        BASEURL +
        "employees/getEmployeeInfo/" +
        String(user.employee_id) +
        "' class='employee__link'><span class='" +
        classSpan +
        "'>#" +
        index +
        "</span><p class='rankingName__p'>" +
        user.name +
        "</p><span class='totalQuantity__span'> " +
        user["1"] +
        " " +
        unit(type) +
        "</span></a></li>";
      index++;
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

const updateFirstDateGoal = (date) => {
  const firstDateGoal = document.getElementById("beginDate");
  firstDateGoal.value = date;
};

const setGoal = (goal) => {
  const goalText = document.getElementById("kmGoal");
  const goalText2 = document.getElementById("kmGoal2");
  const kilometers = document.getElementById("kilometers");
  kilometers.value = goal;
  goalText.textContent = goal;
  goalText2.textContent = goal;
};

const daysRemaining = (finnishDate) => {
  const currentDate = new Date();
  const endDate = new Date(finnishDate);
  const diffTime = Math.abs(endDate - currentDate);
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  const daysRemaining1 = document.getElementById("daysRemaining1");
  const daysRemaining2= document.getElementById("daysRemaining2");
  const daysToAdd = document.getElementById("days");
  daysToAdd.value = diffDays;
  daysRemaining1.textContent = diffDays;
  daysRemaining2.textContent = diffDays + ' days';
};

const daysUsed = () => {
  const beginDateStored = document.getElementById("beginDate").value;
  const currentDate = new Date();
  const beginDate = new Date(beginDateStored);
  const diffTime = Math.abs(currentDate - beginDate);
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  const daysCovered = document.getElementById('daysCovered');
  daysCovered.textContent = diffDays + ' days';

};

const kmLeft = async () => {
  const kmGoal = parseInt(document.getElementById("kmGoal").textContent);
  const distance = parseInt(document.getElementById("distance").textContent);
  const kmRemaining = document.getElementById("kmRemaining");
  const distance2 = document.getElementById('distance2');
  distance2.textContent = distance + ' km';
  kmRemaining.textContent = kmGoal - distance + ' KM';
  percentageKm((kmGoal - distance), kmGoal);
};

const percentageKm = (kmCovered, kmGoal) => {
  const percentage = Math.round((kmCovered / kmGoal) * 100);
  const file = document.getElementById('file');
  file.value = percentage;
}

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
  const beginDate = document.getElementById("beginDate").value;
  const daysToAdd = document.getElementById("days").value;
  const newEndDate = addDays(beginDate, daysToAdd);
  console.log(newEndDate);
  const newGoalKm = document.getElementById("kilometers").value;
  const sessionId = document.getElementById("session").value;
  const info = {
    a: newEndDate,
    b: newGoalKm,
    c: sessionId,
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
    setGoal(data.goal);
    daysRemaining(data.date_to);
    kmLeft();
  } catch (error) {
    console.log(error);
  }
};

const addDays = (date, days) => {
  let result = new Date(date);
  result.setDate(result.getDate() + parseInt(days));
  return new Date(result).toISOString().split("T")[0];
};

getSession();

// goalForm.addEventListener("submit", (e) => {
//   e.preventDefault();
//   updateGoal();
// });
