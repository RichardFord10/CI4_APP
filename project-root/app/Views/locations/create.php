<form action="/locations/create" method="post">
    <?= csrf_field() ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create New Location</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                                <span class="text-center">
                                    <h5>Locations</h5>
                                </span>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Row</label>
                                            </div>
                                            <select class="custom-select form-control" name="row" id="inputGroupSelect04">
                                                <?php foreach ($row as $c) : ?>
                                                    <?php if (isset($c['row']) && $c['row'] != NULL) { ?>
                                                        <option value="<?php echo ($c['row']) ?>"><?php echo ($c['row']) ?></option>
                                                    <?php } ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect02">Shelf</label>
                                            </div>
                                            <input type="text" placeholder="Shelf" name="shelf" id="inputGroupSelect02" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect02">Slot</label>
                                            </div>
                                            <input type="text" placeholder="Slot" name="slot" id="inputGroupSelect02" class="form-control">
                                        </div>
                                    </div>

                                    <hr>

                                </div>
                                <!--form floating-->
                            </div>
                            <!--card body-->
                        </div>
                        <button class="btn btn-primary mx-auto d- mb-2" type="submit">Submit</a>
                    </div>
                    <div class="card-footer text-center py-3"></div>
                </div>
            </div>
        </div>
    </div>
    </main>
    </div>
</form>