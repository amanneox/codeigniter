var base_url='http://localhost/pipe/';
$(document).ready(function () {
  var radio=$('.radiobox');



  $('input:radio[name="temp"]').change(
      function(){
          if (this.checked) {
            append_temp(this.value);
          }
      });

function append_temp(data) {
  console.log(data);

  CKEDITOR.instances['message'].setData(data);
    CKEDITOR.instances['datasend'].setData(data);
}
  var checkbox = $(".selectbox");

  checkbox.change(function(event) {
      var checkbox = event.target;
      if (checkbox.checked) {
          console.log("check");
      } else {
        console.log("uncheck");
      }
  });

  var allcontrol=$('#allcontrol');
allcontrol.click(function(event) {
      if(this.checked) {
          // Iterate each checkbox
          $(':checkbox').each(function() {
              this.checked = true;
          });
      }
      else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
      }
  });



  $('#filterin').keyup(function (){
   {
    input = $('#filterin').val();
    filter = input.toUpperCase();
    table = $("#my-table");
   tr = $("tr");

   for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
});

});
function sender_email() {
  var message=CKEDITOR.instances.datasend.editable().getText();
  var subject=$('#sub').val();
  var email=$('#sendto').val();
 $.ajax({
  type: "post",
  url: base_url+"Mail/Send_Mail",
  cache: false,
  headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
  data:{
    message:message,
    subject:subject,
    email:email
  },
  success: function(json){
 $(".message").append(json);
  },
  error: function(){
   console.log('Error while request..');
  }
 });
};

function send_bulk() {
try {

  var message=CKEDITOR.instances.datasend.editable().getText();

  var subject=$("#subject");
  if (subject.val()=='') {
    throw 'Please fill the form properly';
  }
  var checkedValues = $('.selectbox:checked').map(function() {
    return this.value;
}).get();
console.log(checkedValues);

var message=CKEDITOR.instances.datasend.editable().getText();
var subject=$('#subject').val();
var jsonString = JSON.stringify(checkedValues);
 $.ajax({
  type: "post",
  url: base_url+"Mail/Bulk_mail",
  cache: false,
  data:{
  msg:message,
  sub:subject,
  emails:jsonString,
},
  success: function(data){
    console.log(data);
     $('.message').empty();
     $(".message").append(data);
  },
  error: function(){
    $('.message').empty();
    $(".message").append('<span class="message help-block error text-danger">Error while request..</span>');
    console.log('Error while request..');
  }
 });
} catch (e) {
alert(e);
}

};

function filter_status() {
  input=$('#status');
  var all="ALL";
  filter=input.val().toUpperCase();
  table = document.getElementById("my-table");
  tr = table.getElementsByTagName("tr");

  if (filter.toUpperCase()==all.toUpperCase()) {
    for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[0];
       if (td) {         {
           tr[i].style.display = "";
          }
        }
      }
    }
  else {
    for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[2];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
  }

}
