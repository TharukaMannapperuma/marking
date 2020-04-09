<?php include 'partials/header.php' ?>
<?php include 'partials/nav.php' ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card card-profile">
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center">
                            <span style="font-size: 150%; font-weight:600;"><br />Reset Password</span>
                        </div>
                        <div class="text-center">
                            <?php if ($this->session->flashdata('edit')) {
                                echo "<span class='text-center' style='color:red; font-weight: 800;'>" . $this->session->flashdata('edit') . "</span>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php echo form_open('Database/adminResetPassword'); ?>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">New Password</label>
                                <input type="password" id="input-username" class="form-control" name='newpass' placeholder="New Password" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Confirm Password</label>
                                <input type="password" id="input-first-name" class="form-control" name="confirmpass" placeholder="Confirm New Password" />
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-rounded btn-danger">
                            <i class='fa fa-sync-alt'></i>&nbspReset</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <?php include 'partials/footer.php' ?>