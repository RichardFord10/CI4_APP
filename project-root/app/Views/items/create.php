<form action="/items/create" method="post">
    <?= csrf_field() ?>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Create New Item</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" id="name" placeholder="" />
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                <input class="form-control" name="title" id="title" placeholder="" />
                                <label for="title">Title</label>
                                </div>
                            </div>
                                <button class="btn btn-primary mx-auto d-block" type="submit">Submit</a>
                        </div>
                        <div class="card-footer text-center py-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
</form>