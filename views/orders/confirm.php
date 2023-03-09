<h3>Order confirmation</h3>
<form method="POST" action="/orders?action=order_confirm">
    <div class="container d-flex">
        <?php foreach (Session::get('cart') as $item) : ?>
            <div class="card ms-4" style="width: 16rem;">
                <div class="card-body">
                    <p class="card-title">
                        <?php echo $item; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="form-outline mb-4">
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