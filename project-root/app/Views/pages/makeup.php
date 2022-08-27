<?php ?>
<div class="row style='display:inline;'">Select what kind of search to use
    <div class="form-check form-check-inline-block">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" checked>
        <label class="form-check-label" for="inlineCheckbox1">Type</label>
    </div>
    <div class="form-check form-check-inline-block">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
        <label class="form-check-label" for="inlineCheckbox2">Category</label>
    </div>
    <div class="form-check form-check-inline-block">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
        <label class="form-check-label" for="inlineCheckbox3">Brand</label>
    </div>
</div>
<form action="/makeup" method="GET" name="makeup_form">
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <label for="makeup_type">Choose a Type:&nbsp;</label>
            <select class="dropdown" name="product_type" id="makeup_type">
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
            </div>
</form>
<span class="justify-content-center">&nbsp;&nbsp;&nbsp;<strong>Use the dropdown to the left to select different categories of makeup. These items are pulled using Curl, PHP & a free makeup API I found online</strong></span>
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