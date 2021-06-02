<!-- Footer -->
<footer class="fixed-bottom">
<p class="text-center">
  Copyright © 2021. All Rights Reserved. Privacy Policy
</p>
</footer>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script>
var data_table;
$(document).ready(function(){
  $('.marks').keyup(function(){
    if ($(this).val() > 100){
      alert("Max mark 100 and below");
      $(this).val('');
    }
  });
  $(".marks").each(function() {
    $(this).keyup(function(){
    	calculateSum();
    });
  });
  $(".marks").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
       return false;
    }
  });
  $("#student_mobile").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
       return false;
    }
  });
  $("#save_student_details").click(function (e) {
    var formError = false;
    var roll_no = $('#roll_no').val();
    var name = $('#student_name').val();
    var email = $('#student_email').val();
    var mobile = $('#student_mobile').val();
    var dept = $('#student_department').val();
    var subjects = $('#student_subjects').val();
    var subject1 = $('#student_subject1').val();
    var subject2 = $('#student_subject2').val();
    var subject3 = $('#student_subject3').val();
    var Subject4 = $('#student_subject4').val();
    var Subject5 = $('#student_subject5').val();
    var total = $('#student_totalmarks').val();
    var result = $('#student_result').val();
    var grade = $('#student_grade').val();
    if(roll_no == ""){
      $('.error_rollno').html('plese enter roll no');formError = true;
    } else{
      $('.error_rollno').html('');
    }
    if(name == ""){
      $('.error_name').html('plese enter name');formError = true;
    } else{
      $('.error_name').html('');
    }
    if(email == "") {
      $('.error_email').html('Please enter email');formError = true;
    } else {
      var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      if(filter.test(email)) {
        $('.error_email').html('');
      } else {
        $('.error_email').html('Please enter valid e-mail');
        formError = true;
      }
    }
    if(mobile == ""){
      $('.error_mobileno').html('plese enter mobile no');formError = true;
    } else{
      $('.error_mobileno').html('');
    }
    if(dept == ""){
      $('.error_dept').html('plese enter department');formError = true;
    } else{
      $('.error_dept').html('');
    }
    if(subjects == ""){
      $('.error_subjects').html('plese enter subjects');formError = true;
    } else{
      $('.error_subjects').html('');
    }
    if(subject1 == ""){
      $('.error_subject1').html('enter mark1');formError = true;
    } else{
      $('.error_subject1').html('');
    }
    if(subject2 == ""){
      $('.error_subject2').html('enter mark2');formError = true;
    } else{
      $('.error_subject2').html('');
    }
    if(subject3 == ""){
      $('.error_subject3').html('enter mark3');formError = true;
    } else{
      $('.error_subject3').html('');
    }
    if(Subject4 == ""){
      $('.error_subject4').html('enter mark4');formError = true;
    } else{
      $('.error_subject4').html('');
    }
    if(Subject5 == ""){
      $('.error_subject5').html('enter mark5');formError = true;
    } else{
      $('.error_subject5').html('');
    }

    if(formError == false) {
      $.ajax({
        url: 'classes/DataSave.php?student_Data',
        type: 'post',
        data: {
          roll_no : roll_no,
          name : name,
          email : email,
          mobile : mobile,
          dept : dept,
          subjects : subjects,
          subject1 : subject1,
          subject2 : subject2,
          subject3 : subject3,
          Subject4 : Subject4,
          Subject5 : Subject5,
          total : total,
          result : result,
          grade : grade
        },
        beforeSend: function(){ },
        success: function (response) {
          if(response == 'success') {
            $('#student_form')[0].reset();
            alert('Student details saved successfully');
            location.reload();
          }
        },
        complete: function(){ }
      });
    }

  });
  data_table = $('#student_table').DataTable({
      "processing": true,
      "serverSide": true,
      dom: 'Bfrtip',
      buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
      "ajax": "classes/getData.php",
      "columns": [
        { "data": "0" },
        { "data": "1" },
        { "data": "2" },
        { "data": "3" },
        { "data": "4" },
        { "data": "5" },
        { "data": "6" },
        { "data": "7" },
        { "data": "8" },
        { "data": "9" },
        { "data": "10" },
        { "data": "11" },
        { "data": "12" }
      ],
      "columnDefs": [{
        targets: 12,
        render: function (data, type, row, meta) {
          if (type === 'display') {
            data = `<a title="Update Student" onclick="updateStudent('${row[0]}', '${row[1]}', '${row[2]}','${row[3]}','${row[4]}', '${row[5]}', '${row[6]}', '${row[7]}', '${row[8]}', '${row[9]}','${row[10]}' )" data-toggle="modal" data-target="#studentModal_form" data-backdrop="static" data-keyboard="false" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> &nbsp; <a title="Delete Student" href="javascript:void(0)" onclick="deleteStudent('${row[0]}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>`;
          }
          return data;
        }
      }]
    });
});

function calculateSum() {
	var sum = 0;
	$(".marks").each(function() {
		if(!isNaN(this.value) && this.value.length!=0) {
			sum += parseFloat(this.value);
		}
	});
	$("#student_totalmarks").val(sum.toFixed(2));
  if(parseFloat($('#student_totalmarks').val()) >= 250){
    $("#student_result").val("Pass").css({"color": "green", "font-weight": "bold"});
  } else {
    $("#student_result").val("Fail").css({"color": "red", "font-weight": "bold"});
  }
  var percent = sum.toFixed(2) / 5;
  if (percent >= 90 && percent <= 100) {
    $('#student_grade').val("S - Grade");
  } else if(percent >= 80 && percent <= 90) {
    $('#student_grade').val("A+ Grade");
  } else if(percent >= 70 && percent <= 80) {
    $('#student_grade').val("A - Grade");
  } else if(percent >= 60 && percent <= 70) {
    $('#student_grade').val("B - Grade");
  } else if(percent >= 50 && percent <= 60) {
    $('#student_grade').val("C - Grade");
  } else {
    $('#student_grade').val("No Grade");
  }
}

function updateStudent(u_id,roll_no,name,email,mobile,dept,subject,total,obtain,result,grade) {
  $('#hidden_stu_update_id').val(u_id);
  $('#roll_no').val(roll_no);
  $('#student_name').val(name);
  $('#student_mobile').val(mobile);
  $('#student_email').val(email);
  $('#student_department').val(dept);
  $('#student_subjects').val(subject);
  $('#student_totalmarks').val(obtain);
  $('#student_result').val(result);
  $('#student_grade').val(grade);
  $('#student_subject1').attr("disabled", "disabled");
  $('#student_subject2').attr("disabled", "disabled");
  $('#student_subject3').attr("disabled", "disabled");
  $('#student_subject4').attr("disabled", "disabled");
  $('#student_subject5').attr("disabled", "disabled");
  $('#save_student_details').hide();
  var update_btn = $('<button type="button" class="btn btn-info" id="update_student_details">Update</button>');
  $('#studentModal_form').find('div.modal-footer').append(update_btn);
}

function deleteStudent(del_id) {
  var confirm_box = confirm("Sure to delete this record!");
    if (confirm_box == true) {
      $.ajax({
        url: 'classes/DataSave.php?deleteStudent',
        type: 'post',
        data: { del_id: del_id },
        beforeSend: function() { },
        success: function (data) {
          if(data == 'success') {
            data_table.ajax.reload();
            alert("Successfully deleted this record.");
          } else {
            data_table.ajax.reload();
            alert("error to delete.");
          }
        },
        complete: function(){ }
      });
    } else {
      alert("This record is not deleted...!")
    }
}
$(document).ready(function(){
$("#update_student_details").click(function (e) {
  var formError = false;
  var update_id = $('#hidden_stu_update_id').val();
  var roll_no = $('#roll_no').val();
  var name = $('#student_name').val();
  var email = $('#student_email').val();
  var mobile = $('#student_mobile').val();
  var dept = $('#student_department').val();
  var subjects = $('#student_subjects').val();
  if(roll_no == ""){
    $('.error_rollno').html('plese enter roll no');formError = true;
  } else{
    $('.error_rollno').html('');
  }
  if(name == ""){
    $('.error_name').html('plese enter name');formError = true;
  } else{
    $('.error_name').html('');
  }
  if(email == "") {
    $('.error_email').html('Please enter email');formError = true;
  } else {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if(filter.test(email)) {
      $('.error_email').html('');
    } else {
      $('.error_email').html('Please enter valid e-mail');
      formError = true;
    }
  }
  if(mobile == ""){
    $('.error_mobileno').html('plese enter mobile no');formError = true;
  } else{
    $('.error_mobileno').html('');
  }
  if(dept == ""){
    $('.error_dept').html('plese enter department');formError = true;
  } else{
    $('.error_dept').html('');
  }
  if(subjects == ""){
    $('.error_subjects').html('plese enter subjects');formError = true;
  } else{
    $('.error_subjects').html('');
  }

  if(formError == false) {
    $.ajax({
      url: 'classes/DataSave.php?updateStudent_Data',
      type: 'post',
      data: {
        update_id:update_id,
        roll_no : roll_no,
        name : name,
        email : email,
        mobile : mobile,
        dept : dept,
        subjects : subjects
      },
      beforeSend: function(){ },
      success: function (response) {
        if(response == 'success') {
          $('#student_form')[0].reset();
          alert('Student details updated successfully');
          location.reload();
        }
      },
      complete: function(){ }
    });
  }
});
});


</script>
</body>
</html>
