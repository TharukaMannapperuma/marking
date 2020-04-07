<?php include 'partials/header.php' ?>
<?php include 'partials/nav.php' ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 style="font-weight: 700;">Marks Of All Students</h3>
                <span>This table contains marks of the entire class</span>
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