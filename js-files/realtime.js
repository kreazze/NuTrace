var datetime = new Date();
console.log(datetime);
document.getElementById("datetime").textContent = datetime;

function refreshTime() {
    const timeDisplay = document.getElementById("datetime");
    const dateString = new Date().toLocaleString();
    const formattedString = dateString.replace(", ", " - ");
    timeDisplay.textContent = formattedString;
}
setInterval(refreshTime, 1000);