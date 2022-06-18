<form action="/blog/edit/?id=<?php echo($_GET['id'])?>" method="post">
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
                        <label for="title">Title</label> 
                            <div class="form-floating mb-3">
                               
                                <input class="form-control" name="title" id="title" placeholder="" value="<?php echo($blog['title'])?>" />
                            </div> 
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                <label for="body">Body</label> 
                                    <textarea class="form-control rounded-0" name="body" id="body" rows="10" value=""><?php echo($blog['body']);?></textarea>
                                </div>
                                   
                            </div>
                            <sup>Author: <?= session('user_name') ?></sup>
                                <button class="btn btn-primary mx-auto d-block" type="submit">Submit</a>
                            </div>

                        <div class="card-footer text-center py-3"><form action="edit/delete/?id=<?php echo($_GET['id'])?>" method="get"><button class="btn btn-danger" name="delete" type="Delete"><i class="fa fa-trash" aria-hidden="true"></i></form>
</a>
</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
</form>