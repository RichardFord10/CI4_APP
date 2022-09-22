

<form action="/makeup" method="GET" name="makeup_form" class="makeup_form">
    <div class="inline-block">Select what kind of search to use
        <div class="input-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="product_type" id="" onclick="return submitForm()"<?php
                    echo((isset($_GET['product_type']) && !isset($_GET['brand'])) ? 'checked' : '');?>>
                <label class="form-check-label" for="product_type">Type&nbsp;&nbsp;</label>
            </div>
            <div class="form-check">
                <input class="form-check-input brand" type="checkbox" name="brand" id="flexRadioDefault1" onclick="return submitForm()" <?php echo((isset($_GET['brand'])) ? 'checked' : '');?>>
                <label class="form-check-label" for="brand">Brand&nbsp;&nbsp;</label>
            </div>

    <?php if(isset($_GET['product_type']))
    {
        echo('
        <div class="container-fluid">
        <div class="d-flex justify-content-start">
        <label for="makeup_type">Choose an Item Group:&nbsp;</label>
        <select class="form-group dropdown" name="product_type" id="makeup_type">
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
        <label for="brand">Choose an Item Group:&nbsp;</label>
        <select class="form-group dropdown" name="brand" id="makeup_type">
        <option value="almay">Almay</option>
        <option value="alva">Alva</option>
        <option value="anna%20sui">Anna Sui</option>
        <option value="annabelle">Anabelle</option>
        <option value="benefit">Benefit</option>
        <option value="boosh">Boosh</option>
        <option value="burt%27s%20bees">Burt\'s Bees</option>
        <option value="butter%20london">Butter London</option>
        <option value="c%27est%20moi">C\'est Moi</option>
        <option value="cargo%20cosmetics">Cargo Cosmetics</option>
        <option value="china%20glaze">China Glaze</option>
        <option value="clinique">Clinique</option>
        <option value="coastal%20classic%20creation">Coastal Classic Creation</option>
        <option value="colourpop">Colourpop</option>
        <option value="covergirl">Covergirl</option>
        <option value="dalish">Dalish</option>
        <option value="deciem">Decium</option>
        <option value="dior">Dior</option>
        <option value="dr.%20hauschka">Dr. Hauschka</option>
        <option value="e.l.f.">E.L.F</option>
        <option value="essie">Essie</option>
        <option value="fenty">Fenty</option>
        <option value="glossier">Glossier</option>
        <option value="green%20people">Green People</option>
        <option value="iman">Iman</option>
        <option value="l%27oreal">L\'Oreal</option>
        <option value="lotus%20cosmetics%20usa">Lotus Cosmetics USA</option>
        <option value="maia%27s%20mineral%20galaxy">Maia\'s Mineral Galaxy</option>
        <option value="marcelle">Marcelle</option>
        <option value="marienatie">Marienatie</option>
        <option value="maybelline">Maybelline</option>
        <option value="milani">Milani</option>
        <option value="mineral%20fusion">Mineral Fusion</option>
        <option value="misa">Misa</option>
        <option value="mistura">Mistura</option>
        <option value="moov">Moov</option>
        <option value="nudus">Nudus</option>
        <option value="nyx">Nyx</option>
        <option value="orly">Orly</option>
        <option value="pacifica">Pacifica</option>
        <option value="penny%20lane%20organics">Penny Lane Organics</option>
        <option value="physicians%20formula">Physicians Formula</option>
        <option value="piggy%20paint">Piggy Paint</option>
        <option value="pure%20anada">Pure Anada</option>
        <option value="rejuva%20minerals">Rejuva Minerals</option>
        <option value="revlon">Revlon</option>
        <option value="sally%20b%27s%20skin%20yummies">Sally B\' Skin Yummies</option>
        <option value="salon%20perfect">Salon Perfect</option>
        <option value="sante">Sante</option>
        <option value="sinful%20colours">Sinful Colors</option>
        <option value="smashbox">Smasbox</option>
        <option value="stila">Stila</option>
        <option value="suncoat">Suncoat</option>
        <option value="w3llpeople">W3llpeople</option>
        <option value="wet%20n%20wild">Wet N Wild</option>
        <option value="zorah">Zorah</option>
        <option value="zorah%20biocosmetiques">Zorah BioCosmetics</option>
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