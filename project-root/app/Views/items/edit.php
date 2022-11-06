<form action="/items/edit?id=<?php echo($_GET['id']);?>" method="post">
<?= csrf_field() ?>
    <div class="container">
        <br><a href="/items"><i class="fas fa-chevron-left"></i> Back</a>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Edit Item ID: <?php echo($item['id']);?></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <div class="row">
                                <div class="col">
                                    <input type="text" placeholder="<?php echo ($item['name']);?>" class="form-control" name="name" value=""/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">QTY</label>
                                        </div>
                                        <input type="text" value="" name="qty" placeholder="<?php echo($item['qty']);?>" id="inputGroupSelect02" class="form-control"/>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect02">$</label>
                                        </div>
                                        <input type="text" value="" name="cost" placeholder="<?php echo($item['cost']/100);?>" id="inputGroupSelect02" class="form-control"/>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect02">$</label>
                                        </div>
                                        <input type="text" value="" name="price" value="" placeholder="<?php echo($item['price']/100);?>" id="inputGroupSelect02" class="form-control"/>
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
                                                        <option value="<?php echo ($cat['category']) ?>"><?php echo ($cat['category']) ?><input type="hidden" name="category" value="<?php echo ($cat['category'])?>"/> </option>
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
                                            <label class="input-group-text" for="inputGroupSelect06">Color</label>
                                        </div>
                                        <input  type="text" name ="color" value="<?php echo (!empty($item['color'])) ?  ucfirst($item['color']) : $item['color'] ; ?>" id="inputGroupSelect06" class="form-control">
                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <input type="file" name="image" id="inputGroupSelet06"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--form floating-->
                        </div>
                        <!--card body-->
                    </div>
                    <button class="btn btn-primary mx-auto d-block form control" name="submit" type="submit">Submit</a>
                </div>
                <div class="card-footer text-center py-3"></div>
            </div>
        </div>
    </div>
    </div>
    </main>
    </div>
</form>