//active side menu
let currentPage = window.location.pathname.split("/").pop();
$("ul li a").each(function () {
  if ($(this).hasClass(currentPage)) {
    $(this).addClass("active");
    $(this).closest(".single-menu").addClass("active");
    $(this)
      .closest("li")
      .closest(".submenu")
      .find(".sub-menu-title")
      .addClass("subdrop");
    $(this).closest("ul").show();
  }
});

//check only numbers allowed condition
function isNumber(input) {
  var charCode = input.which ? input.which : input.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    toastr["warning"]("Please Enter Number Only!");
    return false;
  }
  return true;
}
//check only numbers allowed condition
function phoneNumber(input) {
  var charCode = input.which ? input.which : input.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    toastr["warning"]("Please Enter Number Only!");
    return false;
  }
  // Restrict input to 10 digits
  let currentValue = $(input.target).val();
  if (currentValue.length >= 10) {
    toastr.warning("Only 10 digits are allowed!");
    return false;
  }
  return true;
}

//check only numbers and single Dot(.) allowed condition for salary LPA mention
function isAmount(event) {
  var charCode = event.which ? event.which : event.keyCode;
  var inputValue = event.target.value;

  // Allow numbers (0-9) and only one dot (.)
  if (
    (charCode >= 48 && charCode <= 57) ||
    (charCode === 46 && !inputValue.includes("."))
  ) {
    return true;
  } else {
    toastr.warning("Only numbers and a single dot are allowed!");
    return false;
  }
}

function numberPasteValidate(event, input) {
  event.preventDefault(); // Prevent default paste behavior

  let pastedData = (event.clipboardData || window.clipboardData).getData(
    "text"
  );
  let numbersOnly = pastedData.replace(/\D/g, ""); // Remove non-numeric characters

  if (numbersOnly) {
    input.value = numbersOnly; // Set only numeric values
  } else {
    toastr.warning("Only numbers are allowed!");
  }
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
  if (email.length > 0) {
    if (!filter.test(email)) {
      toastr["warning"]("Please enter a valid email!");
      input.focus();
      return false;
    }
    return true;
  }
}

function capitalizeWords(input) {
  input.value = input.value.replace(/\b\w/g, function (char) {
    return char.toUpperCase();
  });
}

function dataTableDesigns() {
  var lastSegment = $(location).attr("pathname").split("/").pop();

  table = $("#tableRecords").DataTable({
    pageLength: 10,
    lengthChange: false,
    language: {
      search: "",
    },
    lengthChange: false,
    search: false,
    dom:
      "<'row'<'col-md-6'B><'col-md-6 text-end'f>>" +
      "<'row'<'col-12'tr>>" +
      "<'datatable-footer'<i><p>>",

    buttons: [
      {
        extend: "excelHtml5",
        text: "Export to Excel",
        title: lastSegment + " List",
        className: "btn btn-success",
        exportOptions: {
          columns: ":visible",
        },
        className: "d-none",
      },
      {
        extend: "pdf",
        text: "Export to PDF",
        title: lastSegment + " List",
        className: "buttons-pdf",
        exportOptions: {
          columns: ":visible",
        },
        className: "d-none",
      },
      {
        extend: "copy",
        text: "Export to copy",
        title: lastSegment + " List",
        className: "buttons-copy",
        exportOptions: {
          columns: ":visible",
        },
        className: "d-none",
      },
      {
        extend: "csv",
        text: "Export to csv",
        title: lastSegment + " List",
        className: "buttons-csv",
        exportOptions: {
          columns: ":visible",
        },
        className: "d-none",
      },
      {
        extend: "print",
        text: "Export to print",
        title: lastSegment + " List",
        className: "buttons-print",
        exportOptions: {
          columns: ":visible",
        },
        className: "d-none",
      },
    ],
  });
  // When the custom button is clicked, trigger the DataTable's Excel export
  $("#excel_button").on("click", function () {
    table.button(".buttons-excel").trigger();
  });
  $("#pdf_button").on("click", function () {
    table.button(".buttons-pdf").trigger();
  });
  $("#copy_button").on("click", function () {
    table.button(".buttons-copy").trigger();
  });
  $("#csv_button").on("click", function () {
    table.button(".buttons-csv").trigger();
  });
  $("#print_button").on("click", function () {
    table.button(".buttons-print").trigger();
  });

  //customise the dataTable search table column value
  oTable = $("#tableRecords").DataTable();
  $("#myInputTextField").keyup(function () {
    oTable.search($(this).val()).draw();
  });
  //customise the dataTable no of records show
  $("#customLengthMenu").on("change", function () {
    var length = $(this).val();
    table.page.len(length).draw();
  });
}

  /*-----------SESSION AUTO LOGOUT-----------*/
  let logoutTime = 20 * 60 * 1000; // 20 minutes (1,200,000 ms)
  let warningTime = logoutTime - (2 * 60 * 1000); // 18 minutes (120,000 ms before logout)
  let timeout, warningTimeout;

  function resetTimer() {
      clearTimeout(timeout);
      clearTimeout(warningTimeout);

      // Show warning popup 2 minutes before logout
      warningTimeout = setTimeout(function () {
          let timeLeft = 120; // Countdown starts from 120 seconds (2 minutes)

          Swal.fire({
              title: "⚠ Session Expiring Soon!",
              html: `<p>You will be logged out in <b id="countdown">${timeLeft}</b> seconds.</p>
                     <p>Are you still working?</p>`,
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "Yes, I'm Working!",
              cancelButtonText: "No, Logout!",
              reverseButtons: true,
              allowOutsideClick: false,
              allowEscapeKey: false,
              buttonsStyling: false,
              customClass: {
                  confirmButton: "btn btn-success px-4 py-2 mx-2",
                  cancelButton: "btn btn-danger px-4 py-2 mx-2",
                  popup: "bg-light text-dark",
              },
              didOpen: () => {
                  let countdownInterval = setInterval(() => {
                      timeLeft--;
                      document.getElementById("countdown").innerText = timeLeft;

                      if (timeLeft <= 0) {
                          clearInterval(countdownInterval);
                          Swal.close();
                          window.location.href = "queries/logout"; // Auto logout
                      }
                  }, 1000);
              }
          }).then((result) => {
              if (result.isConfirmed) {
                  resetTimer(); // Stay logged in
              } else {
                  window.location.href = "queries/logout"; // Logout immediately
              }
          });
      }, warningTime);

      // Auto logout after 20 minutes
      timeout = setTimeout(function () {
          window.location.href = "queries/logout"; // Redirect to logout
      }, logoutTime);
  }

  // Reset timer on user activity (mouse, keyboard, click)
  $(document).on("mousemove keydown click", resetTimer);

  // Start the timer initially
  resetTimer();
  /*-----------SESSION AUTO LOGOUT-----------*/
 
