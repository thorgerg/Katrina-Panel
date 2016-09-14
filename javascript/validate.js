function check(input) {
    if(input.validity.patternMismatch){
        if(input.type ==  "password"){
            input.setCustomValidity("minimum 5 character, 1 number and 1 letter.");
        }
        if(input.type == "text"){
            input.setCustomValidity("Only alphabetical characters allowed.")
        }
    } else {
        input.setCustomValidity("");
    }
}