<?php include 'partials/header.php' ?>
<?php include 'partials/nav.php' ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 style="font-weight: 700;">Select Marks</h3>
                <span>You can select the paper to display marks of that paper <br> </span>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4" style="padding-top: 15px">
                        <div class="card" style="margin-bottom: 10px">
                            <div class="card-body" style="padding: 5px">
                                <div class="form-group mb-1">
                                    <?php echo form_open('Database/selectTable'); ?>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="paper" onchange="this.form.submit()">
                                        <option value="1" selected>Choose...</option>
                                        <?php
                                        foreach ($paper_no as $num) {
                                            echo "<option value=$num>Paper " . $num . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <span>
                                <?php echo "<span class='text-center' style='color:red; font-weight: 500;'>" . "Selected paper is :  " . ($fetched_data[0]->paper) . "</span>"; ?>
                            </span>
                        </div>
                    </div>
                </div>
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
                        <table id="res-config" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Marks</th>
                                    <th>District Rank</th>
                                    <th>Central Rank</th>
                                    <th>Uploaded Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($fetched_data as $row) {
                                    $username = $row->student;
                                    $marks = $row->marks;
                                    $d_rank = $row->d_rank;
                                    $c_rank = $row->c_rank;
                                    $date = $row->created_at;
                                    echo
                                        "<tr>
                      <td>$username</td>
                    <td>$marks</td>
                    <td>$d_rank</td>
                    <td>$c_rank</td>
                    <td>$date</td>
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