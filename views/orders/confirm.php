<h3>Order confirmation</h3>
<form method="POST" action="/orders?action=order_confirm">
    <div class="d-inline-flex p-2 ">
        <?php foreach (Session::get('cart') as $product) : ?>

            <div class="card ms-4" style="width:100px; height:80%; background-color: #9DC08B;">


                <img src="<?php echo $product["image"]; ?>" alt="product pic">
                <div class="card-body" style=" height:fit-content;">
                    <p class="card-title">
                        <?php echo $product["NAME"]; ?>
                    </p>
                    <p class="card-text"><?php echo $product["color"]; ?></p>
                    <p class="text-success"><?php echo $product["price"]; ?></p>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
    <div class="form-outline me-4 p-2">
        <input type="text" name="note" id="noteField" class="form-control" />
        <label class="form-label" for="noteField">Note</label>
    </div>
    <a class="me-2 btn btn-secondary" href="/orders?action=order_cancel">
        Cancel
    </a>
    <button class="me-2 btn btn-primary" type="submit">
        Book now
    </button>
</form>