<?php include "header.php"; ?>
<div class="container">
  <div class="main_wrapper">
    <h3 class="text-center">All Register Students Details</h3>
    <hr />
    <div class="row">
      <div class="col-md-12">
        <div class="pull-right"><button type="button" data-toggle="modal" data-target="#studentModal_form" class="btn btn-sm btn-primary" data-backdrop="static" data-keyboard="false" id="student_add_model" name="add_student_btn"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Student Details</button> </div>
      </div>
    </div>
    <div class="table-responsive">
      <table id="student_table" class="table-border table-hover display dt-responsive nowrap" style="width:100%">
          <thead>
              <tr>
                  <th>S.No</th>
                  <th>Roll No</th>
                  <th>Student Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Department</th>
                  <th>Subject</th>
                  <th>Total</th>
                  <th>Mark Obtain</th>
                  <th>Result</th>
                  <th>Grade</th>
                  <th>Created Date</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Student Model -->
<div id="studentModal_form" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Student Register Form</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form action="#" id="student_form" name="student_form" method="POST">
            <input type="hidden" id="hidden_stu_update_id" name="hidden_stu_update_id" />
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="Roll No">Roll No:</label>
                <input type="text" class="form-control" id="roll_no" placeholder="Enter Roll No." maxlength="10" name="roll_no" />
                <span class="err_highlight error_rollno"></span>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="Student Name">Student Name:</label>
                <input type="text" class="form-control" id="student_name" placeholder="Enter Student Name" name="student_name" />
                <span class="err_highlight error_name"></span>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="Student Email">Email ID:</label>
                <input type="email" class="form-control" id="student_email" placeholder="Enter Email ID" name="student_email" />
                <span class="err_highlight error_email"></span>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="Mobile No">Mobile No:</label>
                <input type="tel" class="form-control" maxlength="10" id="student_mobile" placeholder="Enter Mobile No" name="student_mobile" />
                <span class="err_highlight error_mobileno"></span>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="Department">Department:</label>
                <select class="form-control" id="student_department" name="student_department">
                  <option value="">--Select Department--</option>
                  <option value="Science">Science Dept</option>
                  <option value="Literature">Literature</option>
                  <option value="Biology">Biology</option>
                  <option value="Economics">Economics</option>
                  <option value="Maths">Economics</option>
                </select>
                <span class="err_highlight error_dept"></span>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="Subjects">Subjects:</label>
                <input type="text" class="form-control" id="student_subjects" placeholder="Enter Subjects" name="student_subjects" />
                <span class="err_highlight error_subjects"></span>
              </div>
            </div>
            <div class="col-md-3 col-xs-6">
              <div class="form-group">
                <label for="Subject1">Subject-1:</label>
                <input type="text" class="form-control marks" id="student_subject1" maxlength="3" placeholder="Enter mark" name="student_subject1" />
                <span class="err_highlight error_subject1"></span>
              </div>
            </div>
            <div class="col-md-2 col-xs-6">
              <div class="form-group">
                <label for="Subject2">Subject-2:</label>
                <input type="text" class="form-control marks" id="student_subject2" placeholder="Enter mark" name="student_subject2" />
                <span class="err_highlight error_subject2"></span>
              </div>
            </div>
            <div class="col-md-2 col-xs-6">
              <div class="form-group">
                <label for="Subject3">Subject-3:</label>
                <input type="text" class="form-control marks" id="student_subject3" placeholder="Enter mark" name="student_subject3" />
                <span class="err_highlight error_subject3"></span>
              </div>
            </div>
            <div class="col-md-2 col-xs-6">
              <div class="form-group">
                <label for="Subject4">Subject-4:</label>
                <input type="text" class="form-control marks" id="student_subject4" placeholder="Enter mark" name="student_subject4" />
                <span class="err_highlight error_subject4"></span>
              </div>
            </div>
            <div class="col-md-3 col-xs-12">
              <div class="form-group">
                <label for="Subject5">Subject-5:</label>
                <input type="text" class="form-control marks" id="student_subject5" placeholder="Enter mark" name="student_subject5" />
                <span class="err_highlight error_subject5"></span>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="Total">Total Marks:</label>
                <input type="text" class="form-control" id="student_totalmarks" placeholder="Total Marks" name="student_totalmarks" readonly />
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="Result">Result:</label>
                <input type="text" class="form-control" id="student_result" placeholder="Result" name="student_result" readonly />
              </div>
            </div>
            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label for="Grade">Grade:</label>
                <input type="text" class="form-control" id="student_grade" placeholder="Grade" name="student_grade" readonly />
              </div>
            </div>
           </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="save_student_details">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
