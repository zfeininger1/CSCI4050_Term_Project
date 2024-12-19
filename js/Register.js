//alert("fd");
function verifyPassword() {
    //alert("sd");
    let pass1 = document.getElementById('new_password').value;
    //alert("yo");
    let pass2 = document.getElementById('verify_password').value;
    let match = true;
    if (pass1 != pass2) {
      alert("Passwords Do not match");
     window.history.back();
    }

}  
