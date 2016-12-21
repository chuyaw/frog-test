// Empty JS for your own code to be here

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
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        //if (this.readyState == 4 && this.status = 200) {
            document.getElementById('total').innerHTML = this.responseText;
        //}
    };
    xhttp.open("GET", "gethomestats.php?q=frog_count", true);
    xhttp.send();
}

function showMalePopulation() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        //if (this.readyState == 4 && this.status = 200) {
            document.getElementById('male').innerHTML = this.responseText;
        //}
    };
    xhttp.open("GET", "gethomestats.php?q=male_count", true)
    xhttp.send();
}

function showFemalePopulation() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        //if (this.readyState == 4 && this.status = 200) {
            document.getElementById('female').innerHTML = this.responseText;
        //}
    };
    xhttp.open("GET", "gethomestats.php?q=female_count", true)
    xhttp.send();
}

function showHealthyPopulation() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        //if (this.readyState == 4 && this.status = 200) {
            document.getElementById('healthy').innerHTML = this.responseText;
        //}
    };
    xhttp.open("GET", "gethomestats.php?q=healthy_count", true)
    xhttp.send();
}

function showPodCount() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        //if (this.readyState == 4 && this.status = 200) {
            document.getElementById('pods').innerHTML = this.responseText;
        //}
    };
    xhttp.open("GET", "gethomestats.php?q=pod_count", true)
    xhttp.send();
}

function showPolutionLevel() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        //if (this.readyState == 4 && this.status = 200) {
            document.getElementById('pollution').innerHTML = this.responseText;
        //}
    };
    xhttp.open("GET", "gethomestats.php?q=pollution_level", true)
    xhttp.send();
}

function showPHLevel() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        //if (this.readyState == 4 && this.status = 200) {
            document.getElementById('phLevel').innerHTML = this.responseText;
        //}
    };
    xhttp.open("GET", "gethomestats.php?q=pH_level", true)
    xhttp.send();
}

function showFishPopulation() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        //if (this.readyState == 4 && this.status = 200) {
            document.getElementById('fish').innerHTML = this.responseText;
        //}
    };
    xhttp.open("GET", "gethomestats.php?q=fish_population", true)
    xhttp.send();
}
