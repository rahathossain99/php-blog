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
                    <h6 class="mb-0 text-uppercase">Author Form</h6>
                    <hr/>
                    <form action="<?php route("dashboard&author=update") ?>" method="post"  enctype="multipart/form-data" class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Author</label>
                            <input type="text" value="<?php echo $author['author_name'] ?>" name="author_name" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Author</label>
                            <input type="file"  name="author_image" class="form-control">
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" value="update" name="author">Save Info</button>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $author['id'] ?>" name="id">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


