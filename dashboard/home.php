
<?php
//  require header 
require_once('./includes/header.php');
$email =$_SESSION['auth_email'];

// user name query
$db_name_query = "SELECT Name, ID, Image FROM users WHERE Email='$email';";
$db_name = mysqli_query($db_connect, $db_name_query);
$db_name_result = mysqli_fetch_assoc($db_name);
$_SESSION["auth_id"]= $db_name_result['ID'];
$_SESSION["profile_image"]= $db_name_result['Image'];
$_SESSION["name_value"]= $db_name_result['Name'];
// count all users query 
$db_users_count_query = "SELECT COUNT(*) AS 'result' FROM users";
$db_users_count = mysqli_query($db_connect, $db_users_count_query);
$db_users_count_result = mysqli_fetch_assoc($db_users_count);

// show all users query 
$db_users_query = "SELECT Name,ID,Email FROM users LIMIT 15";
$db_users = mysqli_query($db_connect, $db_users_query);
?>
<!-- section html tags  -->
<div class="app-content">
    <!-- custom style tags  -->
    <style>
        .overflow-custome-class{
            height:345px;
            overflow-y:scroll;
        }
        .overflow-custome-class::-webkit-scrollbar{
        width: 10px;
        }
        .overflow-custome-class::-webkit-scrollbar-track{
        height: 100%;
        }
        .overflow-custome-class::-webkit-scrollbar-thumb{
        background-color: #E7ECF8;
        border-radius:20px;
        transition: 400ms ease-in-out;
        }
        .overflow-custome-class::-webkit-scrollbar-thumb:hover{
        background-color: #DCD9CA;
        }
    </style>

    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Dashboard</h1>
                        <?php 
                        ?>
                        <p class="user-state-info"> Hello, <?= $db_name_result['Name']?> < <?= $_SESSION['auth_email']?> ></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-primary">
                                    <i class="material-icons-outlined">paid</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Today's Sales</span>
                                    <span class="widget-stats-amount">$38,211</span>
                                    <span class="widget-stats-info">471 Orders Total</span>
                                </div>
                                <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                                    <i class="material-icons">keyboard_arrow_down</i> 4%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-warning">
                                    <i class="material-icons-outlined">person</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Active Users</span>
                                    <span class="widget-stats-amount">23,491</span>
                                    <span class="widget-stats-info">790 unique this month</span>
                                </div>
                                <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                    <i class="material-icons">keyboard_arrow_up</i> 12%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-danger">
                                    <i class="material-icons-outlined">file_download</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Downloads</span>
                                    <span class="widget-stats-amount">140,390</span>
                                    <span class="widget-stats-info">87 items downloaded</span>
                                </div>
                                <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                    <i class="material-icons">keyboard_arrow_up</i> 7%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card widget widget-list">
                        <div class="card-header">
                            <h5 class="card-title">Active Users<span class="badge badge-success badge-style-light"><?= $db_users_count_result['result']?> Users</span></h5>
                        </div>
                        <div class="card-body">
                            <span class="text-muted m-b-xs d-block">showing 15 out of <?= $db_users_count_result['result']?> active users.</span>
                            <ul class="widget-list-content list-unstyled overflow-custome-class" >
                                <!-- show users  -->
                                <?php
                                $user_id = 0; 
                                foreach ($db_users as  $user) {
                                    $user_id++; 
                                    ?>
                                    <li class="widget-list-item widget-list-item-green">
                                    <span class="widget-list-item-icon"><p class="my-2 py-0"><?=$user_id ?></p></span>
                                    <span class="widget-list-item-description">
                                        <a href="#" class="widget-list-item-description-title">
                                            <?= $user['Name'] ?>
                                        </a>
                                        <span class="widget-list-item-description-subtitle">
                                            <?= $user["Email"]?>
                                        </span>
                                    </span>
                                </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card widget widget-list">
                        <div class="card-header">
                            <h5 class="card-title">Todo<span class="badge badge-success badge-style-light">14 completed</span></h5>
                        </div>
                        <div class="card-body">
                            <span class="text-muted m-b-xs d-block">showing 5 out of 23 active tasks.</span>
                            <ul class="widget-list-content list-unstyled">
                                <li class="widget-list-item widget-list-item-green">
                                    <span class="widget-list-item-check">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="">
                                        </div>
                                    </span>
                                    <span class="widget-list-item-description">
                                        <a href="#" class="widget-list-item-description-title">
                                            Dashboard UI optimisations
                                        </a>
                                        <span class="widget-list-item-description-subtitle">
                                            Oskar Hudson
                                        </span>
                                    </span>
                                </li>
                                <li class="widget-list-item widget-list-item-blue">
                                    <span class="widget-list-item-check">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                        </div>
                                    </span>
                                    <span class="widget-list-item-description">
                                        <a href="#" class="widget-list-item-description-title">
                                            Mailbox cleanup
                                        </a>
                                        <span class="widget-list-item-description-subtitle">
                                            Woodrow Hawkins
                                        </span>
                                    </span>
                                </li>
                                <li class="widget-list-item widget-list-item-purple">
                                    <span class="widget-list-item-check">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                        </div>
                                    </span>
                                    <span class="widget-list-item-description">
                                        <a href="#" class="widget-list-item-description-title">
                                            Header scroll bugfix
                                        </a>
                                        <span class="widget-list-item-description-subtitle">
                                            Sky Meyers
                                        </span>
                                    </span>
                                </li>
                                <li class="widget-list-item widget-list-item-yellow">
                                    <span class="widget-list-item-check">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="">
                                        </div>
                                    </span>
                                    <span class="widget-list-item-description">
                                        <a href="#" class="widget-list-item-description-title">
                                            Localization for file manager
                                        </a>
                                        <span class="widget-list-item-description-subtitle">
                                            Oskar Hudson
                                        </span>
                                    </span>
                                </li>
                                <li class="widget-list-item widget-list-item-red">
                                    <span class="widget-list-item-check">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                        </div>
                                    </span>
                                    <span class="widget-list-item-description">
                                        <a href="#" class="widget-list-item-description-title">
                                            New E-commerce UX/UI design
                                        </a>
                                        <span class="widget-list-item-description-subtitle">
                                            Oskar Hudson
                                        </span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- require foooter  -->
<?php
    require_once('./includes/footer.php');
?>