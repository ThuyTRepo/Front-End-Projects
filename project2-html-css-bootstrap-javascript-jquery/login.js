//validate form using javascript
function validateFormLogin() {
    var user_email = document.getElementById('emailLogin').value, //lấy ra giá trị của field email  
        password = document.getElementById('passLogin').value;//lấy ra giá trị của field password

    //nếu có nhập giá trị email
    if (user_email) {

        //kiếm tra độ dài của email nhập vào có < 5 ký tự không
        if (user_email.length < 5) {
            alert("Email must be longer than 5 chracter");
            return;
        }
        else {
            //kiểm tra độ dài của email có lớn hơn 50 ký tự không
            if (user_email.length > 50) {
                alert("Email length email must longer than 50 characters");
                return;
            }
        }
    }
    else {
        //không nhập email , báo alert
        alert("Please enter email"); 
        return;
    }

    if (password) {
        if (password.length < 8) { alert("Password length must be longer than 8 characters"); return; }
        else {
            if (password.length > 30) { alert("Password length must be shorter than 50 characters"); return; }
        }
    }
    else { 
        //không nhập pass , báo alert
        alert("Please enter password"); 
        return; 
    }

    document.getElementsByTagName("form")[0].reset()
    window.location.href = "cmsPage.html";

}