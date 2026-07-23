let hourElement = document.querySelector(".hour");
let minuteElement = document.querySelector(".minute");
let secondElement = document.querySelector(".second");
const display = document.querySelector("#display");
const endButton = document.querySelector(".end-work-btn");
let getdisplayelement = document.querySelector("#dayname");
let timer = null;
let starttime = display.dataset.start;
let startTimeInMs = new Date(starttime).getTime();
let elapsedtime = 0;
let isRunning = false;
let currentDate = new Date();

getdisplayelement.textContent = currentDate.toDateString();

function updateClock() {
    const now = new Date();
    const hours = String(now.getHours());
    const minutes = String(now.getMinutes());
    const seconds = String(now.getSeconds());

    hourElement.textContent = hours + ":";
    minuteElement.textContent = minutes + ":";
    secondElement.textContent = seconds;
}
setInterval(updateClock, 1000);

function start() {
    if (isNaN(startTimeInMs)) {
        startTimeInMs = Date.now();
    }

    if (!isRunning) {
        timer = setInterval(function () {
            elapsedtime = Date.now() - startTimeInMs;
            const hours = Math.floor(elapsedtime / (1000 * 60 * 60));
            const minutes = Math.floor(
                (elapsedtime % (1000 * 60 * 60)) / (1000 * 60),
            );
            const seconds = Math.floor((elapsedtime % (1000 * 60)) / 1000);
            display.textContent = `${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
        }, 1000);
        isRunning = true;
    }
}

function end() {
    if (isRunning) {
        clearInterval(timer);
        isRunning = false;
    }
}
window.start = start;
window.end = end;
