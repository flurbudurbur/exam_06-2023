function checkChildren() {
    let items = document.querySelectorAll(".hekjes");
    let child = document.getElementById("childInput");
    if (child.value > 0) {
        var display = "block";
    } else {
        var display = "none";
    }
    for (var i = 0; i < items.length; i++) {
        items[i].style.display = display;
    }
}
function countPeople() {
    let tracks = document.getElementById("trackInput");
    let children = document.getElementById("childInput");
    let adults = document.getElementById("adultInput");
    var total =
        parseInt(adults.value) + Math.ceil(parseInt(children.value) / 2);
    if (total == 0) {
        var total = 1;
    }
    console.log("total: " + total);
    console.log("tracks: " + Math.ceil(total / 8));
    tracks.value = Math.ceil(total / 8);
}
function ajaxStringify() {
    let adults = document.getElementById("adultInput");
    let children = document.getElementById("childInput");
    let rails = document.getElementById("railsInput");
    let startDate = document.getElementById("startDateInput");
    let endDate = document.getElementById("endDateInput");
    let data = {
        adults: adults.value,
        children: children.value,
        rails: rails.value,
        startDate: startDate.value,
        endDate: endDate.value,
    };
    data = JSON.stringify(data);
    console.log(data); //debug
    dataPusher(data, "reservation_check.php");
}
// java event listener for change on input fields
function addAllEventListeners() {
    let adults = document.getElementById("adultInput");
    let children = document.getElementById("childInput");
    let rails = document.getElementById("railsInput");
    let startDate = document.getElementById("startDateInput");
    let endDate = document.getElementById("endDateInput");
    let array = [adults, children, rails, startDate, endDate];
    for (let i = 0; i < array.length; i++) {
        array[i].addEventListener("change", ajaxStringify);
        if (array[i] === children) {
            array[i].addEventListener("change", checkChildren);
            array[i].addEventListener("change", countPeople);
        }
        if (array[i] === adults) {
            array[i].addEventListener("change", countPeople);
        }
    }
}
function dataPusher(data, path) {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            $("#data").html(xhr.responseText);
            
        }
    };
    xhr.open("POST", "php/inc/" + path);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(data);
}
// checks if the rail checkbox is checked or not
function checkRail() {
    let rails = document.getElementById("railsInput");
    if (rails.checked) {
        rails.setAttribute("value", "true");
    } else {
        rails.setAttribute("value", "false");
    }
}
