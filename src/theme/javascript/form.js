const myform = document.getElementById('myform');
const name = document.getElementById('name');
const phone = document.getElementById('phone');
const password = document.getElementById('password');
const email = document.getElementById('email');

// Add Event
myform.addEventListener('submit', (event) => {
    event.preventDefault();
    validate();
})

const sendData = (sRate, count) =>{
    if(sRate === count){
        document.getElementById('myform').submit();
    }
}
// for final submission of form
const successMsg = () =>{
    let formCon = document.getElementsByClassName('field');
    var count = formCon.length - 1;
    for(var i = 0; i < formCon.length; i++){
        if(formCon[i].className === "field success"){
            var sRate = 0 + i;
            console.log(sRate);
            sendData(sRate, count);
        }
        else{
            return false;
        }
    }
}
// more Email validate
const isEmail = (emailVal) => {
    var atSymbol = emailVal.indexOf("@");
    if(atSymbol < 1) return false;
    var dot = emailVal.lastIndexOf('.');
    if(dot <= atSymbol + 3) return false;
    if(dot === emailVal.length - 1) return false;
    return true;
}

// Define validate function
const validate = () => {
    const nameVal = name.value.trim();
    const phoneVal = phone.value.trim();
    const passwordVal = password.value.trim();
    const emailVal = email.value.trim();

    // validate Name
    if(nameVal === ""){
        setErrorMsg(name, 'Name cannot be blank');
    }
    else if(nameVal.length <= 5){
        setErrorMsg(name, 'Name should be 5 letter');
    }else if(/[^a-zA-Z0-9\-\/]/.test(nameVal)){
        setErrorMsg(name, 'Name letter');
    }
    else{
        setSuccessMsg(name);
    }

    // validate phone number
    if(phoneVal ===""){
        setErrorMsg(phone, 'Phone Number cannot be blank');
    }
    else if(phoneVal.length != 10){
        setErrorMsg(phone, 'Phone Number Should be 10 digit');
    }
    else{
        setSuccessMsg(phone);
    }
    // validate Password
    if(passwordVal ===""){
        setErrorMsg(password, 'Phone Number cannot be blank');
    }
    else if(passwordVal.length <= 5){
        setErrorMsg(password, 'Password Should not be less than 5 character');
    }
    else{
        setSuccessMsg(password);
    }
    // Validate Email
    if(emailVal === ""){
        setErrorMsg(email, 'Email cannot be blank');
    }
    else if(!isEmail(emailVal)){
        setErrorMsg(email, 'Not a valid email');
    }
    else{
        setSuccessMsg(email);
    }
    successMsg();

    // Error Message
    function setErrorMsg(input, errormsgs){
        const field = input.parentElement;
        const small = field.querySelector('small');
        field.className = "field error";
        small.innerText = errormsgs;
    }
    // Success Meassage
    function setSuccessMsg(input){
        const field = input.parentElement;
        field.className = "field success";
    }
}