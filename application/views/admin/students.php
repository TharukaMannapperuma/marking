<?php include 'partials/header.php' ?>
<?php include 'partials/nav.php' ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 style="font-weight: 700;">All Students</h3>
                <span>This table contains all the students</span>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-trash-2 close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <div class="dt-responsive table-responsive">
                        <table id="res-config" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Class</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($fetched_data as $row) {
                                    $username = $row->username;
                                    $class = $row->class;
                                    $fname = $row->fname;
                                    $lname = $row->lname;
                                    $email = $row->email;
                                    $phone = $row->phone;
                                    echo
                                        "<tr>
                                            <td>$username</td>
                                            <td>$class</td>
                                            <td>$fname</td>
                                            <td>$lname</td>
                                            <td>$email</td>
                                            <td>$phone</td>
                                        </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'partials/footer.php' ?>