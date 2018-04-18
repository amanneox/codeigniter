var base_url='http://localhost/pipe/';
$(document).ready(function () {
  $(document).ajaxStart(function () {
      $("#loading").show();
  }).ajaxStop(function () {
      $("#loading").hide();
  });
});
function createappointment() {

 $.ajax({
  type: "post",
  url: base_url+"Home/create_appointment",
  cache: false,
  headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
  data: $('#appointment').serialize(),
  success: function(res){
     $(".message").append(res);
  },
  error: function(err){

   console.log('Error while request..');
  }
 });
};
