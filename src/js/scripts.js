// Empty JS for your own code to be here

    document.getElementById('total').innerHTML = "24,000";
showTotalPopulation();
showMalePopulation();
showFemalePopulation();
showHealthyPopulation();
showPodCount();
showPolutionLevel();
showPHLevel();
showFishPopulation();

// DB queries
function showTotalPopulation() {
    document.getElementById('total').innerHTML = "23,000";
    var xhttp = new XMLHTTPRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status = 200) {
            document.getElementById('total').innerHTML = this.responseText;
        }
    };
    try {
        xhttp.open("GET", "gethomestats.php?q=frog_count", true)
        xhttp.send();
    } catch(err) {
        document.getElementById('total').innerHTML = "21,000";
    }
        document.getElementById('total').innerHTML = "22,000";
}

function showMalePopulation() {
    var xhttp = new XMLHTTPRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status = 200) {
            document.getElementById('male').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "gethomestats.php?q=male_count", true)
    xhttp.send();
}

function showFemalePopulation() {
    var xhttp = new XMLHTTPRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status = 200) {
            document.getElementById('female').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "gethomestats.php?q=female_count", true)
    xhttp.send();
}

function showHealthyPopulation() {
    var xhttp = new XMLHTTPRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status = 200) {
            document.getElementById('healthy').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "gethomestats.php?q=healthy_count", true)
    xhttp.send();
}

function showPodCount() {
    var pc = 25;
    document.getElementById('pods').innerHTML = pc;
}

function showPolutionLevel() {
    var pc = 2;
    document.getElementById('pollution').innerHTML = pc;
}

function showPHLevel() {
    var pc = 6.6;
    document.getElementById('phLevel').innerHTML = pc;
}

function showFishPopulation() {
    var pc = 40000;
    document.getElementById('fish').innerHTML = pc;
}
