$(document).ready(function () {
  let resultList = $("#locationTypeResult");
  // Function to show suggestions
  function showSuggestions(searchField = "") {
    $.ajax({
      url: "queries/work-location.php",
      type: "GET",
      data: {
        flag: "fetch",
        data: searchField,
      },
      dataType: "json",
      success: function (data) {
        resultList.empty();
        limitedData = data.splice(0, 4);
        $.each(limitedData, function (key, value) {
          resultList.append(
            `<li class="list-group-item link-class"><a>${value.work_location}</a></li>`
          );
        });
        if (searchField.length > 0) {
          resultList.append(
            `<li class="list-group-item text-primary create-new"><a>Create new: <strong>${searchField}</strong></a></li>`
          );
        } else {
          resultList.append(
            `<span class="list-group-item link-class text-info">Enter a new field and click for 'Create'.</span>`
          );
        }
      },
    });
  }

  $("#locationTypeSearch").on("focus", function () {
    showSuggestions();
  });

  $("#locationTypeSearch").on("keyup", function () {
    let searchField = $(this).val().trim();
    showSuggestions(searchField);
  });

  // Hide suggestions when clicking outside
  $(document).on("click", function (event) {
    if (
      !$(event.target).closest("#locationTypeSearch, #locationTypeResult").length
    ) {
      resultList.empty();
    }
  });

  // Click event for selecting a value from the search results
  $("#locationTypeResult").on("click", "li", function () {
    $("#locationTypeSearch").val($(this).text().trim());
    $("#locationTypeResult").empty();
  });

  $("#locationTypeResult").on("click", ".create-new", function () {
    let newValue = $(this).find("strong").text().trim();
    $("#locationTypeSearch").val(newValue);
    $("#locationTypeResult").empty();

    $.ajax({
      type: "POST",
      url: "queries/work-location.php",
      data: {
        flag: "insert",
        value: newValue,
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          toastr.success("Work location added successfully");
        } else {
          toastr.error(response.message || "Failed to add Work location", "Error");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
        toastr.error("Something went wrong. Please try again.", "Error");
      },
    });
  });
});
