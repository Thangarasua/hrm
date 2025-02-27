$(document).ready(function () {
  let resultList = $("#experienceResult");
  // Function to show suggestions
  function showSuggestions(searchField = "") {
    $.ajax({
      url: "queries/experience.php",
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
            `<li class="list-group-item link-class"><a>${value.experience_type}</a></li>`
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

  $("#experienceSearch").on("focus", function () {
    showSuggestions();
  });

  $("#experienceSearch").on("keyup", function () {
    let searchField = $(this).val().trim();
    showSuggestions(searchField);
  });

  // Hide suggestions when clicking outside
  $(document).on("click", function (event) {
    if (
      !$(event.target).closest("#experienceSearch, #experienceResult").length
    ) {
      resultList.empty();
    }
  });

  // Click event for selecting a value from the search results
  $("#experienceResult").on("click", "li", function () {
    $("#experienceSearch").val($(this).text().trim());
    $("#experienceResult").empty();
  });

  $("#experienceResult").on("click", ".create-new", function () {
    let newValue = $(this).find("strong").text().trim();
    $("#experienceSearch").val(newValue);
    $("#experienceResult").empty();

    $.ajax({
      type: "POST",
      url: "queries/experience.php",
      data: {
        flag: "insert",
        value: newValue,
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          toastr.success("Experience added successfully");
        } else {
          toastr.error(response.message || "Failed to add Experience", "Error");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
        toastr.error("Something went wrong. Please try again.", "Error");
      },
    });
  });
});
