//validate form using javascript
function validateFormRegister() {
    var _user = document.getElementById('userReg').value, //lấy ra giá trị của field username  
        _email = document.getElementById('emailReg').value,//lấy ra giá trị của field email
        _pass = document.getElementById('passReg').value,//lấy ra giá trị của field pass
        _repass = document.getElementById('reapassReg').value //lấy ra giá trị của field repass
        ;

    //nếu có nhập giá trị username
    if (_user) {

        //kiếm tra độ dài của username nhập vào có < 5 ký tự không
        if (_user.length < 3) {
            alert("Username length must be longer than 3 characters");
            return;
        }
        else {

            //kiểm tra độ dài của username có lớn hơn 30 ký tự không
            if (_user.length > 30) {
                alert("Username length must not be longer than 30 characters");
                return;
            }
        }
    }
    else {
        //không nhập username , báo alert
        alert("Please enter username"); return;
    }

    //nếu có nhập giá trị email
    if (_email) {
        //kiếm tra độ dài của email nhập vào có < 5 ký tự không
        if (_email.length < 5) {
            alert("Email length must not shorter than 5 chracters");
            return;
        }
    }
    else {
        //không nhập email , báo alert
        alert("Please enter email"); return;
    }



    if (_pass) {
        if (_pass.length < 8) { alert("Password length must be longer than 8 characters"); return; }
        else {
            if (_pass.length > 30) { alert("Password must not be longer than 30 characters"); return; }
        }
    }
    else { 
        //không nhập pass , báo alert
        alert("Please enter password"); 
        return; 
    }

    if (_repass) {
        if (_repass.length < 8) { alert("Password length must be longer than 8 characters"); return; }
        else {
            if (_repass.length > 30) { alert("Password must not be longer than 30 characters"); return; }
        }
    }
    else { 
        //không nhập repass , báo alert
        alert("Please enter repassword"); 
        return; 
    }

    document.getElementsByTagName("form")[0].reset()
    window.location.href = "login.html";


}