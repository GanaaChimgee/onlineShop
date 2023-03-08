 <div class="container d-flex">
     <?php foreach ($data['products'] as $product) : ?>
         <div class="card ms-4" style="width: 16rem; max-height: 9rem;">
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