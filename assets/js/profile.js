var base_url='http://localhost/pipe/';
$(document).ready(function () {
  $(document).ajaxStart(function () {
      $("#loading").show();
  }).ajaxStop(function () {
      $("#loading").hide();
  });
});

function update() {
  var user_name=$('#user_name').val();
  var user_password=$('#user.password').val();
  var user_email=$('#user_email').val();
  var firstname=$('#firstname').val();
  var lastname=$('#lastname').val();
 $.ajax({
  type: "post",
  url: base_url+"User_auth/update",
  headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
  cache: false,
  data: $('#profileform').serialize(),
  success: function(res){

     $(".message").append(res);
  },
  error: function(){

   console.log('Error while request..');
  }
 });
};
