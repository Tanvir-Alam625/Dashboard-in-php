<?php
require_once('./includes/header.php');
// work insert query 
$db_works_query = "SELECT * FROM works ;";
$db_works_result = mysqli_query($db_connect, $db_works_query);
$convert_array = mysqli_fetch_assoc($db_works_result);
?>
<div class="app-content">
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">List of Work</h5>
                        </div>
                        <div class="card-body">
                        <div class="example-container">
                            <div class="example-content">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Work Title</th>
                                            <th scope="col">Work Image</th>
                                            <th scope="col">Work Description</th>
                                            <th scope="col">Work Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- table colmun  -->
                                        <?php 
                                        $colmun_id = 0;
                                        foreach ($db_works_result as  $work):
                                            $colmun_id++;
                                            ?>
                                            <tr>
                                            <th scope="row"><?=$colmun_id?></th>
                                            <td><?= $work["work_title"]?></td>
                                            <td><img src="./img/work-imges/<?= $work["work_image"]?>" width="100px" alt=""></td>
                                            <td title="<?=$work["work_description"]?>"><?= substr($work["work_description"],0,100)?></td>
                                            <td>
                                                <?php if($work["work_status"] == "active"){
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
                                                    <a href="./update-work.php?id=<?=$work["ID"] ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="./auth/delete/work-delete.php?id=<?= $work["ID"]?>" class="btn btn-sm btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                            <?php
                                        endforeach
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                 if(!$convert_array ==1){
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