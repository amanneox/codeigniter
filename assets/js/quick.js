var base_url='http://localhost/pipe/';
$(document).ready(function () {
  $(document).ajaxStart(function () {
      $("#loading").show();
  }).ajaxStop(function () {
      $("#loading").hide();
  });
});
function email() {
var name=$('#name').val();
var scrm_id=$('#scrm_id').val();
var email= $('#emailmsg').val();
var message= $('#emailtext').val();
  $.ajax({
   type: "post",
   url: base_url+"Mail/Send_Mail",
   cache: false,
   headers: {
         'Content-Type': 'application/x-www-form-urlencoded'
       },
   data:{
     scrm_id:scrm_id,
     email:email,
     message:message,
     name:name,
   },
   success: function(json){

  $(".message").append(json);

   },
   error: function(){
    console.log('Error while request..');
   }
  });
};


function sms() {
 $.ajax({
  type: "post",
  url: base_url+"Sms/Send_sms",
  cache: false,
  data: $('#messageform').serialize(),
  success: function(json){
 $(".message").append(json);
  },
  error: function(){
   console.log('Error while request..');
  }
 });
};
function appointment() {
 $.ajax({
  type: "post",
  url: base_url+"Edit/new_lead",
  cache: false,
  data: $('#myform').serialize(),
  success: function(json){
     $(".message").append('<span class="message help-block error text-danger">Lead has been successfuly Created</span>');
  },
  error: function(){
   console.log('Error while request..');
  }
 });
};
