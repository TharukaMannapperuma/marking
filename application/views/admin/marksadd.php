<?php include 'partials/header.php' ?>
<?php include 'partials/nav.php' ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Marks Upload - Update / Insert</h4>
                    <form method="post" id="import_csv" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="csv_file" id="csv_file" required accept=".csv" />
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>

                        </div>
                        <div class="form-group" id="process" style="display:none;">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    <span id="process_data">0</span> - <span id="total_data">0</span>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="text-center">
                            <button type="submit" name="import_csv" class="btn btn-rounded btn-lg btn-info " id="import_csv_btn"><i class="fas fa-upload"></i> Upload</button>
                        </div>
                    </form>
                </div>
                <br />
                <div id="imported_csv_data"></div>
            </div>
        </div>
        <?php include 'partials/footer.php' ?>
        <script>
            $(document).ready(function() {

                load_old_id();

                function load_data() {
                    $.ajax({
                        url: "<?php echo base_url(); ?>csv_import/load_data",
                        method: "POST",
                        success: function(data) {
                            $('#imported_csv_data').html(data);
                        }
                    })
                }

                function err_msg() {
                    $.ajax({
                        url: "<?php echo base_url(); ?>csv_import/error_msg",
                        method: "POST",
                        success: function(data) {
                            $('#imported_csv_data').html(data);
                        }
                    })
                }

                function load_old_id() {
                    $.ajax({
                        url: "<?php echo base_url(); ?>csv_import/old_last_id",
                        method: "POST",
                    })
                }

                $('#import_csv').on('submit', function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: "<?php echo base_url(); ?>csv_import/import",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('#import_csv_btn').html('Importing...');
                            $('#import_csv_btn').html('<i class="fas fa-question"></i> Import Failed');
                            $('#import_csv_btn').removeClass().addClass("btn btn-rounded btn-lg btn-danger");
                        },
                        success: function(data) {
                            $('#import_csv')[0].reset();
                            $('#import_csv_btn').attr('disabled', false);
                            $('#import_csv_btn').html('<i class="fas fa-check"></i> Import Success');
                            $('#import_csv_btn').removeClass().addClass("btn btn-rounded btn-lg btn-success");
                            load_data();
                        },
                        error: function(data) {
                            $('#import_csv_btn').html('<i class="fas fa-exclamation-circle"></i> Import Failed');
                            $('#import_csv_btn').removeClass().addClass("btn btn-rounded btn-lg btn-danger");
                            err_msg();
                        }
                    })
                });

            });
        </script>