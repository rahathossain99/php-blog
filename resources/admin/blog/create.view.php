<!<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="<?php asset("front-end-assets") ?>/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="row my-3">
    <div class="col-xl-8 mx-auto">

        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">Blog Form</h6>
                    <hr/>
                    <form action="<?php route("dashboard&blog=store") ?>" method="post" enctype="multipart/form-data" class="row g-3">

                        <div class="col-12">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Category</label>
                            <select name="category_id" id="" class="form-control">
                                <option >select category</option>
                                <?php
                                foreach($categories as $category){
                                ?>
                                <option value="<?php echo $category['id'] ?>" ><?php echo $category["category_name"] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" style="height: 300px;width: 900px;"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Author</label>
                            <select name="author_id" id="" class="form-control">
                                <option >select author</option>
                                <?php
                                foreach($authors as $author){
                                    ?>
                                    <option value="<?php echo $author['id'] ?>" ><?php echo $author["author_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Image</label>
                            <input type="file" name="blog_image" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Time</label>
                            <input type="datetime-local" name="created_at" class="form-control">
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" value="store" name="blog">Save Info</button>
                            </div>
                        </div>
                        <input type="hidden" value="<?php rand() ?>" name="csrf">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


