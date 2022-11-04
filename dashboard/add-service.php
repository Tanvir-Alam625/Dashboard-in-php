<?php
require_once('./includes/header.php');
?>
<div class="app-content">
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Add Service</h5>
                        </div>
                        <div class="card-body">
                            <div class="example-container">
                                <form action="" method="post">
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Service Title</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Service Icon</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Service Status</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Service Description</label>
                                        <textarea class="form-control"  id="floatingTextarea2" style="height: 100px"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary m-3">Add Service</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
require_once('./includes/header.php');
?>