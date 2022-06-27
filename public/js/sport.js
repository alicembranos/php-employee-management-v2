import { BASEURL } from "./index.js";

// summarySteps();

const getSession = async () => {
  try {
    const response = await fetch(BASEURL + "sport/getActiveSession");
    const data = await response.json();
    console.log(data);
    updateSessionNumber(data.session_id);
    setGoal(data.goal);
    daysRemaining(data.date_to);
    summary("steps", data.session_id);
    summary("calories", data.session_id);
    summary("weight", data.session_id);
  } catch (error) {
    console.log(error);
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

const ranking = (type) => {
    const info = {
        a: type
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
        //create row
        Array.from(data).map((user, index) => {

        })
      } catch (error) {
        console.log(error);
      }
};

const updateSessionNumber = (sessionId) => {
  const sessionNumber = document.getElementById("session");
  sessionNumber.value = parseInt(sessionId);
};

const setGoal = (goal) => {
  const goalText = document.getElementById("kmGoal");
  goalText.textContent = goal;
};

const daysRemaining = (finnishDate) => {
  const currentDate = new Date();
  const endDate = new Date(finnishDate);
  const diffTime = Math.abs(endDate - currentDate);
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  const daysRemaining = document.getElementById("daysRemaining");
  daysRemaining.textContent = diffDays;
};

getSession();
