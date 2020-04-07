<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!($this->session->userdata('loggedin')) || ($this->session->userdata('user_type') !== 'admin')) {
    $this->session->set_flashdata('msg', 'You Dont have access to this!, <br> Please log in as Admin');
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
    <link href="<?php echo base_url(); ?>dist/css/style.min.css" rel="stylesheet" />
    <!-- Image Crop -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/imageup/croppie.css" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/extra-libs/c3/c3.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/libs/chartist/dist/chartist.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/dash.cards.css" rel="stylesheet" />

    <!-- DataTable CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatable/datatables.net-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatable/data-table/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatable/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatable/data-table/extensions/responsive/css/responsive.dataTables.css" />
    <!-- Fonts - Profile -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <!-- Icons - Profile -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/nucleo/css/nucleo.css" type="text/css" />
</head>