<?php
require_once('./includes/header.php');
$db_services_query = "SELECT * FROM services ;";
$db_services_result = mysqli_query($db_connect, $db_services_query);
$convert_array = mysqli_fetch_assoc($db_services_result);


?>

<div class="app-content">
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">List of Service</h5>
                        </div>
                        <div class="card-body">
                            
                        <div class="example-container">
                            <div class="example-content">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Service Title</th>
                                            <th scope="col">Service Icon</th>
                                            <th scope="col">Service Description</th>
                                            <th scope="col">Service Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    
                                        <?php 
                                        $colmun_id = 0;
                                        foreach ($db_services_result as  $service):
                                            $colmun_id++;
                                            ?>
                                            <tr>
                                            <th scope="row"><?=$colmun_id?></th>
                                            <td><?= $service["service_title"]?></td>
                                            <td><?= $service["service_icon"]?></td>
                                            <td><?= $service["service_description"]?></td>
                                            <td>
                                                <?php if($service["service_status"] == "active"){
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
                                                <div class="">
                                                    <button class="btn btn-sm btn-primary">Edit</button>
                                                    <button  class="btn btn-sm btn-danger">Delete</button>
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