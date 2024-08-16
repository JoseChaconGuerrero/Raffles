const days = document.getElementById("days");
const hours = document.getElementById("hours");
const mins = document.getElementById("mins");
const seconds = document.getElementById("seconds");
const days2 = document.getElementById("days2");
const hours2 = document.getElementById("hours2");
const mins2 = document.getElementById("mins2");
const seconds2 = document.getElementById("seconds2");


const newYear = '21 Dec 2024';
const newYear2 = '03 Aug 2024';

function countTimer(){
    const newYearDate = new Date(newYear);
    const currentDate = new Date();

    const totalSeconds = (newYearDate - currentDate) / 1000;

    const daysCalc = Math.floor(totalSeconds / 3600 / 24);
    const hoursCalc = Math.floor(totalSeconds / 3600) % 24;
    const minsCalc = Math.floor(totalSeconds / 60) % 60;
    const secondsCalc = Math.floor(totalSeconds % 60);
    
    days.innerHTML = daysCalc;
    hours.innerHTML = hoursCalc;
    mins.innerHTML = minsCalc;
    seconds.innerHTML = secondsCalc;
}
countTimer();

setInterval(countTimer, 1000);

function countTimer2(){
    const newYearDate = new Date(newYear2);
    const currentDate = new Date();

    const totalSeconds = (newYearDate - currentDate) / 1000;

    const daysCalc = Math.floor(totalSeconds / 3600 / 24);
    const hoursCalc = Math.floor(totalSeconds / 3600) % 24;
    const minsCalc = Math.floor(totalSeconds / 60) % 60;
    const secondsCalc = Math.floor(totalSeconds % 60);
    
    days2.innerHTML = daysCalc;
    hours2.innerHTML = hoursCalc;
    mins2.innerHTML = minsCalc;
    seconds2.innerHTML = secondsCalc;
}
countTimer2();

setInterval(countTimer2, 1000);