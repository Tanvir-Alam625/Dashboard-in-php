<?php
    require_once('./db_connect/db_connect.php');
    session_start();
    // secure routes 
    if(!isset($_SESSION['auth_email'])){
        header('location: oops/oops.php');
    }
    // email db query 
    $email = $_SESSION['auth_email'];
    $profile_query = "SELECT Name, Image FROM users WHERE Email='$email'";
    $profile_db = mysqli_query($db_connect, $profile_query);
    $profile_query_result = mysqli_fetch_assoc($profile_db);
    // active page
    $file_path = $_SERVER["PHP_SELF"];
    $file_path_convert = explode("/", $file_path);
    $page_name = end($file_path_convert);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="./assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="./assets/css/main.min.css" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">
    <!-- font awesome icons link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="./home.php" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        <img src="./img/profile-img/<?= $profile_query_result["Image"]?>">
                        <span class="activity-indicator"></span>
                        <span class="user-info-text"><?= $profile_query_result["Name"]?><br><span class="user-state-info">On a call</span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu "
                
                style="overflow-y: scroll; height:600px;"
                >
                    <li class="sidebar-title">
                        Apps
                    </li>
                    <li class="<?= $page_name == 'home.php' ? 'active-page': '' ?>">
                        <a href="./home.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li class="<?= $page_name == 'profile.php' ? 'active-page': '' ?>">
                        <a href="./profile.php" class="active"><i class="material-icons-two-tone">face</i>Profile</a>
                    </li>
                    <li class="<?= $page_name == 'client-message.php' ? 'active-page': '' ?>">
                        <a href="./client-message.php" class="active"><i class="material-icons-two-tone">message</i>Client Message</a>
                    </li>
                    <li 
                        <?php
                        if($page_name == 'add-testimonial.php' || $page_name == 'testimonial-list.php'):
                            ?>
                            class="active-page"
                            <?php
                            endif
                        ?> >
                        <a href="add-testimonial.php"><i class="material-icons-two-tone">add_reaction</i>Testimonial<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= $page_name == 'add-testimonial.php' ? 'active': '' ?>" href="./add-testimonial.php">Add Testimonial</a>
                            </li>
                            <li>
                                <a class="<?= $page_name == 'testimonial-list.php' ? 'active': '' ?>" href="./testimonial-list.php">Testimonial List</a>
                            </li>
                        </ul>
                    </li>
                    <li 
                        <?php
                        if($page_name == 'add-portfolio.php' || $page_name == 'portfolio-list.php'):
                            ?>
                            class="active-page"
                            <?php
                            endif
                        ?> >
                        <a href="add-portfolio.php"><i class="material-icons-two-tone">manage_accounts</i>Portfolio<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= $page_name == 'add-portfolio.php' ? 'active': '' ?>" href="./add-portfolio.php">Add Portfolio</a>
                            </li>
                            <li>
                                <a class="<?= $page_name == 'portfolio-list.php' ? 'active': '' ?>" href="./portfolio-list.php">Portfolio List</a>
                            </li>
                        </ul>
                    </li>
                    <li 
                        <?php
                        if($page_name == 'add-brand.php' || $page_name == 'brand-list.php'):
                            ?>
                            class="active-page"
                            <?php
                            endif
                        ?> >
                        <a href="add-portfolio.php"><i class="material-icons-two-tone">branding_watermark</i>Brand<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= $page_name == 'add-brand.php' ? 'active': '' ?>" href="./add-brand.php">Add Brand</a>
                            </li>
                            <li>
                                <a class="<?= $page_name == 'brand-list.php' ? 'active': '' ?>" href="./brand-list.php">Brand List</a>
                            </li>
                        </ul>
                    </li>
                    <li 
                        <?php
                        if($page_name == 'add-work.php' || $page_name == 'work-list.php'):
                            ?>
                            class="active-page"
                            <?php
                            endif
                        ?> >
                        <a href="add-work.php"><i class="material-icons-two-tone">work</i>Best Work<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= $page_name == 'add-work.php' ? 'active': '' ?>" href="./add-work.php" >Add Work</a>
                            </li>
                            <li>
                                <a class="<?= $page_name == 'work-list.php' ? 'active': '' ?>" href="./work-list.php">Work List</a>
                            </li>
                        </ul>
                    </li>
                    <li 
                        <?php
                        if($page_name == 'add-education.php' || $page_name == 'education-list.php'):
                            ?>
                            class="active-page"
                            <?php
                            endif
                        ?> >
                        <a href="add-education.php"><i class="material-icons-two-tone">school</i>Education<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= $page_name == 'add-education.php' ? 'active': '' ?>" href="./add-education.php" >Add Education</a>
                            </li>
                            <li>
                                <a class="<?= $page_name == 'education-list.php' ? 'active': '' ?>" href="./education-list.php">Education List</a>
                            </li>
                        </ul>
                    </li>
                    <li 
                        <?php
                        if($page_name == 'add-service.php' || $page_name == 'service-list.php'):
                            ?>
                            class="active-page"
                            <?php
                            endif
                        ?> >
                        <a href="add-work.php"><i class="material-icons-two-tone">manage_accounts</i>Service<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= $page_name == 'add-service.php' ? 'active': '' ?>" href="./add-service.php" >Add Service</a>
                            </li>
                            <li>
                                <a class="<?= $page_name == 'service-list.php' ? 'active': '' ?>" href="./service-list.php">Service List</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons">add</i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                        <li><a class="dropdown-item" href="#">New Workspace</a></li>
                                        <li><a class="dropdown-item" href="#">New Board</a></li>
                                        <li><a class="dropdown-item" href="#">Create Project</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons-outlined">explore</i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                                        <li>
                                            <h6 class="dropdown-header">Repositories</h6>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune iOS
                                                    <span class="badge badge-warning">1.0.2</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune Android
                                                    <span class="badge badge-info">dev</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-btn-item d-grid">
                                            <button class="btn btn-primary">Create new repository</button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
            
                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">
                                    <a class=" nav-link rounded text-white" style="background:#709EF9; color:#FF4857;" target="_blank" href="../index.php">Visit Now</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class=" nav-link rounded" style="background:#FCE3E5; color:#FF4857;" href="./auth/signout.php">SignOut</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>