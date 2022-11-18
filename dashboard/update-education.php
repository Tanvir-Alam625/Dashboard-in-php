<?php
require_once('./includes/header.php');
session_start();
$education_id = $_GET["id"];
// education select query  with id 
$db_education_query = "SELECT * FROM educations  WHERE ID=$education_id;";
$db_education_result = mysqli_query($db_connect, $db_education_query);
$education_query_convert_array = mysqli_fetch_assoc($db_education_result); 
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
        if(isset($_SESSION['education_error'])){?>
        <div class="d-flex justify-content-center">
            <div class="w-40 p-2 mb-2 d-flex justify-content-center align-items-center mx-auto rounded " style="background:red;" role="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="20px" width="20px" class="text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                <p class="text-white text-center ml-10 my-0 p-10">
                    <?= $_SESSION['education_error']?>
                </p>
            </div>
        </div>
        <?php
        }
    unset($_SESSION['education_error']);
    ?>
                           
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Add Education</h5>
                        </div>
                        <div class="card-body">
                            <div class="example-container">
                                <form action="./auth/education-data.php" method="post">
                                    <input type="number" hidden value="<?=$education_id?>" name="education_id">
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Education name</label>
                                        <input type="text" value="<?= $education_query_convert_array["Name"]?>" name="education_name" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Education year</label>
                                        <input type="number" value="<?= $education_query_convert_array["Year"]?>" required name="education_year" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Education credit value</label>
                                        <input type="number" value="<?= $education_query_convert_array["Credit"]?>" required name="education_credit" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Brand Status</label>
                                        <select class="form-select" name="education_status" aria-label="Default select example">
                                            <option
                                            
                                            <?= $education_query_convert_array["Status"] === "active" ? "selected" : "" ?>
                                            
                                            value="active">Active</option>
                                            <option 
                                            <?= $education_query_convert_array["Status"]=== "inactive"? "selected": ""?> 
                                            value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="update_education" class="btn btn-primary m-3">Update Education</button>
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