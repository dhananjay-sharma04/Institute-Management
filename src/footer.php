<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
<script>
    const rmCheck = document.getElementById("rememberMe"),
        emailInput = document.getElementById("email");
        passInput = document.getElementById("password");
    var selectUser = document.getElementById("user_type").value;

    if (localStorage.checkbox && localStorage.checkbox !== "") {
        rmCheck.setAttribute("checked", "checked");
        emailInput.value = localStorage.username;
        passInput.value = localStorage.pass;
        localStorage.setItem("ddvalue", selectUser) = selectUser.value;
    } else {
        rmCheck.removeAttribute("checked");
        emailInput.value = "";
        passInput.value = "";
        selectUser.value = "";
    }
    
    function lsRememberMe() {
        if (rmCheck.checked && emailInput.value !== "" && passInput.value !== "") {
            localStorage.username = emailInput.value;
            localStorage.pass = passInput.value;
            localStorage.setItem("ddvalue", selectUser) = selectUser.value;
            return true;
            localStorage.checkbox = rmCheck.value;
        } else {
            localStorage.username = "";
            localStorage.pass = "";
            localStorage.checkbox = "";
        }
    }
</script>
</body>

</html>