var base_url='http://localhost/pipe/';
$(document).ready(function () {
  $(document).ajaxStart(function () {
      $("#loading").show();
  }).ajaxStop(function () {
      $("#loading").hide();
  });
});
function submitmail() {

 $.ajax({
  type: "post",
  url: base_url+"Mail/Send_Mail",
  headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
  cache: false,
  data: $('#mailform').serialize(),
  success: function(json){

     $(".message").append('<span class="message help-block error text-danger">Your Mail has been successfuly send</span>');
  },
  error: function(){

   console.log('Error while request..');
  }
 });
};

function remindcall() {
 $.ajax({
  type: "post",
  url: base_url+"Mail/Send_Mail",
  cache: false,
  data: $('#remindcallform').serialize(),
  success: function(json){
    $(".message").append('<span class="message help-block error text-danger">Your Mail has been successfuly send</span>');
  },
  error: function(){
   console.log('Error while request..');
  }
 });
};
