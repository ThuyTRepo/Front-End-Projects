function checkvalidateFormContent() {

    var _title = document.getElementById('title').value, //lấy ra giá trị của field title  
        _brief = document.getElementById('brief').value,//lấy ra giá trị của field brief
        _content = document.getElementById('content').value;//lấy ra giá trị của field password

    //nếu có nhập giá trị title
    if (_title) {

        //kiếm tra độ dài của title nhập vào có < 5 ký tự không
        if (_title.length < 10) {
            alert("Title must be longer than 10 characters");
            return;
        }
        else {

            //kiểm tra độ dài của title có lớn hơn 50 ký tự không
            if (_title.length > 200) {
                alert("Title must be shorter than 200 characters");
                return;
            }
        }
    }
    else {
        //không nhập title , báo alert
        alert("Please enter title"); return;
    }

    if (_brief) {
        if (_brief.length < 30) { alert("Brief length must not shorter than 30 characters"); return; }
        else {
            if (_brief.length > 150) { alert("Brief length must not longer than 150 characters"); return; }
        }
    }
    else {
        //không nhập brief , báo alert
        alert("Please enter brief");
        return;
    }


    if (_content) {
        if (_content.length < 50) { alert("Content length must not shorter than 50 characters"); return; }
        else {
            if (_content.length > 1000) { alert("Content length must not longer than 1000 characters"); return; }
        }
    }
    else {
        //không nhập pass , báo alert
        alert("Please enter content");
        return;
    }

    document.getElementsByTagName("form")[0].reset()

}