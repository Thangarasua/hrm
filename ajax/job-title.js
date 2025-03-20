$(document).ready(function () {
  let resultList = $("#jobTitleResult");
  // Function to show suggestions
  function showSuggestions(searchField = "") {
    $.ajax({
      url: "queries/job-title.php",
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
            `<li class="list-group-item link-class" data-id="${value.designation_id}"><a>${value.job_title}</a></li>`
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

  $("#jobTitleSearch").on("focus", function () {
    showSuggestions();
  });

  $("#jobTitleSearch").on("keyup", function () {
    let searchField = $(this).val().trim();
    showSuggestions(searchField);
  });

  // Hide suggestions when clicking outside
  $(document).on("click", function (event) {
    if (
      !$(event.target).closest("#jobTitleSearch, #jobTitleResult").length
    ) {
      resultList.empty();
    }
  });

  // Click event for selecting a value from the search results
  $("#jobTitleResult").on("click", "li", function () {
    $("#jobTitleSearch").val($(this).text().trim());
    $("#jobTitleResult").empty();
  });

  $("#jobTitleResult").on("click", ".create-new", function () {
    let newValue = $(this).find("strong").text().trim();
    $("#jobTitleSearch").val(newValue);
    $("#jobTitleResult").empty();

    $.ajax({
      type: "POST",
      url: "queries/job-title.php",
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
