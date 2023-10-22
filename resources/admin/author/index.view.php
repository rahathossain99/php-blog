<?php
require_once(realpath(dirname(__FILE__) . '/../include/header.view.php'));
?>

<div class="row">
    <div class="col-xl-8 mx-auto">

        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">author Table</h6>
                    <hr/>

                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>sl</th>
                            <th>Author Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $i=1;
                        foreach($authors as $author){
                            ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $author['author_name'] ?></td>
                                <td><img src="<?php echo $author['author_image'] ?>" style="height: 100px;width: 100px"></td>
                                <td>
                                    <a href="<?php echo route("dashboard&author=update&id={$author['id']}") ?>" class="btn btn-primary btn-sm float-start m-1">Edit</a>

                                    <form action="<?php route("dashboard&author") ?>" method="post">
                                        <input type="hidden" value="<?php echo $author['id'] ?>" name="id">
                                        <button type="submit" class="btn btn-danger btn-sm float-start m-1" name="author" value="delete"
                                                onclick="return confirm('Are you DELETE this!!')">Delete</button>
                                    </form>
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
