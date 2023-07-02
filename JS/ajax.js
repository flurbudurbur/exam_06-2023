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
    var total = parseInt(adults.value) + Math.ceil(parseInt(children.value) / 2);
    if (total == 0) {
        var total = 1;
    }
    console.log("total: " + total + ", tracks: " + Math.ceil(total / 8));
    if (tracks.value < Math.ceil(total / 8)) {
        tracks.value = Math.ceil(total / 8);
    } 
    tracks.setAttribute("min", Math.ceil(total / 8));
}
function ajaxStringify() {
    let adults = document.getElementById("adultInput");
    let children = document.getElementById("childInput");
    let tracks = document.getElementById("trackInput");
    let rails = document.getElementById("railsInput");
    let startDate = document.getElementById("startDateInput");
    let endDate = document.getElementById("endDateInput");
    let data = {
        adults: adults.value,
        children: children.value,
        tracks: tracks.value,
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
    let tracks = document.getElementById("trackInput");
    let rails = document.getElementById("railsInput");
    let startDate = document.getElementById("startDateInput");
    let endDate = document.getElementById("endDateInput");
    let array = [adults, children, tracks, rails, startDate, endDate];
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
            var JSONdata = JSON.parse(xhr.responseText);
            Object.keys(JSONdata).forEach(function (key) {
                if ($("#reserve_" + key).length) {
                    Object.keys(JSONdata[key]).forEach(function (key2) {
                        var timeslot = JSONdata[key][key2];
                        var timeslotRaw = timeslot["timeslot"].replace(":", "");
                        colorButtons(timeslot["notAvailable"], key + "_" + timeslotRaw);
                    });
                } else {
                    // get the date
                    var date = key.split("-");
                    // var date = date[2] + "-" + date[1] + "-" + date[0];
                    var date = new Date(date[0], date[1] - 1, date[2]);
                    var date = date.toLocaleDateString("nl-NL", { weekday: "long", month: "long", day: "numeric" });
                    $("#data").append('<div id="reserve_' + key + '" class="timeslotSelector">');
                    $("#reserve_" + key).prepend("<h2 class='span2'>" + date + "</h2>");
                }
                Object.keys(JSONdata[key]).forEach(function (key2) {
                    var timeslot = JSONdata[key][key2];
                    var timeslotRaw = timeslot["timeslot"].replace(":", "");
                    if ($("#reserve_" + key + "_" + timeslotRaw).length) {
                        return;
                    } else {
                        $("#reserve_" + key).append("<button type='submit' value='" + key + "_" + timeslotRaw + "' id='reserve_" + key + "_" + timeslotRaw + "'>" + timeslot["timeslot"] + "</button>");
                        colorButtons(timeslot["notAvailable"], key + "_" + timeslotRaw);
                    }
                });
            });
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

function colorButtons(trueOrFalse, path) {
    if (trueOrFalse == true) {
        $("#reserve_" + path).attr("disabled", "disabled");
        $("#reserve_" + path).removeClass("available");
        $("#reserve_" + path).addClass("unavailable");
    } else {
        $("#reserve_" + path).removeAttr("disabled");
        $("#reserve_" + path).removeClass("unavailable");
        $("#reserve_" + path).addClass("available");
    }
}