<?php
require_once(realpath(dirname(__FILE__) . '/../include/header.view.php'));
?>

<div class="row">
    <div class="col-xl-8 mx-auto">

        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">Category Table</h6>
                    <hr/>

                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>sl</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i=1;
                            foreach($categories as $category){
                            ?>
                            <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $category['category_name'] ?></td>
                            <td><?php echo ($category['status'] == 1) ? "Active" : "Inactive"; ?></td>
                             <td>
                                <a href="<?php echo route("dashboard&category=update&id={$category['id']}") ?>" class="btn btn-primary btn-sm float-start m-1">Edit</a>

                                <?php if($category['status']==1){ ?>
                                    <a href="" class="btn btn-warning btn-sm float-start m-1">Inactive</a>
                                <?php }
                                else{ ?>
                                    <a href="" class="btn btn-success btn-sm float-start m-1">Active</a>
                                <?php } ?>

                                <form action="<?php route("dashboard&category") ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $category['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm float-start m-1" name="category" value="delete"
                                            onclick="return confirm('Are you DELETE this!!')">Delete</button>
                                </form>

                                <a href="" ></a>
                            </td>
                        </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once(realpath(dirname(__FILE__) . '/../include/footer.view.php'));
?>