<?php
require_once('./includes/header.php');
require_once("./Icon/Icon.php");
session_start();
$id = $_GET["id"];
// service select query  with id 
$db_service_query = "SELECT * FROM services  WHERE ID=$id;";
$db_service_result = mysqli_query($db_connect, $db_service_query);
$service_query_convert_array = mysqli_fetch_assoc($db_service_result); 

?>

<!-- section html tags  -->
<div class="app-content">
    <!-- success message  -->
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
        if(isset($_SESSION['service_error'])){?>
        <div class="d-flex justify-content-center">
            <div class="w-40 p-2 mb-2 d-flex justify-content-center align-items-center mx-auto rounded " style="background:red;" role="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="20px" width="20px" class="text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                <p class="text-white text-center ml-10 my-0 p-10">
                    <?= $_SESSION['service_error']?>
                </p>
            </div>
        </div>
        <?php
        }
    unset($_SESSION['service_error']);
    ?>
                           
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Update Service</h5>
                        </div>
                        <div class="card-body">
                            <div class="example-container">
                                <form action="./auth/service-data.php" method="post">
                                    <input type="number" value="<?=$id ?>" name="service_id" hidden >
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Service Title</label>
                                        <input type="text" value="<?=$service_query_convert_array["service_title"]?>" name="service_title" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Service Icon</label><span class="ml-3" id="showIconService"><i class="<?=$service_query_convert_array["service_icon"]?>"></i></span>
                                        <input  id="iconValueService" value="<?=$service_query_convert_array["service_icon"]?>" type="text" name="service_icon" class="form-control" readonly  aria-describedby="emailHelp">
                                    </div>
                                    <div class="p-3" style="overflow-y: scroll; height: 150px;">
                                    <?php
                                    foreach ($fonts as  $font):
                                        ?>
                                        <span class="rounded bg-primary m-2 fontsIconService" id="<?= $font?>" style="cursor:pointer;">
                                        <i class=" fs-5 p-2 <?= $font ?>" ></i></span>
                                        <?php
                                    endforeach
                                    ?>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Service Status</label>
                                        <select class="form-select" name="service_status" aria-label="Default select example">
                                            <option 
                                            <?= $service_query_convert_array["service_status"] === "active" ? "selected" : "" ?>
                                            value="active">Active</option>
                                            <option
                                            <?= $service_query_convert_array["service_status"] === "inactive" ? "selected" : "" ?>
                                            value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Service Description</label>
                                        <textarea class="form-control" name="service_description"  id="floatingTextarea2" style="height: 100px">
                                        <?= $service_query_convert_array["service_description"] ?>
                                        </textarea>
                                    </div>
                                    <button type="submit" name="update_service" class="btn btn-primary m-3">Update Service</button>
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
<!-- icon JS logic  -->
<script>
    const fonts = document.querySelectorAll(".fontsIconService");
    const iconValue= document.getElementById("iconValueService");
    const showIcon = document.getElementById("showIconService");
    fonts.forEach(font => {
        font.addEventListener('click',()=>{
            iconValue.value = font.attributes.id.nodeValue;
            showIcon.innerHTML = `<i class=" fs-5 p-2 ${font.attributes.id.nodeValue}" ></i>`;
        })     
    });
</script>