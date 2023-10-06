function checkvalidateFormEditProfile() {

    var _firstName = document.getElementById('FistName').value, //lấy ra giá trị của field FistName  
        _lastName = document.getElementById('LastName').value,//lấy ra giá trị của field LastName
        _phone = document.getElementById('phone').value,//lấy ra giá trị của field phone
        _description = document.getElementById('description').value;//lấy ra giá trị của field description

    //nếu có nhập giá trị FistName
    if (_firstName) {

        //kiếm tra độ dài của FistName nhập vào có < 3 ký tự không
        if (_firstName.length < 3) {
            alert("FistName must be longer than 3 character");
            return;
        }
        else {

            //kiểm tra độ dài của FistName có lớn hơn 30 ký tự không
            if (_firstName.length > 30) {
                alert("FistName must be shorter than 30 character");
                return;
            }
        }
    }
    else {
        //không nhập FistName , báo alert
        alert("Please enter FistName"); return;
    }

    if (_lastName) {
        if (_lastName.length < 3) { alert("Lastname must be longer than 3 character"); return; }
        else {
            if (_lastName.length > 30) { alert("Lastname must be shorter than 30 character"); return; }
        }
    }
    else {
        //không nhập LastName , báo alert
        alert("Please enter LastName");
        return;
    }


    if (_phone) {
        if (_phone.length < 9) { alert("Phone length must be longer than 9 digits"); return; }
        else {
            if (_phone.length > 13) { alert("Phone length must be shorter than 13 digits"); return; }
        }
    }
    else {
        //không nhập pass , báo alert
        alert("Please enter Phone");
        return;
    }


    if (_description) {
        if (_description.length > 200) { alert("Description must not longer than 200 characters"); return; }
    }

    document.getElementsByTagName("form")[0].reset()

}