<div>
    <div>
        <h4>Order details</h4>
        <p>Id: <?= $data['order']['id']; ?></p>
        <p>Note: <?= $data['order']['note']; ?></p>
    </div>

    <h4>Booked products</h4>
    <div class="container d-flex">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="card ms-4" style="width:140px; height:80%; background-color: #9DC08B;">
                <img src="<?php echo $product["image"]; ?>" alt="product pic">
                <div class="card-body">
                    <p class="card-title">
                        <?php echo $product["NAME"]; ?>
                    </p>
                    <p class="card-text"><?php echo $product["color"]; ?></p>
                    <p class="text-success"><?php echo $product["price"]; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>