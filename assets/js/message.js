var base_url='http://localhost/pipe/';
$('#myform').on('submit',function(e) {
e.preventDefault();
 $.ajax({
  type: "post",
  url: base_url+"Sms/Bulk",
  dataType: 'jsonp',
  cache: false,
  data: $('#myform').serialize(),
  success: function(json){

  $('.message').addClass('alert alert-success').text('Message send successfuly');
  },
  error: function(){
   console.log('Error while request..');
  }
 });
});


$(document).ready(function () {
  $('.message').removeClass("alert alert-success");
  $(document).ajaxStart(function () {
      $("#loading").show();
  }).ajaxStop(function () {
      $("#loading").hide();
  });
});
function SendSms() {
var message=$('#message').val();
var phone=$('#phone').val();
var id=$('#user_id').val();
 $.ajax({
  type: "post",
  url: base_url+"Sms/Send_sms",
  headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
  cache: false,
  data: {
    scrm_id:id,
    message:message,
    phone:phone
  },
  success: function(json){
    console.log(json);
       $(".message").append('<span class="message help-block error text-danger">Your Message has been successfuly send</span>');
  },
  error: function(){
   console.log('Error while request..');
  }
 });
};
