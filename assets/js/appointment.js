jQuery(document).ready(function($){
	$('input:radio[name="id"]').change(
			function(){
					if (this.checked) {
						$('#user_id').val(this.value);

					}
			});
	$('#collapseExample').collapse('show');



	$('#collapseExample').on('show.bs.collapse', function () {
	  	$('#collapseExample2').collapse('hide');
			$('#collapseExample3').collapse('hide');
			$('#collapseExample4').collapse('hide');
	})

	$('#collapseExample2').on('show.bs.collapse', function () {
	  	$('#collapseExample').collapse('hide');
			$('#collapseExample3').collapse('hide');
			$('#collapseExample4').collapse('hide');
	})

	$('#collapseExample3').on('show.bs.collapse', function () {
	  	$('#collapseExample2').collapse('hide');
			$('#collapseExample').collapse('hide');
			$('#collapseExample4').collapse('hide');
	})

	$('#collapseExample4').on('show.bs.collapse', function () {
	  	$('#collapseExample2').collapse('hide');
			$('#collapseExample3').collapse('hide');
			$('#collapseExample').collapse('hide');

	})

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
});

var base_url='http://localhost/pipe/';
$(document).ready(function () {
  $(document).ajaxStart(function () {
      $("#loading").show();
  }).ajaxStop(function () {
      $("#loading").hide();
  });
});
function update() {
 $.ajax({
  type: "post",
  url: base_url+"Home/changestatus",
  cache: false,
	headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			},
  data: $('#changestatus').serialize(),
  success: function(json){
alert(json);
     $(".message").append('<span class="message help-block error text-danger">Record has been successfuly Updated</span>');
  },
  error: function(){
	alert(json);
   console.log('Error while request..');
  }
 });
};

function update1() {
 $.ajax({
  type: "post",
  url: base_url+"Home/changestatus1",
  cache: false,
	headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			},
  data: $('#changestatus').serialize(),
  success: function(json){
alert(json);
     $(".message").append('<span class="message help-block error text-danger">Record has been successfuly Updated</span>');
  },
  error: function(){
	alert(json);
   console.log('Error while request..');
  }
 });
};

function addnote() {
 $.ajax({
  type: "post",
  url: base_url+"Home/addnote",
  cache: false,
	headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			},
  data: $('#addnote').serialize(),
  success: function(json){
			alert(json);
  },
  error: function(){
		alert(json);
  }
 });
};
function filter_status_app() {
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
       td = tr[i].getElementsByTagName("td")[1];
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


function create_temp() {
$.ajax({
 type: "post",
 url: base_url+"Home/create_appointment",
 cache: false,
 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded'
		 },
 data:$('#app').serialize(),
 success: function(json){
		 $('.message').empty();
		 $('.message').append(json);
		 if (json=="success") {
		 	 send_sech();
		 }

 },
 error: function(err){
	 console.log(err);
 }
});

}



function send_sech() {

	date=$('#date').val();
	id=$('#user_id').val();
	message=$('#desc').val();

$.ajax({
 type: "post",
 url: base_url+"Mail/Send_Sech",
 cache: false,
 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded'
		 },
 data:{
user_id:id,
date:date,
message:message
 },
 success: function(json){
console.log(json);
 },
 error: function(err){
	 console.log(err);
 }
});

}
