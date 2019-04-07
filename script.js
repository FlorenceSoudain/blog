function ajaxRequest()
{
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            document.getElementById('message').innerHTML = this.responseText;
            console.log(this.responseText);
        }

    };

    xhttp.open("GET", "index.php", true);

    xhttp.send();


}

document.getElementById('btn').addEventListener('click', ajaxRequest);