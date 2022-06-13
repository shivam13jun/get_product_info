

// Sending form ajax
$(document).ready(function () {
  $("#contact-form").submit(function (event) {
      $("#save").html(" <b>Please Wait</b>");
    var formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      phone: $("#phone").val(),
      subject: $("#subject").val(),
      message: $("#message").val(),
    };

    $.ajax({
      type: "POST",
      url: "contact-us.php",
      data: formData,
      dataType: "json",
      encode: true,
      success: function(data){
alert(result);

}
    })

    event.preventDefault();
  });
});
// // end Sending form ajax