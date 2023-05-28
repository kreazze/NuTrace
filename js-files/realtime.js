function refreshTime() {
  const timeDisplay = document.getElementById("datetime");
  const dateOptions = { 
    month: 'long',
    day: 'numeric',
    year: 'numeric',
    weekday: 'long',
    hour: 'numeric',
    minute: 'numeric',
    hour12: true
  };
  const dateString = new Date().toLocaleString('en-US', dateOptions);
  timeDisplay.textContent = dateString;
}

setInterval(refreshTime, 1000);