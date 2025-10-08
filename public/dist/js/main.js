//nav clock
if ($(".nav-clock")[0]) {
  var a = new Date();
  a.setDate(a.getDate());

  // Update seconds every 1000ms (1 second)
  setInterval(function () {
    var a = new Date().getSeconds();
    $(".time-sec").html((a < 10 ? "0" : "") + a);
  }, 1000);

  // Update minutes every 1000ms (1 second)
  setInterval(function () {
    var a = new Date().getMinutes();
    $(".time-min").html((a < 10 ? "0" : "") + a);
  }, 1000);

  // Update hours every 1000ms (1 second)
  setInterval(function () {
    var a = new Date().getHours();
    $(".time-hours").html((a < 10 ? "0" : "") + a);
  }, 1000);
}

const baseUrl = $("#baseURL").val();

function languagesChange(lan) {
  $.ajax({
    type: "POST",
    url: baseUrl + "/dashboard/setlanguage",
    data: { lan: lan },
    success: function (data) {
      location.reload();
    },
  });
}

$(document).on("change", ".file-input-change", function () {
  let prevId = $(this).data("id");
  newPreviewImage(this, prevId);
});

// image preview
function newPreviewImage(input, prevId) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#" + prevId).attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

$(".today, #from_date, #to_date").datepicker({
  dateFormat: "dd-mm-yy",
  changeMonth: true,
  changeYear: true,
  yearRange: "1900:2100",
});

// Set a default date (e.g., today's date)
var today = $.datepicker.formatDate("dd-mm-yy", new Date());
$(".today , #from_date, #to_date").val(today);
