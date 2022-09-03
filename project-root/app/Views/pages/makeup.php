

<form action="/makeup" method="GET" name="makeup_form" class="makeup_form">
    <div class="row style='display:inline;'">Select what kind of search to use
        <div class="input-group">
            <div class="form-check">
                <input class="form-check-input product_category" type="radio" name="product_category" id="product_category" onclick="return submitForm()" <?php echo(isset($_GET['product_category']) ? 'checked' : '');?>
                <label class="form-check-label" for="product_category">Category&nbsp;&nbsp;</label>
            </div>
            <div class="form-check">
                <input class="form-check-input product_type" type="radio" name="product_type" id="flexRadioDefault2" onclick="return submitForm()"<?php echo(isset($_GET['product_type']) ? 'checked' : '');?>>
                <label class="form-check-label" for="product_type">Type&nbsp;&nbsp;</label>
            </div>
            <div class="form-check">
                <input class="form-check-input brand" type="radio" name="brand" id="flexRadioDefault1" onclick="return submitForm()" <?php echo(isset($_GET['brand']) ? 'checked' : '');?>>
                <label class="form-check-label" for="brand">Brand&nbsp;&nbsp;</label>
            </div>
        </div>
    </div>
    <?php if(isset($_GET['product_category']))
    {
        echo('
        <div class="container-fluid">
        <div class="d-flex justify-content-start">
        <label for="makeup_type">Choose an Item Group:&nbsp;</label>
        <select class="form-group dropdown" name="item" id="makeup_type">
        <option value="Blush">Blush</option>
        <option value="Bronzer">Bronzer</option>
        <option value="Eyebrow">Eyebrow</option>
        <option value="Eyeliner">Eyeliner</option>
        <option value="Eye%20Shadow">Eye Shadow</option>
        <option value="Foundation">Foundation</option>
        <option value="Lip%20Liner">Lip Liner</option>
        <option value="Lip%20Stick">Lip Stick</option>
        <option value="Mascara">Mascara</option>
        <option value="Nail%20Polish">Nail Polish</option>
        </select>
        <br>&nbsp;&nbsp;
        <div class="inline"> <button type="submit" name="makeup_form" class="btn btn-primary" value="submit">Submit</button>
        </div>');
    }elseif(isset($_GET['product_type']))
    {
        echo('
        <div class="container-fluid">
        <div class="d-flex justify-content-start">
        <label for="makeup_type">Choose an Item Group:&nbsp;</label>
        <select class="form-group dropdown" name="item" id="makeup_type">
        <option value="Blush">Blush</option>
        <option value="Bronzer">Bronzer</option>
        <option value="Eyebrow">Eyebrow</option>
        <option value="Eyeliner">Eyeliner</option>
        <option value="Eye%20Shadow">Eye Shadow</option>
        <option value="Foundation">Foundation</option>
        <option value="Lip%20Liner">Lip Liner</option>
        <option value="Lip%20Stick">Lip Stick</option>
        <option value="Mascara">Mascara</option>
        <option value="Nail%20Polish">Nail Polish</option>
        </select>
        <br>&nbsp;&nbsp;
        <div class="inline"> <button type="submit" name="makeup_form" class="btn btn-primary" value="submit">Submit</button>
        </div>');
    }elseif(isset($_GET['brand']))
    {
        echo('
        <div class="container-fluid">
        <div class="d-flex justify-content-start">
        <label for="makeup_type">Choose an Item Group:&nbsp;</label>
        <select class="form-group dropdown" name="item" id="makeup_type">
        <option value="Blush">Blush</option>
        <option value="Bronzer">Bronzer</option>
        <option value="Eyebrow">Eyebrow</option>
        <option value="Eyeliner">Eyeliner</option>
        <option value="Eye%20Shadow">Eye Shadow</option>
        <option value="Foundation">Foundation</option>
        <option value="Lip%20Liner">Lip Liner</option>
        <option value="Lip%20Stick">Lip Stick</option>
        <option value="Mascara">Mascara</option>
        <option value="Nail%20Polish">Nail Polish</option>
        </select>
        <br>&nbsp;&nbsp;
        <div class="inline"> <button type="submit" name="makeup_form" class="btn btn-primary" value="submit">Submit</button>
        </div>');
    }?>
</form>
</div>
<br>


<?php $counter = 0; ?>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
                <?php if (isset($data)) : ?>
                    <?php foreach ($data as $product) : ?>
                        <?php if ($counter == 15) {
                            break;
                        } ?>
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <img alt="<?php echo $product->name; ?>" src="<?php echo $product->image_link ?>" class="w-100" />
                                            <a href="#!">
                                                <div class="hover-overlay">
                                                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5><?php echo $product->name; ?></h5>
                                        <div class="d-flex flex-row">
                                            <div class="text-danger mb-1 me-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span><?php echo $product->id; ?></span>
                                        </div>
                                        <p class="text-truncate mb-4 mb-md-0">
                                            <?php echo $product->description; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">$<?php echo $product->price; ?></h4>
                                            <span class="text-danger"><s><?php echo $product->price * 2; ?></s></span>
                                        </div>
                                        <h6 class="text-success">Free shipping</h6>
                                        <div class="d-flex flex-column mt-4">
                                            <button class="btn btn-primary btn-sm" type="button">Details</button>
                                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                Add to wishlist
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $counter++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>