<?php
require_once('./includes/header.php');
// portfolio insert query 
$db_portfolio_query = "SELECT * FROM portfolios ;";
$db_portfolio_result = mysqli_query($db_connect, $db_portfolio_query);
$convert_array = mysqli_fetch_assoc($db_portfolio_result);
?>
<!-- section html tags  -->
<div class="app-content">
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">List of Portfolio</h5>
                        </div>
                        <div class="card-body">
                            
                        <div class="example-container">
                            <div class="example-content">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Portfolio Title</th>
                                            <th scope="col">Portfolio Icon</th>
                                            <th scope="col">Portfolio Count</th>
                                            <th scope="col">Portfolio Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- table column  -->
                                    <?php
                                        $colmun_id = 0;
                                        foreach ($db_portfolio_result as  $portfolio):
                                            $colmun_id++;
                                            ?>
                                            <tr>
                                            <th scope="row"><?=$colmun_id?></th>
                                            <td><?= $portfolio["portfolio_title"]?></td>
                                            <td><i class="<?= $portfolio["portfolio_icon"]?>"></i></td>
                                            <td><?= $portfolio["portfolio_count"]?></td>
                                            <td>
                                                <?php if($portfolio["portfolio_status"] == "active"){
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
                                                    <a href="./update-portfolio.php?id=<?=$portfolio['ID']?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a  href="./auth/delete/portfolio-delete.php?id=<?= $portfolio["ID"]?>" class="btn btn-sm btn-danger">Delete</a>
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
                                 if(!$convert_array == 1){
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