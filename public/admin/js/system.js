$(document).ready(function () {
	ActiveModule();
	$("[id*='dataList']").DataTable();
	$("#btn_update, #btn_back, #view").hide();
	$("#btn_insert").click(function () {
      $("#btn_update, #btn_back").hide();
      $("#btn_save, #btn_cancel").show();
      $("#btn_save, #btn_update").prop("disabled",false);
      $("[name='StudentID']").prop("readonly",false);
      $("#list").slideUp(500);
      $(".save--").val("");
      $("#hRefId").val("");
      $("#view").slideDown(500);
   });
   $("#btn_cancel").click(function () {
      $("#view").slideUp(500);
      $("#list").slideDown(500);
   });
   $("#btn_back").click(function () {
      $("#view").slideUp(500);
      $(".save--").val("");
      $("#list").slideDown(500);
   });
   $("#btn_close").click(function () {
      $(".card").fadeOut(500);
   });
   $("#btn_save").click(function () {
      var req = false;
      $(".mandatory--").each(function () {
         if($(this).val() == ""){
            alert("Field Required!!!");
            $(this).focus();
            //$(this).selected();
            req = true;
            return false;
         }
      });
      if (!req){
         fnSave();
      }
      
   });
   $("#btn_update").click(function () {
      fnSave();
   });
});
function getFld_Entry(parentId) {
   var objvalue = "";
   var idx = 0;
   $("#"+parentId+" .save--").each(function() {
      objvalue += $(this).attr("name") + "_" + $(this).val() + ",";
   });
   return objvalue;
}
function getObjField(parentId) {
   var objvalue = new Array();
   var idx = 0;
   $("#"+parentId+" .save--").each(function() {
      objvalue[idx] = $(this).attr("name");
      idx++;
   });
   return objvalue;
}
function ActiveModule() {
   var scrn = $("#hProg").val();
   switch (scrn) {
      case "scrnStudents":
         $("#fm").addClass("activeModule",500);
      break;
      case "scrnAttendance":
         $("#rpt").addClass("activeModule",500);
      break;
      case "scrnCourse":
         $("#fm").addClass("activeModule",500);
      break;
      case "scrnUser":
         $("#fm").addClass("activeModule",500);
      break;
      case "scrnProfile":
         $("#profile").addClass("activeModule",500);
      break;
      case "daily_attendance":
         $("#attendance").addClass("activeModule",500);
      break;
      case "multi_attendance":
         $("#attendance").addClass("activeModule",500);
      break;
      
      
   }
}


function afterSave(file){
   alert("Record Save!!!");
   self.location = file;
}
function afterEdit(file){
   alert("Record Updated!!!");
   self.location = file;
}
function afterDelete(file){
   alert("Record Successfully Deleted!!!");
   self.location = file;
}
function chkId(id){
   $.post("system.php",
   {
      task:"chkId",
      refid:id
   },
   function(data,status) {
      if (status == "success") {
         try {
             data;
         } catch (e) {
            if (e instanceof SyntaxError) {
               alert(e.message);
            }
         }
      }

   });  
}
function fnSave(){
   $("#btn_save, #btn_update").prop("disabled",true);
   var table = $("#hTable").val();
   var file = $("#hProg").val() + ".php";
   var RefId = $("#hRefId").val();
   var objvalue = getFld_Entry("EntryScreen");
   $.post("system.php",
   {
      task:"save",
      objnvalue:objvalue,
      refid:RefId,
      tbl:table,
      file:file
   },
   function(data,status) {
      //alert (data,status);
      if (status == "success") {
         code = data;
         try {
             eval(code);
         } catch (e) {
            if (e instanceof SyntaxError) {
               alert(e.message);
            }
         }
      }

   });
}
function del(refid) {
   var table = $("#hTable").val();
   var file = $("#hProg").val() + ".php";
   if (refid > 0)
   {
      if (table!="") {
         DeleteRecord(table,refid,file);
      }
      else {
         alert("Err : No db Table assigned");
         return false;
      }      
   }
   else {
      alert("Err : No Id assigned");
      return false;
   }
}
function DeleteRecord(table,refid,file) {
   if (confirm("Are you sure you want to delete this record " + refid + "?")) {
      $.post("system.php",
      {
         task:"Delete",
         refid:refid,
         table:table,
         file:file
      },
      function(data,status) {
         if (status == "success") {
            code = data;
            try {
                eval(code);
            } catch (e) {
               if (e instanceof SyntaxError) {
                  alert(e.message);
               }
            }
         }

      });
   }
}
function edit(refid){
   $("#hRefId").val(refid);
   var table = $("#hTable").val();
   $.post("system.php",
   {
      task:"View",
      refid:refid,
      table:table
   },
   function(data,status) {
      if (status == "success") {
         try {
            $("#view, #btn_update, #btn_back").show();
            $("#list, #btn_save, #btn_cancel").hide();
            $("[name='StudentID']").prop("readonly",true);
            $("#templateTitle").html("UPDATING RECORD " + refid);
            var objs = getObjField("EntryScreen");
            //alert (objs);
            var o = JSON.parse(data);
            data.RefId = data["RefId"]
            $("#hRefid").html(o["RefId"]);
            for (k=0; k<objs.length; k++) {
               obj = objs[k].split("_");
               $("[name='" + objs[k] + "']").val( o[obj[0]] );
            }
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
