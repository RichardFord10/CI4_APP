<form action="" method="get">
    <?= csrf_field() ?>
   
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Edit Post</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <label for="title"></label>
                                <input class="form-control" name="title" id="title" value="<?php echo($blog['title']);?>"/>
                            </div>
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <textarea class="form-control rounded-0" name="body" id="body" value=""rows="10"><?php echo($blog['body']);?></textarea>
                                </div>
                            </div>
                            <sup>Author: <?= session('user_name') ?></sup>
                                <button class="btn btn-primary mx-auto d-block" type="submit" name="submit">Submit</a>
                        </div>
                        <div class="card-footer text-center py-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>