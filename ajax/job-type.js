$(document).ready(function () {
  let resultList = $("#jobTypeResult");
  // Function to show suggestions
  function showSuggestions(searchField = "") {
    $.ajax({
      url: "queries/job-type.php",
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
            `<li class="list-group-item link-class"><a>${value.job_type}</a></li>`
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

  $("#jobTypeSearch").on("focus", function () {
    showSuggestions();
  });

  $("#jobTypeSearch").on("keyup", function () {
    let searchField = $(this).val().trim();
    showSuggestions(searchField);
  });

  // Hide suggestions when clicking outside
  $(document).on("click", function (event) {
    if (
      !$(event.target).closest("#jobTypeSearch, #jobTypeResult").length
    ) {
      resultList.empty();
    }
  });

  // Click event for selecting a value from the search results
  $("#jobTypeResult").on("click", "li", function () {
    $("#jobTypeSearch").val($(this).text().trim());
    $("#jobTypeResult").empty();
  });

  $("#jobTypeResult").on("click", ".create-new", function () {
    let newValue = $(this).find("strong").text().trim();
    $("#jobTypeSearch").val(newValue);
    $("#jobTypeResult").empty();

    $.ajax({
      type: "POST",
      url: "queries/job-type.php",
      data: {
        flag: "insert",
        value: newValue,
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          toastr.success("Job Type added successfully");
        } else {
          toastr.error(response.message || "Failed to add Job Type", "Error");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
        toastr.error("Something went wrong. Please try again.", "Error");
      },
    });
  });
});
