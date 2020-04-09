<?php include 'partials/header.php' ?>
<?php include 'partials/nav.php' ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 style="font-weight: 700;">All Students</h3>
                <span>This table contains the entire class</span>

                <div class="card-header-right">
                    <br />
                    <button id="btnAdd" class="btn btn-lg btn-rounded btn-success">Add New</button>
                </div>

            </div>
            <div id="update_alert">
            </div>
            <div id="table_data" class="card-block">
                <div class="table-responsive">
                    <div class="dt-responsive table-responsive">
                        <table id="res-config" class="table table-striped table-bordered dt-responsive nowrap table-dark">
                            <thead>
                                <tr>
                                <tr>
                                    <th>Username</th>
                                    <th>Class</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id='showdata'>
                                <?php foreach ($fetched_data as $row) {
                                    $username = $row->username;
                                    $class = $row->class;
                                    $fname = $row->fname;
                                    $email = $row->email;
                                    $phone = $row->phone;
                                    echo
                                        "<tr>
                                            <td>$username</td>
                                            <td>$class</td>
                                            <td>$fname</td>
                                            <td>$email</td>
                                            <td>$phone</td>
                                            <td>
                                            <div class='text-center'>
                                                <a
                                                    href='javascript:;'
                                                    class='btn btn-rounded btn-info item-edit'
                                                    data=$username>Edit
                                                </a>
                                            &nbsp   
                                                <a
                                                    href='javascript:;'
                                                    class='btn btn-rounded btn-light item-reset'
                                                    data=$username>Reset Password
                                                </a>
                                            &nbsp
                                                <a
                                                    href='javascript:;'
                                                    class='btn btn-rounded btn-danger item-delete'
                                                    data=$username>Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color: red;" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="username" class="label-control col-md-6">Student Username</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtuser" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class" class="label-control col-md-6">Class</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtclass" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="btnSave" class="btn btn-rounded btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="passwordModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color: red;" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="passwordForm" action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="username" class="label-control col-md-6">Student Username</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtuser" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class" class="label-control col-md-6">New Password</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtpass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class" class="label-control col-md-6">Confirm New Password</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtpass2" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="btnReset" class="btn btn-rounded btn-primary">Reset</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color: red;" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete this record ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="btnDelete" class="btn btn-rounded btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'partials/footer.php' ?>
        <script>
            $(function() {
                if (sessionStorage.reloadAfterPageLoad) {
                    var alertVal = localStorage.getItem('alertData');
                    localStorage.removeItem('alertData');
                    $('#update_alert').html(alertVal).fadeIn().delay(5000).fadeOut('slow');
                    sessionStorage.reloadAfterPageLoad = false;
                }
                //Add New
                $('#btnAdd').click(function() {
                    $('input[name=txtuser]').prop("readonly", false);
                    $('#myModal').modal('show');
                    $('#myForm')[0].reset();
                    $('#myModal').find('.modal-title').text('Add New User');
                    $('#myForm').attr('action', '<?php echo base_url() ?>student_all/addStudent');
                });

                $('#btnReset').click(function() {

                    var url = $('#passwordForm').attr('action');
                    var data = $('#passwordForm').serialize();
                    //Form Data
                    var newp = $('input[name=txtpass]');
                    var newp2 = $('input[name=txtpass2]');
                    var result = 0;
                    if (newp.val() == '') {
                        newp.parent().parent().addClass('has-error');
                    } else {
                        newp.parent().parent().removeClass('has-error');
                        result += 1;
                    }
                    if (newp2.val() == '') {
                        newp2.parent().parent().addClass('has-error');
                    } else {
                        newp2.parent().parent().removeClass('has-error');
                        result += 2;
                    }
                    if (result === 3) {
                        $.ajax({
                            type: 'ajax',
                            method: 'post',
                            url: url,
                            data: data,
                            async: false,
                            dataType: 'json',
                            success: function(response) {
                                $('#passwordModel').modal('hide');
                                if (response.success) {
                                    var type = "<div class='alert alert-success' role='alert'><i class='fas fa-check'></i> Password Reset Successful!</div>";
                                    localStorage.setItem('alertData', type);
                                    sessionStorage.reloadAfterPageLoad = true;
                                    window.location.reload();
                                } else if (response.case == 'nolen') {
                                    var alertVal = "<div class='alert alert-danger' role='alert'><i class='fas fa-exclamation-circle'></i> Please enter a password with more than 5 characters!</div>";
                                    $('#update_alert').html(alertVal).fadeIn().delay(5000).fadeOut('slow');
                                } else if (response.case == 'nomatch') {
                                    var alertVal = "<div class='alert alert-danger' role='alert'><i class='fas fa-exclamation-circle'></i> Password Does Not Match. Try Again!</div>";
                                    $('#update_alert').html(alertVal).fadeIn().delay(5000).fadeOut('slow');
                                } else {
                                    var alertVal = "<div class='alert alert-danger' role='alert'><i class='fas fa-exclamation-circle'></i> Password Not Resetted. Something went wrong 1!</div>";
                                    $('#update_alert').html(alertVal).fadeIn().delay(5000).fadeOut('slow');
                                }
                            },
                            error: function() {
                                $('#passwordModel').modal('hide');
                                var alertVal = "<div class='alert alert-danger' role='alert'><i class='fas fa-exclamation-circle'></i> Password Not Resetted. Something went wrong 2!</div>";
                                $('#update_alert').html(alertVal).fadeIn().delay(5000).fadeOut('slow');
                            }
                        });
                    }
                });

                $('#btnSave').click(function() {
                    var url = $('#myForm').attr('action');
                    var data = $('#myForm').serialize();
                    //validate form
                    var user = $('input[name=txtuser]');
                    var clas = $('input[name=txtclass]');
                    var result = 0;
                    if (user.val() == '') {
                        user.parent().parent().addClass('has-error');
                    } else {
                        user.parent().parent().removeClass('has-error');
                        result += 0;
                    }
                    if (clas.val() == '') {
                        clas.parent().parent().addClass('has-error');
                    } else {
                        clas.parent().parent().removeClass('has-error');
                        result += 1;
                    }

                    if (result === 1) {
                        $.ajax({
                            type: 'ajax',
                            method: 'post',
                            url: url,
                            data: data,
                            async: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#myModal').modal('hide');
                                    $('#myForm')[0].reset();
                                    if (response.type !== 'exist') {
                                        if (response.type == 'add') {
                                            var type = "<div class='alert alert-success' role='alert'><i class='fas fa-check'></i> User Added Successfully!</div>";
                                        } else if (response.type == 'update') {
                                            var type = "<div class='alert alert-success' role='alert'><i class='fas fa-check'></i> User Data Updated Successfully!</div>";
                                        }
                                        localStorage.setItem('alertData', type);
                                        sessionStorage.reloadAfterPageLoad = true;
                                        window.location.reload();

                                    } else {
                                        var type = "<div class='alert alert-danger' role='alert'><i class='fas fa-exclamation-circle'></i> User Exists! Please Update</div>";
                                        localStorage.setItem('alertData', type);
                                        sessionStorage.reloadAfterPageLoad = true;
                                        window.location.reload();
                                    }

                                } else {
                                    alert("Error Occured!");
                                }
                            },
                            error: function() {
                                alert('Could not add data');
                            }
                        });
                    }
                });

                //edit
                $('#showdata').on('click', '.item-edit', function() {
                    var id = $(this).attr('data');
                    $('#myModal').modal('show');
                    $('#myModal').find('.modal-title').text('Edit Student Table');
                    $('#myForm').attr('action', '<?php echo base_url() ?>student_all/updateStudent');
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: '<?php echo base_url() ?>student_all/editStudent',
                        data: {
                            id: id
                        },
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            $('input[name=txtuser]').val(data.username).prop("readonly", true);
                            $('input[name=txtclass]').val(data.class);
                        },
                        error: function() {
                            alert('Could not Edit Data');
                        }
                    });
                });

                //Password Reset
                $('#showdata').on('click', '.item-reset', function() {
                    var id = $(this).attr('data');
                    $('#passwordModel').modal('show');
                    $('#passwordForm').attr('action', '<?php echo base_url() ?>student_all/resetPassword');
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: '<?php echo base_url() ?>student_all/editStudent',
                        data: {
                            id: id
                        },
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            $('input[name=txtuser]').val(data.username).prop("readonly", true);
                        },
                        error: function() {
                            alert('Could not Edit Data');
                        }
                    });
                });

                //delete- 
                $('#showdata').on('click', '.item-delete', function() {
                    var id = $(this).attr('data');
                    $('#deleteModal').modal('show');
                    //prevent previous handler - unbind()
                    $('#btnDelete').unbind().click(function() {
                        $.ajax({
                            type: 'ajax',
                            method: 'get',
                            async: false,
                            url: '<?php echo base_url() ?>student_all/deleteStudent',
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#deleteModal').modal('hide');
                                    var data = "<div class='alert alert-success' role='alert'><i class='fas fa-check'></i> Student Deleted Successfully!</div>";
                                    localStorage.setItem('alertData', data);
                                    sessionStorage.reloadAfterPageLoad = true;
                                    window.location.reload();

                                } else {
                                    alert('Error While Deleting!');
                                }
                            },
                            error: function() {
                                alert('Error deleting');
                            }
                        });
                    });
                });
            });
        </script>