<?php include 'partials/header.php' ?>
<?php include 'partials/nav.php' ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 style="font-weight: 700;">Marks Of All Students</h3>
                <span>This table contains marks of the entire class</span>

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
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Marks</th>
                                    <th>District Rank</th>
                                    <th>Central Rank</th>
                                    <th>Uploaded Date</th>
                                    <th style="width:125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id='showdata'>
                                <?php foreach ($fetched_data as $row) {
                                    $username = $row->student;
                                    $id = $row->id;
                                    $marks = $row->marks;
                                    $d_rank = $row->d_rank;
                                    $c_rank = $row->c_rank;
                                    $date = $row->created_at;
                                    echo
                                        "<tr>
                                            <td>$id</td>
                                            <td>$username</td>
                                            <td>$marks</td>
                                            <td>$d_rank</td>
                                            <td>$c_rank</td>
                                            <td>$date</td>
                                            <td>
                                                <div class='text-center'>
                                                    <a
                                                        href='javascript:;'
                                                        class='btn btn-rounded btn-info item-edit'
                                                        data=$id>Edit
                                                    </a>
                                                &nbsp
                                                    <a
                                                        href='javascript:;'
                                                        class='btn btn-rounded btn-danger item-delete'
                                                        data=$id>Delete
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
                            <input type="hidden" name="txtId" value="0">
                            <div class="form-group">
                                <label for="username" class="label-control col-md-6">Student Username</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtuser" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="label-control col-md-6">Class</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtclass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paper" class="label-control col-md-6">Paper</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtpaper" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="marks" class="label-control col-md-6">Marks</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtmarks" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="drank" class="label-control col-md-6">District Rank</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtdrank" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="crank" class="label-control col-md-6">Central Rank</label>
                                <div class="col-md-12">
                                    <input type="text" name="txtcrank" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="btnSave" class="btn btn-rounded btn-primary">Add Marks</button>
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
                    $('#myModal').modal('show');
                    $('#myModal').find('.modal-title').text('Add New Marks');
                    $('#myForm').attr('action', '<?php echo base_url() ?>marks_all/addMarks');
                });


                $('#btnSave').click(function() {
                    var url = $('#myForm').attr('action');
                    var data = $('#myForm').serialize();
                    //validate form
                    var user = $('input[name=txtuser]');
                    var clas = $('input[name=txtclass]');
                    var paper = $('input[name=txtpaper]');
                    var marks = $('input[name=txtmarks]');
                    var drank = $('input[name=txtdrank]');
                    var crank = $('input[name=txtcrank]');
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
                    if (paper.val() == '') {
                        paper.parent().parent().addClass('has-error');
                    } else {
                        paper.parent().parent().removeClass('has-error');
                        result += 2;
                    }
                    if (marks.val() == '') {
                        marks.parent().parent().addClass('has-error');
                    } else {
                        marks.parent().parent().removeClass('has-error');
                        result += 3;
                    }
                    if (drank.val() == '') {
                        drank.parent().parent().addClass('has-error');
                    } else {
                        drank.parent().parent().removeClass('has-error');
                        result += 4;
                    }
                    if (crank.val() == '') {
                        crank.parent().parent().addClass('has-error');
                    } else {
                        crank.parent().parent().removeClass('has-error');
                        result += 5;
                    }

                    if (result === 15) {
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
                                            var type = "<div class='alert alert-success' role='alert'><i class='fas fa-check'></i> Marks Added Successfully!</div>";
                                        } else if (response.type == 'update') {
                                            var type = "<div class='alert alert-success' role='alert'><i class='fas fa-check'></i> Marks Updated Successfully!</div>";
                                        }
                                        localStorage.setItem('alertData', type);
                                        sessionStorage.reloadAfterPageLoad = true;
                                        window.location.reload();

                                    } else {
                                        var type = "<div class='alert alert-danger' role='alert'><i class='fas fa-exclamation-circle'></i> Data Exists! Please Update</div>";
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
                    $('#myModal').find('.modal-title').text('Edit Marks Table');
                    $('#myForm').attr('action', '<?php echo base_url() ?>marks_all/updateMarks');
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: '<?php echo base_url() ?>marks_all/editMarks',
                        data: {
                            id: id
                        },
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            $('input[name=txtuser]').val(data.student).prop("disabled", true);;
                            $('input[name=txtclass]').val(data.class);
                            $('input[name=txtpaper]').val(data.paper);
                            $('input[name=txtmarks]').val(data.marks);
                            $('input[name=txtdrank]').val(data.d_rank);
                            $('input[name=txtcrank]').val(data.c_rank);
                            $('input[name=txtId]').val(data.id);
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
                            url: '<?php echo base_url() ?>marks_all/deleteMarks',
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#deleteModal').modal('hide');
                                    var data = "<div class='alert alert-success' role='alert'><i class='fas fa-check'></i> Marks Deleted Successfully!</div>";
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