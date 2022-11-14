<?php
require_once('./includes/header.php');
// message insert query 
$db_messages_query = "SELECT * FROM messages ;";
$db_messages_result = mysqli_query($db_connect, $db_messages_query);
$convert_array = mysqli_fetch_assoc($db_messages_result);
?>
<div class="app-content">
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">List of Client Message</h5>
                        </div>
                        <div class="card-body">
                        <div class="example-container">
                            <div class="example-content">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- table colmun  -->
                                        <?php 
                                        $colmun_id = 0;
                                        foreach ($db_messages_result as  $message):
                                            $colmun_id++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?=$colmun_id?></th>
                                                <td><?= $message["Name"]?></td>
                                                <td><?= $message["Email"]?></td>
                                                <td title="<?= $message["Message"]?>"><?=substr( $message["Message"],0,60)?></td>
                                                <td>
                                                    <div>
                                                        <a href="mailto:<?=$message["Email"]?>" target="_blank" class="btn btn-sm btn-primary">Reply</a>
                                                        <a href="./auth/delete/client-message-delete.php?id=<?= $message["ID"]?>" class="btn btn-sm btn-danger">Delete</a>
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