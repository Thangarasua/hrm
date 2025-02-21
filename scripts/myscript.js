
//check only numbers allowed condition
function isNumber(input) {
  var charCode = input.which ? input.which : input.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    toastr["warning"]("Please Enter Number Only!");
    return false;
  }
  return true;
}

//check only name formate allowed condition
function isAlphabets(input) {
  var charCode = input.which || input.keyCode;
  if (
    (charCode >= 65 && charCode <= 90) || // A-Z
    (charCode >= 97 && charCode <= 122) || // a-z
    charCode === 32 || // Space
    charCode === 46 || // Dot
    charCode === 39 // apostrophe
  ) {
    return true;
  } else {
    toastr["warning"]("Please Enter Alphabets Only!");
    return false;
  }
}

function isEmail(input) {
    var email = input.value.trim(); 
    var filter = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!filter.test(email)) {
        toastr["warning"]("Please enter a valid email!");
        input.focus(); 
        return false;
    } 
    return true;
}

