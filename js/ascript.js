function signUp() {
    var username_el = document.getElementById("username");
    var mobile_el = document.getElementById("mobile");
    var password_el = document.getElementById("password");
    var city_el = document.getElementById("city");
    var email_el = document.getElementById("email");
    var username_el_err = document.getElementById("username_err");
    var mobile_el_err = document.getElementById("mobile_err");
    var password_el_err = document.getElementById("password_err");
    var email_el_err = document.getElementById("email_err");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = () => {

        if (xmlhttp.readyState == 4) {

            var arr = JSON.parse(xmlhttp.responseText);

            if (arr["username"] == "ok") {
                username_el.className = "form-control is-valid"
            } else {
                username_el_err.innerHTML = arr["username"];
                username_el.className = "form-control is-invalid"
            }

            if (arr["mobile"] == "ok") {
                mobile_el.className = "form-control is-valid"
            } else {
                mobile_el_err.innerHTML = arr["mobile"];
                mobile_el.className = "form-control is-invalid"
            }

            if (arr["email"] == "ok") {

                email_el.className = "form-control is-valid"
            } else {
                email_el_err.innerHTML = arr["email"];
                email_el.className = "form-control is-invalid"
            }

            if (arr["password"] == "ok") {
                password_el.className = "form-control is-valid"
            } else {
                password_el_err.innerHTML = arr["password"];
                password_el.className = "form-control is-invalid"
            }

            if (arr["city"] == "ok") {
                city_el.className = "form-control is-valid"
            } else {
                city_el.className = "form-control is-invalid"
            }
            if (arr["username"] == "ok" && arr["mobile"] == "ok" && arr["password"] == "ok" && arr["email"] == "ok" && arr["city"] == "ok") {
                location.href = "index.php";
            }
        }

    }
    var username = username_el.value;
    var mobile = mobile_el.value;
    var password = password_el.value;
    var city = city_el.value;
    var email = email_el.value;

    xmlhttp.open("POST", `php/signup_fun.php`, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(`username=${username}&mobile=${mobile}&email=${email}&password=${password}&city=${city}`);

}

function signIn() {
    var username_el = document.getElementById("username");
    var password_el = document.getElementById("password");

    var username = username_el.value;
    var password = password_el.value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == 4) {
            var err_el = document.getElementById("err");

            var arr = JSON.parse(xmlhttp.responseText);

            if (arr["login"] == "ok") {
                location.href = "index.php";
            } else {
                err_el.innerHTML = "Incorrect username or password";
            }
            if (arr["username"] == "ok") {
                username_el.className = "form-control is-valid";
            } else {
                username_el.className = "form-control is-invalid";
                err_el.innerHTML = "";
            }

            if (arr["password"] == "ok") {
                password_el.className = "form-control is-valid";
            } else {
                err_el.innerHTML = "";
                password_el.className = "form-control is-invalid";
            }
            
        }

    }
    xmlhttp.open("POST", "php/signin_fun.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(`username=${username}&password=${password}`);

}