

function checkAgeRange(dobInput) {
    let arr = dobInput.split('/');
    let totalYear = calcTotalYear(arr[1], arr[0], arr[2]);
    if (totalYear >= 15 && totalYear <= 80) {
        return true;
    } else {
        return false;
    }
}

function checkDobFormat(dobInput) {
    let reg = /^((\d{2})(\/)(\d{2})(\/)(\d{4}))$/;
    return reg.test(dobInput);

}

function validateDobField(dobInput) {
    if (checkDobFormat(dobInput)) {
        let correctAgeRange = checkAgeRange(dobInput);
        return correctAgeRange;
    } else {
        return false;
    }

}

function calcTotalYear(inpMonth, inpDay, inpYear) {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth();
    var currentDay = currentDate.getDate();
    var calculatedAge = currentYear - inpYear;

    if (currentMonth < inpMonth - 1) {
        calculatedAge--;
    }
    if (inpMonth - 1 == currentMonth && currentDay < inpDay) {
        calculatedAge--;
    }
    return calculatedAge;
}

function getDobFieldErrorMessage(dob) {
    if (!checkAgeRange(dob)) {
        return "Applicants must be between 15 and 80 years old";
    } else if (!checkDobFormat(dob)) {
        return "Please input Date of Birth in dd/MM/yyyy format";
    }
    return "";
}

function dobFieldValidation() {
    var dob = document.getElementById("dob").value;
    var elemAlert = document.getElementById("error-msg");
    if (!validateDobField(dob)) {
        var errorMsg = getDobFieldErrorMessage(dob);
        elemAlert.innerHTML = errorMsg;
        return false;
    } else {
        elemAlert.innerHTML = "";
    }
    return true;
}



function validStateField() {
    var stateVal = document.getElementById("state").value;
    var postCodeVal = document.getElementById("postcode").value;
    var elemAlert = document.getElementById("error-msg");
    if (postCodeVal) {
        let firstDigit = postCodeVal[0];
        let arrMatchNbr = [];
        switch (stateVal) {
            case "VIC": arrMatchNbr = [3, 8]; break;
            case "NSW": arrMatchNbr = [1, 2]; break;
            case "QLD": arrMatchNbr = [4, 9]; break;
            case "NT": arrMatchNbr = [0]; break;
            case "WA": arrMatchNbr = [6]; break;
            case "SA": arrMatchNbr = [5]; break;
            case "TAS": arrMatchNbr = [7]; break;
            case "ACT": arrMatchNbr = [0]; break;
            default: break;
        }
        if (arrMatchNbr.length > 0) {
            let matching = arrMatchNbr.filter((_val, _ind) => { return _val == firstDigit; });
            if (matching.length == 0) {
                var errorMsg = "With state " + stateVal + ", postcode must start with " + arrMatchNbr.join(' OR ');
                elemAlert.innerHTML = errorMsg;
                return false;
            }
        }
    }
    return true;

}

function checkOtherSkills() {
    var elemAlert = document.getElementById("error-msg");
    var allNodeSkill = document.querySelectorAll("input[name='Skill[]'][id='other-skills']:checked");
    var txtValueOther = document.getElementById("other-skills-input").value;

    if (allNodeSkill && allNodeSkill.length > 0) {
        let selectedVal = allNodeSkill[0].value;
        if (selectedVal == "Otherskills") {
            if (!txtValueOther) {
                var errorMsg = "The Other Skills text area can not be blank";
                elemAlert.innerHTML = errorMsg;
                return false;
            }
        }
    }
    return true;
}

function onApplyFormSubmit(event) {
    if (dobFieldValidation() && validStateField() && checkOtherSkills()) {
        saveSession();
        return true;
    } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        event.preventDefault();
        return false;
    }
}


function saveSession() {
    let allFieldNames = ["first_name", "last_name", "dob", "email", "job_ref", "gender", "phone_number", "address", "surbub", "state", "postcode", "Skill[]", "other-skills-input"];
    let resultObj = {};
    for (let i = 0; i < allFieldNames.length; i++) {
        let keyName = allFieldNames[i];
        let elm = document.getElementsByName(keyName);
        if (elm.length > 0) {
            if (elm.length == 1) {
                resultObj[keyName] = elm[0].value;
            }
            else {
                resultObj[keyName] = [];
                for (let i = 0; i < elm.length; i++) {
                    if (elm[i].checked) {
                        resultObj[keyName].push(elm[i].value);
                    }
                }
            }
        }
    }
    sessionStorage.setItem("beforeAppliedInfor", JSON.stringify(resultObj));
    let elemForm = document.getElementById("form-apply");
    elemForm.submit();
    resetMinuteAndSecond();
}

function getSession() {

    let beforeState = sessionStorage.getItem("beforeAppliedInfor");
    if (beforeState) {
        let objState = JSON.parse(beforeState);
        for (const [keyObj, valueObj] of Object.entries(objState)) {
            if (valueObj) {
                let elem = document.getElementsByName(keyObj);
                if (elem.length > 0) {
                    if (elem.length == 1) {
                        elem[0].value = valueObj;
                    }
                    else {

                        if (Array.isArray(valueObj)) {
                            for (let i = 0; i < elem.length; i++) {
                                let filtered = valueObj.filter((_val, _indx) => { return _val == elem[i].value; });
                                if (filtered.length > 0) {
                                    elem[i].checked = true;
                                }
                            }
                        }


                    }
                }
            }
        }
    }

}

function loadSession() {
    getSession();
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const jobId = urlParams.get('jobId');
    let elem = document.getElementById("job_ref");
    if (jobId && elem) {
        elem.value = jobId;
        elem.readOnly = true;
    }
    else {
        elem.readOnly = false;
    }
}



function onLoadDocumentApplyPage() {
    let elem = document.getElementById("form-apply");
    elem.addEventListener('submit', onApplyFormSubmit);
    loadSession();
}