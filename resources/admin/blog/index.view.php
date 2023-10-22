<?php
require_once(realpath(dirname(__FILE__) . '/../include/header.view.php'));
?>

    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Blog Table</h6>
                        <hr/>

                        <table class="table table-hover table-striped table-bordered col-xl-12" >
                            <thead>
                            <tr>
                                <th>sl</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $i=1;
                            foreach($blogs as $blog){
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $blog['title']?></td>
                                    <td><?php echo $blog['slug']?></td>
                                    <td ><?php echo  substr($blog['description'],0,70)."...."?></td>
                                    <td><?php echo $blog['category_name']?></td>
                                    <td><img src="<?php echo $blog['image'] ?>" style="height: 100px;width: 100px"></td>
                                    <td><?php echo $blog['author_name'] ?></td>
                                    <td><?php echo $blog['created_at'] ?></td>
                                    <td><?php echo ($blog['status'] == 1) ? "Active" : "Inactive"; ?></td>
                                    <td>
                                        <a href="<?php route("dashboard&blog=update&id={$blog['blog_id']}"); ?>" class="btn btn-primary btn-sm float-start m-1">Edit</a>
                                        <?php if($blog['status']==1){ ?>
                                            <a href="" class="btn btn-warning btn-sm float-start m-1">Inactive</a>
                                        <?php }
                                        else{ ?>
                                            <a href="" class="btn btn-success btn-sm float-start m-1">Active</a>
                                        <?php } ?>

                                        <form action="<?php route("dashboard&blog") ?>" method="post">
                                            <input type="hidden" value="<?php echo $blog['blog_id'] ?>" name="id">
                                            <button type="submit" class="btn btn-danger btn-sm float-start m-1" name="blog" value="delete"
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