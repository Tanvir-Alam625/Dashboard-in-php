
<?php
// require header 
require_once('./includes/header.php');
$email =$_SESSION['auth_email'];

// user name query
$db_user_query = "SELECT Name, ID, Phone, Address, Bio, Facebook, Linkedin, Instagram, Twitter, Image  FROM users WHERE Email='$email';";
$db_user = mysqli_query($db_connect, $db_user_query);
$db_user_result = mysqli_fetch_assoc($db_user);

?>
<!-- section html tags  -->
<div class="app-content">
    <!-- custom styles  -->
    <style>
    .info-btn,
    .security-btn{
        margin-right:10px;
        padding-top: 10px;
        padding-right: 10px;
        font-size: 20px;
        border: none;
        outline: none;
        background: transparent;
        color: grey;
    }
    .btn-active{
        color: #2269F5;
    }
    .disabled{
        display: none;
    }
    .active{
        display: block;
    }
    /*  file design  */
    .image-upload-container{
        margin:0px auto;
        padding: 0px 50px;
        display: flex;
        justify-content:center;

    }
    .img-container{
        height:134px;
        width:134px;
        border-radius:50%;
        background: lightgray;
        border:4px solid #709EF8;
        cursor: pointer;
        transition:300ms ease-in-out;
    }
    .img-container:hover img{
        display: none;
    }
    .img-containe .icon{
        display:none;
    }
    .img-containe:hover .img-containe .icon{
        display: block;
    }

    .img-container .profile-img{
        height:125px;
        width:125px;
        border-radius:50%;
        background: lightgray;
        position: relative;
        object-fit: cover;
    }
    .img-containe .icon img{
        border-radius: 50%;
        display:hidden;
    }


    </style>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description pb-0">
                        <h1>Profile</h1>
                        <div class="profile-tab mt-6 pb-2">
                            <button id="info-tab-btn" class="info-btn <?=isset($_SESSION["validation-error"])? ' ': 'btn-active'?>">Info</button>
                            <button id="security-tab-btn" class="security-btn <?=isset($_SESSION["validation-error"])? 'btn-active': ''?>">Security</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
                <div class="col-md-12">
                    <!-- info card container  -->
                    <div class="card  <?=isset($_SESSION["validation-error"])? 'disabled': 'active'?>" id="info-container">
                        <div class="card-header">
                            <h5 class="card-title">Info</h5>
                        </div>
                        <!-- <div class="image-upload-container ">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="file">
                                    <input type="file" id="file" name="profile_img" hidden>
                                    <label for="file">
                                        
                                        <div class="img-container">
                                        <img class="profile-img" src="./img/profile-img/<?= $db_user_result["Image"] ?>" class="avatar" alt="">
                                        <div class="icon">
                                        <img class="icon-img" width='100' height='100' src="./img/file-icon.png" alt="file-img">
                                        </div>
                                        </div>
                                    </label>
                                </div>
                               
                            </form>
                        </div> -->
                        <div class="card-body">
                            <div class="example-container">
                                <div class="example-content">
                                    <!-- start user information update form  -->
                                    <form action="./auth/profile-info-data.php" method="post" enctype="multipart/form-data">
                                       <input type="email" name="email" hidden value="<?= $email?>" id="">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $_SESSION["name_value"]?>"  aria-label="Username" name="name" aria-describedby="basic-addon1">
                                        <?php
                                            if(isset($_SESSION['name_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['name_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['name_error']);

                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" value="<?= isset($db_user_result["Phone"]) ? $db_user_result["Phone"]: '' ?>" name="phone" aria-label="Username" id="exampleFormControlInput2" aria-describedby="basic-addon1">
                                            <?php
                                            if(isset($_SESSION['phone_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['phone_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['phone_error']);
                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">Address Line</label>
                                            <input type="text" class="form-control" value="<?= isset($db_user_result["Address"]) ? $db_user_result["Address"]: '' ?>" name="address" aria-label="Username" id="exampleFormControlInput2" aria-describedby="basic-addon1">
                                            <?php
                                            if(isset($_SESSION['address_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['address_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['address_error']);
                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">Facebook Link</label>
                                            <input type="text" class="form-control" value="<?= isset($db_user_result["Facebook"]) ? $db_user_result["Facebook"]: '' ?>" name="facebook" aria-label="Username" id="exampleFormControlInput2" aria-describedby="basic-addon1">
                                            <?php
                                            if(isset($_SESSION['facebook_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['facebook_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['facebook_error']);
                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">Twitter Link</label>
                                            <input type="text" class="form-control" value="<?= isset($db_user_result["Twitter"]) ? $db_user_result["Twitter"]: '' ?>" name="twitter" aria-label="Username" id="exampleFormControlInput2" aria-describedby="basic-addon1">
                                            <?php
                                            if(isset($_SESSION['twitter_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['twitter_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['twitter_error']);
                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">Instagram Link</label>
                                            <input type="text" class="form-control" value="<?= isset($db_user_result["Instagram"]) ? $db_user_result["Instagram"]: '' ?>" name="instagram" aria-label="Username" id="exampleFormControlInput2" aria-describedby="basic-addon1">
                                            <?php
                                            if(isset($_SESSION['instagram_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['instagram_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['instagram_error']);
                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">Linkedin Link</label>
                                            <input type="text" class="form-control" value="<?= isset($db_user_result["Linkedin"]) ? $db_user_result["Linkedin"]: '' ?>" name="linkedin" aria-label="Username" id="exampleFormControlInput2" aria-describedby="basic-addon1">
                                            <?php
                                            if(isset($_SESSION['linkedin_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['linkedin_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['linkedin_error']);
                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">Your Bio</label>
                                            <textarea class="form-control" name="bio"  id="floatingTextarea2" style="height: 100px"><?= $db_user_result["Bio"]?></textarea>
                                            <?php
                                            if(isset($_SESSION['bio_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['bio_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['bio_error']);
                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" name="profile_pic" aria-label="Username" id="formFile" aria-describedby="basic-addon1">
                                        </div>
                                        <button class="btn btn-primary" name="update-info">Update Info</button>
                                    </form>
                                    <!-- end user information update form  -->
                                </div>             
                            </div>
                        </div>
                    </div>
                    <!-- security card container  -->
                    <div class="card <?=isset($_SESSION["validation-error"])? 'active': 'disabled'?>"  id="security-container">
                        <div class="card-header">
                            <h5 class="card-title">Security</h5>
                        </div>
                        <div class="card-body">
                            <div class="example-container">
                                <div class="example-content">
                                    <!-- start the security form -->
                                    <form action="./auth/profile-security-data.php" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">Current Password</label>
                                            <input type="password" class="form-control" name="current_password" aria-label="Username" id="exampleFormControlInput2" aria-describedby="basic-addon1">
                                            <?php
                                            if(isset($_SESSION['current_password_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['current_password_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['current_password_error']);

                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="new_password" aria-label="Username" id="exampleFormControlInput2" aria-describedby="basic-addon1">
                                            <?php
                                            if(isset($_SESSION['new_password_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['new_password_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['new_password_error']);

                                            ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password" aria-label="Username" id="exampleFormControlInput2" aria-describedby="basic-addon1">

                                            <?php
                                            if(isset($_SESSION['confirm_password_error'])){
                                                ?>
                                                <p class="text-danger"><?= $_SESSION['confirm_password_error']?></p>
                                                <?php
                                            }
                                            unset($_SESSION['confirm_password_error']);

                                            ?>
                                        </div>
                                        <button value="change-password" class="btn btn-primary" name="change-password">Change Password</button>
                                    </form>
                                    <!-- end the security form -->

                                </div>             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- tab script tag  -->
<script>
    // selectors
    const infoBtn = document.getElementById("info-tab-btn");
    const securityBtn = document.getElementById("security-tab-btn");
    const infoContent = document.getElementById("info-container");
    const securityContent = document.getElementById("security-container");
    // info event listener
    infoBtn.addEventListener('click',()=>{
        // security class 
        securityContent.classList.remove("active");
        securityContent.classList.add("disabled");
        //info class
        infoContent.classList.add("active");
        infoContent.classList.remove("disabled");
        // btn class 
        infoBtn.classList.add("btn-active");
        securityBtn.classList.remove("btn-active");
    })
    // security event listener
    securityBtn.addEventListener('click',()=>{
        // security class
        securityContent.classList.add("active");
        securityContent.classList.remove("disabled");
        // info class
        infoContent.classList.add("disabled");
        infoContent.classList.remove("active");
        //btn class
        infoBtn.classList.remove("btn-active");
        securityBtn.classList.add("btn-active");
    })
</script>
</div>
<!-- require footer  -->
<?php
    require_once('./includes/footer.php');
?>