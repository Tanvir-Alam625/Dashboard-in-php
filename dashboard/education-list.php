<?php
require_once('./includes/header.php');
// education insert query 
$db_educations_query = "SELECT * FROM educations ;";
$db_educations_result = mysqli_query($db_connect, $db_educations_query);
$convert_array = mysqli_fetch_assoc($db_educations_result);
?>
<!-- section html tags  -->
<div class="app-content">
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">List of Education</h5>
                        </div>
                        <div class="card-body">
                        <div class="example-container">
                            <div class="example-content">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Education Name</th>
                                            <th scope="col">Education Credit</th>
                                            <th scope="col">Education Year</th>
                                            <th scope="col">Education Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- table colmun  -->
                                        <?php 
                                        $colmun_id = 0;
                                        foreach ($db_educations_result as  $education):
                                            $colmun_id++;
                                            ?>
                                            <tr>
                                            <th scope="row"><?=$colmun_id?></th>
                                            <td><?= $education["Name"]?></td>
                                            <td><?= $education["Credit"]?></td>
                                            <td><?= $education["Year"]?></td>
                                            <td>
                                                <?php if($education["Status"] == "active"){
                                                    ?>
                                                    <span class="badge badge-success">
                                                        Active
                                                    </span>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <span class="badge badge-warning">
                                                        Inactive
                                                    </span>
                                                    <?php
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <div >
                                                    <a href="./update-education.php?id=<?=$education["ID"] ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="./auth/delete/education-delete.php?id=<?= $education["ID"]?>" class="btn btn-sm btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                            <?php
                                        endforeach
                                        ?>
                                    </tbody>
                                </table>
                                <!-- empty data  -->
                                <?php
                                 if(!$convert_array == 1){
                                    ?>
                                    <h3 class="my-3 text-center ">No Found Data</h3>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('./includes/footer.php');
?>