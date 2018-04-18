var base_url='http://localhost/pipe/';
$(document).ready(function(){

  $('#record').on('change', function () {
     var selectVal = $("#record option:selected").val();

});

  $('#impform').click(function () {
    $('.cd-stretchy-nav').toggle();
    $('#import').toggle();
  })

     $(function () {

         var $chk = $("input:checkbox");
         var $tbl = $('table');

         $chk.prop('checked', true);

         $chk.click(function () {

             var colToHide = $tbl.find("." + $(this).attr("value"));

             $(colToHide).toggle();
         });
     });

     $('#filter').click(function(){
       $(this).hide();
       $('#sort').show()
       $('#filter2').show();
     });

     $('#filter2').click(function(){
       $(this).hide();
       $('#sort').hide()
       $('#filter').show();
     $('#filterin').val('');
     myfun();

     });
  });

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
       td = tr[i].getElementsByTagName("td")[11];
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



  function myfun () {

    input = document.getElementById("filterin");
    filter = input.value.toUpperCase();
   table = document.getElementById("my-table");
   tr = table.getElementsByTagName("tr");

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



jQuery(document).ready(function($){
  $('.cd-filter-trigger').on('click', function(){
    triggerFilter(true);
  });
  $('.cd-filter .cd-close').on('click', function(){
    triggerFilter(false);
  });

  function triggerFilter($bool) {
    var elementsToTrigger = $([$('.cd-filter-trigger'), $('.cd-filter'), $('.cd-tab-filter'), $('.cd-gallery')]);
    elementsToTrigger.each(function(){
      $(this).toggleClass('filter-is-visible', $bool);
    });
  }
  $('#date').change(function() {
  $('#daterange').hide();
    if ($(this).val().toUpperCase()=="DATE RANGE") {

      $('#daterange').show();
    }

  });


});

function filter_date() {
  $('form').on('submit',function(e){
    e.preventDefault();
  });
  input=$('#date').val().toUpperCase();
  if (input=="ANYTIME") {
      $('#list>tr').each(function(){
    $(this).show();
  });
  }
  else {
    $('#list>tr').each(function(){

        date= $(this).find('.leaddate').text().toUpperCase();
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
            console.log(start);

            if (day<from || day>to) {
               $(this).hide();
            }
        }

      });
  }
}
