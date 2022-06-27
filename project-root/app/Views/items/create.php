<form action="/items/create" method="post">
    <?= csrf_field() ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create New Item</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="name" placeholder="Item Name">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">QTY</label>
                                        </div>

                                        <select class="custom-select form-control" name="qty" id="inputGroupSelect01">
                                            <option selected value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect02">$</label>
                                        </div>
                                        <input type="text" placeholder="Cost" name="cost" id="inputGroupSelect02" class="form-control">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect02">$</label>
                                        </div>
                                        <input type="text" placeholder="Price" name="price" id="inputGroupSelect02" class="form-control">
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect04">Category</label>
                                            </div>
                                            <select class="custom-select form-control" name="category" id="inputGroupSelect04">
                                                <option selected value="#">Choose a Category</option>
                                                <?php foreach ($category as $cat) : ?>
                                                    <?php if (isset($cat['category']) && $cat['category'] != NULL) { ?>
                                                        <option value="<?php echo ($cat['category']) ?>"><?php echo ($cat['category']) ?></option>
                                                    <?php } ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect05">Color</label>
                                            </div>
                                            <select class="custom-select form-control" name="color" id="inputGroupSelect05">
                                                <option selected value="#">Choose a Color</option>
                                                <?php foreach ($colors as $c) : ?>
                                                    <?php if (isset($c['color']) && $c['color'] != NULL) { ?>
                                                        <option value="<?php echo ($c['color']) ?>"><?php echo ($c['color']) ?></option>
                                                    <?php } ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect04">Brand</label>
                                            </div>
                                            <select class="custom-select form-control" name="brand" id="inputGroupSelect04">
                                                <option selected value="#">Choose a Brand</option>
                                                <option value="2">Black</option>
                                                <option value="3">Red</option>
                                                <option value="2">Purple</option>
                                                <option value="3">5</option>
                                                <option value="2">6</option>
                                                <option value="3">7</option>
                                                <option value="2">8</option>
                                                <option value="3">9</option>
                                                <option value="3">10</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <input type="file" id="inputGroupSelet06" accept="image/*" />
                                        </div>
                                    </div>
                                </div>






                            </div>
                            <!--form floating-->
                        </div>
                        <!--card body-->
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