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
  <!-- Cropping CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/imageup/croppie.css" />
</head>
<?php include 'partials/nav.php' ?>

<!-- .................................. -->
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
              This is your profile edit page. You can update your details
              as well as your profile picture
            </p>
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
                  <?php echo $this->session->userdata('fname'); ?><span class="font-weight-light"></span>
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
                <hr class="my-4" />
                <div class="text-center">
                  <h6 class="heading-small text-muted mb-4">Click to Update your profile picture</h6>
                  <label class="btn btn-lg btn-rounded btn-success"><i class="fas fa-portrait"></i>
                    Upload <input type="file" name="upload_image" id="upload_image" hidden>
                  </label>
                  <br>
                  <div id="uploaded_image"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-profile">
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <span style="font-size: 150%; font-weight:600;">Reset Password</span>
                  </div>
                  <div class="text-center">
                    <span style="font-size: 70%; color:red;">Password Should Contain Lowercase, Uppercase, Number, Special Charactor and at least 5 charactors long and cannot exceed 32 charactors </span>
                  </div>
                </div>
              </div>
              <?php echo form_open('Database/resetPassword'); ?>
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
        </div>

        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-body">
              <div class="text-center">
                <?php echo form_open('Database/editData'); ?>
                <?php if ($this->session->flashdata('edit')) {
                  echo "<span class='text-center' style='color:red; font-weight: 800;'>" . $this->session->flashdata('edit') . "</span>";
                }
                ?>
                <span style="color:red; font-weight: 800;"><?php echo validation_errors(); ?></span>
              </div>
              <h6 class="heading-small text-muted mb-4">
                User information
              </h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Username</label>
                      <input type="text" id="input-username" class="form-control" value="<?php echo $fetched_data->username; ?>" disabled />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email address</label>
                      <input type="email" id="input-email" class="form-control" name="email" value="<?php echo $fetched_data->email; ?>" placeholder="Email" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">First name</label>
                      <input type="text" id="input-first-name" class="form-control" name="fname" value="<?php echo $fetched_data->fname; ?>" placeholder="First Name" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Last name</label>
                      <input type="text" id="input-last-name" class="form-control" name="lname" value="<?php echo $fetched_data->lname; ?>" placeholder="Last Name" />
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
                      <input id="input-address" class="form-control" type="text" name="address" value="<?php echo $fetched_data->address; ?>" placeholder="Address" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-city">School</label>
                      <input type="text" id="input-city" class="form-control" name="school" value="<?php echo $fetched_data->school; ?>" placeholder="School" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Phone Number</label>
                      <input type="text" id="input-country" class="form-control" name="phone" value="<?php echo $fetched_data->phone; ?>" placeholder="Phone Number" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Shy</label>
                      <input type="text" id="input-postal-code" class="form-control" name="shy" value="<?php echo $fetched_data->shy; ?>" placeholder="Shy" />
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
                      <input id="input-address" class="form-control" type="text" name="cpname" value="<?php echo $fetched_data->cp_name; ?>" placeholder="Name" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-city">Phone Number</label>
                      <input type="text" id="input-city" class="form-control" name="cpnum" value="<?php echo $fetched_data->cp_phone; ?>" placeholder="Phone Number" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Profession</label>
                      <input type="text" id="input-country" class="form-control" name="cppro" value="<?php echo $fetched_data->cp_profession; ?>" placeholder="Profession" />
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <div class="text-center">
                  <h6 class="heading-small text-muted mb-4">Click Submit Button to Update Details</h6>
                  <button type="submit" class="btn btn-lg btn-rounded btn-info"><i class='fa fa-sync-alt'></i>&nbspSubmit</button>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <!-- Image Cropper -->
        <?php include 'partials/footer.php' ?>
        <!-- Image Cropping JaaScript -->
        <script>
          $(document).ready(function() {

            $image_crop = $('#image_demo').croppie({
              enableExif: true,
              viewport: {
                width: 200,
                height: 200,
                type: 'square' //circle
              },
              boundary: {
                width: 250,
                height: 250
              }
            });

            var fileTypes = ['jpg', 'jpeg', 'png'];
            $('#upload_image').on('change', function() {
              var reader = new FileReader();
              var file = this.files[0]; // Get your file here
              var file_size = (this.files[0].size) / (1024 * 1024); // Get your file size here
              var fileExt = file.type.split('/')[1]; // Get the file extension

              if (fileTypes.indexOf(fileExt) !== -1) {
                if (file_size < 5) {
                  reader.onload = function(event) {
                    $image_crop.croppie('bind', {
                      url: event.target.result
                    }).then(function() {
                      console.log('jQuery bind complete');
                    });
                  }
                  reader.readAsDataURL(file);
                  $('#uploadimageModal').modal('show');
                } else {
                  alert('Please Upload an Image less than 5MB');
                }
              } else {
                alert('Only Image Files are supported. Please Select a Valid Image File below 5MB');
              }
            });

            $('.crop_image').click(function(event) {
              $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function(response) {
                $.ajax({
                  url: "upload-image",
                  type: "POST",
                  data: {
                    "image": response
                  },
                  success: function(data) {
                    $('#uploadimageModal').modal('hide');
                    $('#uploaded_image').html(data);
                  }
                });
              })
            });

          });
        </script>
        <!-- Sub Menu for image -->
        <div id="uploadimageModal" class="modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button style='color:red;' type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-8 text-center">
                    <div id="image_demo" style="width:350px; margin-top:30px"></div>
                  </div>
                  <div class="col-md-4" style="padding-top:30px;">
                    <br />
                    <br />
                    <br />
                    <button class="btn btn-success crop_image">Crop & Upload</button>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>