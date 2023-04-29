function highlightCurrentDay() {
  const today = new Date();
  const currentDayOfWeek = today.getDay();
  const tableRows = document.querySelectorAll(".schedule table tr");

  tableRows.forEach(row => {
    if (row.cells[0].textContent.toLowerCase() === getDayOfWeek(currentDayOfWeek)) {
      row.classList.add("current-day");
    } else {
      row.classList.remove("current-day");
    }
  });
}

function getDayOfWeek(dayIndex) {
  const daysOfWeek = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
  return daysOfWeek[dayIndex];
}  
// window.addEventListener('DOMContentLoaded', event => {
//   const listHoursArray = document.body.querySelectorAll('.schedule table tr');
//   listHoursArray[new Date().getDay()-1].classList.add(('today'));
// })