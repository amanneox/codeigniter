jQuery(document).ready(function($){

  $('#date').change(function() {
$('#daterange').hide();
    if ($(this).val().toUpperCase()=="DATE RANGE") {

      $('#daterange').show();
    }

});
  //open/close lateral filter
  $('#myInput').keypress(function(e){
    if ( e.which == 13 ) return false;
    //or...
    if ( e.which == 13 ) e.preventDefault();
});

$('.phone-log').click(function() {
  $('.touch-phone').show();
  $('.touch-email').hide();
});
$('.email-log').click(function() {
  $('.touch-email').show();
  $('.touch-phone').hide();
});
});

function reset_filter() {
  $('form').on('submit',function(e){
    e.preventDefault();
  });
  $('.list').show();
}
function filter_date() {
  $('form').on('submit',function(e){
    e.preventDefault();
  });
  input=$('#date').val().toUpperCase();
  if (input=="ANYTIME") {
    $('.list').show();
  }
  else {
    $(".list").each(function(){

        date= $(this).find('.app-date').text().toUpperCase();

        if (input=="TODAY") {
          var d = new Date();

          if (d.getDate()!=date[8]+date[9]) {

            $(this).hide();
          }
        }
        else if (input=="YESTERDAY") {
          var d = new Date();

          if (d.getDate()-1!=date[8]+date[9]) {
              $(this).hide();
          }
        }

        else if (input=="THIS WEEK") {
          var d = new Date();
          w=d.getDay();
          if (d.getDate()-w>=date[8]+date[9]) {
              $(this).hide();
          }
        }

        else if (input=="LAST WEEK") {
            var d = new Date();
            w=d.getDay();
            if (d.getDate()+w<=date[8]+date[9]) {
            $(this).hide();
          }
      }

        else if (input=="THIS MONTH") {
          var d = new Date();
          if (d.getMonth()+1!=(date[6])) {
              $(this).hide();
          }
        }
        else if (input=="LAST MONTH") {
          var d = new Date();
          if (d.getMonth()!=(date[6])) {
              $(this).hide();
          }
        }
        else if (input=="THIS YEAR") {
          var d = new Date();

          if (d.getFullYear()!=(date[0]+date[1]+date[2]+date[3])) {

             $(this).hide();
          }
        }
        else if (input=="LAST YEAR") {
          var d = new Date();

          if (d.getFullYear()-1!=(date[0]+date[1]+date[2]+date[3])) {

             $(this).hide();
          }
        }
        else if (input=="DATE RANGE") {

            var d = new Date();
            start=$('#start').val();
            end=$('#end').val();
            from=start[8]+start[9];
            to=end[8]+end[9];
            day=date[8]+date[9];
            console.log(day);

            if (day<from || day>to) {
               $(this).hide();
            }
        }

      });
  }
}
function filter_status() {
  $('form').on('submit',function(e){
    e.preventDefault();
  });
  input=$('#status').val().toUpperCase();

  if (input=="ALL") {
    $('.list').show();
  }
else {
  $(".list").each(function(){

      status= $(this).find('.leadstatus').text().toUpperCase();

    if (status!=input) {
      $(this).hide();
    }
    });
}

}

var base_url='http://localhost/pipe/';
/*
$(document).ready(function () {
  $('form').on('submit',function(e){
    e.preventDefault();
    var hiddenVal = $(this).find('input[type="hidden"]').val();
    delete_appointment(hiddenVal);
  });


  $(".message").removeClass("alert alert-success");
  $(document).ajaxStart(function () {
      $("#loading").show();
  }).ajaxStop(function () {
      $("#loading").hide();
  });
});



function delete_appointment(id) {
 $.ajax({
  type: "post",
  url: base_url+"Home/delete_appointment",
  cache: false,
  headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
  data: {
    appid:id
  },
  success: function(res){

     $(".message").addClass("alert alert-success");
     $(".message").append(res);

  },
  error: function(err){
   console.log('Error while request..');
  }
 });
};
$(document).ready(function(){

});
*/
