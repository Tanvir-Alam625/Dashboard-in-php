<?php
require_once('./includes/header.php');
// testimonila insert query 
$db_testimonials_query = "SELECT * FROM testimonials ;";
$db_testimonials_result = mysqli_query($db_connect, $db_testimonials_query);
$convert_array = mysqli_fetch_assoc($db_testimonials_result);
?>
<!-- section html tags  -->
<div class="app-content">
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">List of Testimonial</h5>
                        </div>
                        <div class="card-body">
                        <div class="example-container">
                            <div class="example-content">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Testimonial Name</th>
                                            <th scope="col">Testimonial Image</th>
                                            <th scope="col">Testimonial Message</th>
                                            <th scope="col">Testimonial Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- table colmun  -->
                                        <?php 
                                        $colmun_id = 0;
                                        foreach ($db_testimonials_result as  $testimonial):
                                            $colmun_id++;
                                            ?>
                                            <tr>
                                            <th scope="row"><?=$colmun_id?></th>
                                            <td><?= $testimonial["Name"]?></td>
                                            <td><img src="./img/testimonial-img/<?= $testimonial["Image"]?>" width="100px" alt=""></td>
                                            <td title="<?=$testimonial["Message"]?>"><?= substr($testimonial["Message"],0,100)?></td>
                                            <td>
                                                <?php if($testimonial["Status"] == "active"){
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
                                                    <a href="./update-testimonial.php?id=<?=$testimonial["ID"] ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="./auth/delete/testimonial-delete.php?id=<?= $testimonial["ID"]?>" class="btn btn-sm btn-danger">Delete</a>
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
<!-- require footer  -->
<?php
require_once('./includes/footer.php');
?>