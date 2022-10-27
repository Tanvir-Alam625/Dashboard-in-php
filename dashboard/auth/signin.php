<?php
require_once('../includes/header.php');
session_start();
?>

<div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
    <div class="app-auth-background"></div>
    <form action="./signin-data.php" method="post">
        <div class="app-auth-container">
            <div class="logo">
            <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="signup.php">Sign Up</a></p>
            <!-- signin error message  -->
            <?php
            if(isset($_SESSION['signin_error'])){?>
            <div class="d-flex justify-content-center">
                <div class="w-50 p-2 d-flex justify-content-center align-items-center mx-auto rounded border border-danger " style="background:#f3011436;" role="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="20px" width="20px" class="text-danger ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <p class="text-danger text-center ml-10 my-0 p-0"><?=$_SESSION['signin_error']?></p>
                </div>
            </div>
            <?php
            }
            session_unset();
            ?>
            <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">Email address</label>
                <input name="email" type="email"
                class="form-control <?=isset($_SESSION['signin_email_error']) ? 'is-invalid': ''?>" 
                 id="signInEmail" aria-describedby="signInEmail" placeholder="example@neptune.com">
                <!-- email error Message  -->
                <?php
                if(isset($_SESSION['signin_email_error'])){
                    ?>
                    <p class="text-danger"><?= $_SESSION['signin_email_error']?></p>
                    <?php
                }
                unset($_SESSION['signin_email_error']);
                ?>
                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" name="password" 
                class="form-control  <?=isset($_SESSION['signin_password_error']) ? 'is-invalid': ''?>"
                id="signInPassword" aria-describedby="signInPassword" >
                <!-- email error Message  -->
                <?php
                if(isset($_SESSION['signin_password_error'])){
                    ?>
                    <p class="text-danger"><?= $_SESSION['signin_password_error']?></p>
                    <?php
                }
                session_unset();
                ?>
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Sign In</button>
            </div>
        </div>        
    </form>
</div>
<?php
require_once('../includes/footer.php');
?>


