<?php
require_once('./includes/header.php');
require_once('./db_connect/db_connect.php');
$id = $_GET["id"];
// service select query  with id 
$db_testimonial_query = "SELECT * FROM testimonials  WHERE ID=$id;";
$db_testimonial_result = mysqli_query($db_connect, $db_testimonial_query);
$testimonial_query_convert_array = mysqli_fetch_assoc($db_testimonial_result); 
?>

<!-- section html tags  -->
<div class="app-content">
    <!-- succes message  -->
    <?php
        if(isset($_SESSION['success_message'])){?>
        <div class="d-flex justify-content-center">
            <div class="w-40 p-2 mb-2 d-flex justify-content-center align-items-center mx-auto rounded " style="background:green;" role="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="text-white " height="20px" width="20px" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-white text-center ml-10 my-0 p-10">
                    <?= $_SESSION['success_message']?>
                </p>
            </div>
        </div>
        <?php
        }
    unset($_SESSION['success_message']);
    ?>
     <!-- error message  -->
    <?php
        if(isset($_SESSION['testimonial_error']) || isset($_SESSION['testimonial_image_error'])){?>
        <div class="d-flex justify-content-center">
            <div class="w-40 p-2 mb-2 d-flex justify-content-center align-items-center mx-auto rounded " style="background:red;" role="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="20px" width="20px" class="text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                <p class="text-white text-center ml-10 my-0 p-10">
                    <?= isset($_SESSION['testimonial_error'])? $_SESSION['testimonial_error']: ""?>
                    <?= isset($_SESSION['testimonial_image_error'])? $_SESSION['testimonial_image_error']: ""?>
                </p>
            </div>
        </div>
        <?php
        }
    unset($_SESSION['testimonial_image_error']);
    unset($_SESSION['testimonial_error']);

    ?>
                           
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Update Testimonial</h5>
                        </div>
                        <div class="card-body">
                            <div class="example-container">
                                <form action="./auth/testimonial-data.php" method="post" enctype="multipart/form-data">
                                <input type="number" value="<?=$id ?>" name="testimonial_id" hidden >
                                    
                                <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Name</label>
                                        <input type="text" value="<?= $testimonial_query_convert_array["Name"]?$testimonial_query_convert_array["Name"]: "" ?>" name="testimonial_name" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Position</label><span id="showIconService"></span>
                                        <input value="<?= $testimonial_query_convert_array["Position"]?$testimonial_query_convert_array["Position"]: "" ?>"  id="iconValueService" type="text" name="testimonial_position" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Status</label>
                                        <select class="form-select" name="testimonial_status" aria-label="Default select example">
                                            <option
                                            
                                            <?= $testimonial_query_convert_array["Status"] === "active" ? "selected" : "" ?>
                                            
                                            value="active">Active</option>
                                            <option 
                                            <?= $testimonial_query_convert_array["Status"]=== "inactive"? "selected": ""?> 
                                            value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Message</label>
                                        <textarea class="form-control" name="testimonial_message"  id="floatingTextarea2" style="height: 100px">
                                        <?= $testimonial_query_convert_array["Message"]?$testimonial_query_convert_array["Message"]: "" ?>
                                        </textarea>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Upload Image</label>
                                        <input type="file" name="testimonial_image" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" name="update_testimonial" class="btn btn-primary m-3">Update Testimonial</button>
                                </form>
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
require_once('./includes/header.php');
?>

