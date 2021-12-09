$(document).ready(function () {
	timedate();
	$("#err, #info").hide();
	$("#srch").click(function () {
		var id = $("#stdntID").val();
		if (id == "") {
			alert("Student Id is Required.");
			$("#stdntID").focus();
			return false;
		} else if (id == 0) {
			alert("Student Id Cannot be Zero.");
			$("#stdntID").val("");
			$("#stdntID").focus();
			return false;
		} else if (id < 0) {
			alert("Student Id Cannot be Less than Zero.");
			$("#stdntID").val("");
			$("#stdntID").focus();
			return false;
		}
		$("#err, #info").hide();
		$("[id*='info_']").html("");
		$("#timein, #timeout").prop("disabled",true);
		$("#timein, #timeout").removeClass("pulse");
		search(id);
	});
	$("#timein").click(function () {
		var id = $("#hRefId").val();
		timein(id);
	});
	$("#timeout").click(function () {
		var id = $("#hRefId").val();
		timeout(id);
	});
});
function search(id){
   $.post("ajx.php",
   {
      fn:"search",
      refid:id
   },
   function(data,status) {
      if (status == "success") {
         try {
            eval(data);
         } catch (e) {
            if (e instanceof SyntaxError) {
               alert(e.message);
            }
         }
      }

   });
}
function timein(id){
   $.post("ajx.php",
   {
      fn:"timein",
      refid:id
   },
   function(data,status) {
      if (status == "success") {
         try {
            eval(data);
         } catch (e) {
            if (e instanceof SyntaxError) {
               alert(e.message);
            }
         }
      }

   });
}
function timeout(id){
   $.post("ajx.php",
   {
      fn:"timeout",
      refid:id
   },
   function(data,status) {
      if (status == "success") {
         try {
            eval(data);
         } catch (e) {
            if (e instanceof SyntaxError) {
               alert(e.message);
            }
         }
      }

   });
}
function timedate() {
    var today = new Date();
    var daylist = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    var n = today.toLocaleString();
    var x = daylist[today.getDay()] + " " + n;
    $("#TimeDate").html(x);
    var t = setTimeout(timedate,1000);
}