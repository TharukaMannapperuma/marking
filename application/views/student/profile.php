<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!($this->session->userdata('loggedin')) || ($this->session->userdata('user_type') !== 'user')) {
  $this->session->set_flashdata('msg', 'You Dont have access to this!, <br> Please log in as a student');
  redirect("index");
  exit;
} ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4." />
  <meta name="author" content="Creative Tim" />
  <title>Darshana Ukuwela - Physics Foundation</title>
  <!-- Favicon -->

  <link rel="icon" href="<?php echo base_url(); ?>assets/img/brand/favicon.png" type="image/png" />
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/nucleo/css/nucleo.css" type="text/css" />
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/argon.css?v=1.2.0" type="text/css" />
  <link href="<?php echo base_url(); ?>dist/css/style.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/6d41dc11d3.js" crossorigin="anonymous"></script>
</head>
<?php include 'partials/nav.php' ?>
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(https://www.incimages.com/uploaded_files/image/970x450/getty_509107562_2000133320009280346_351827.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-5"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $this->session->userdata('fname') ?></h1>
            <p class="text-white mt-0 mb-5">
              This is your profile page. You can see the progress you've made
              with your work and manage your projects or assigned tasks
            </p>
            <a href=<?php echo base_url('edit') ?> class="btn btn-rounded btn-primary">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="https://www.incimages.com/uploaded_files/image/970x450/getty_509107562_2000133320009280346_351827.jpg" alt="Image placeholder" class="card-img-top" />
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?php echo base_url() . $fetched_data->image; ?>" class="rounded-circle" />
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4"></div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center"></div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  <?php echo $this->session->userdata('fname') . " " . $this->session->userdata('lname'); ?><span class="font-weight-light"></span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $fetched_data->address; ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $fetched_data->shy; ?> Time A/L
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?php echo $fetched_data->school; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">
                  User information
                </h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control" value="<?php echo $this->session->userdata('uname') ?>" disabled />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" value="<?php echo $this->session->userdata('email') ?>" placeholder="First Name" disabled />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control" value="<?php echo $this->session->userdata('fname') ?>" placeholder="First Name" disabled />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control" value="<?php echo $fetched_data->lname; ?>" placeholder="Last Name" disabled />
                      </div>
                    </div>
                  </div>
                </div>
                <hr class=" my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">
                  User Contact information
                </h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control" type="text" value="<?php echo $fetched_data->address; ?>" placeholder="Address" disabled />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">School</label>
                        <input type="text" id="input-city" class="form-control" value="<?php echo $fetched_data->school; ?>" placeholder="School" disabled />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Phone Number</label>
                        <input type="text" id="input-country" class="form-control" value="<?php echo $fetched_data->phone; ?>" placeholder="Phone Number" disabled />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Shy</label>
                        <input type="text" id="input-postal-code" class="form-control" value="<?php echo $fetched_data->shy; ?>" placeholder="Shy" disabled />
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">
                  Contact Person Information
                </h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Name</label>
                        <input id="input-address" class="form-control" placeholder="Home Address" type="text" value="<?php echo $fetched_data->cp_name; ?>" placeholder="Name" disabled />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Phone Number</label>
                        <input type="text" id="input-city" class="form-control" value="<?php echo $fetched_data->cp_phone; ?>" placeholder="Phone Number" disabled />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Profession</label>
                        <input type="text" id="input-country" class="form-control" value="<?php echo $fetched_data->cp_profession; ?>" placeholder="Profession" disabled />
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php include 'partials/footer.php' ?>