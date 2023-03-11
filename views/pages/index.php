 <div class="container d-flex">
     <?php foreach ($data['products'] as $product) : ?>

         <div class="card ms-4" style="width: 16rem;">
             <img src="<?php echo $product["image"]; ?>" alt="product pic">

             <div class="card-body">
                 <p class="card-title">
                     <?php echo $product["NAME"]; ?>
                 </p>
                 <p class="card-text"><?php echo $product["color"]; ?></p>
                 <p class="text-success"><?php echo $product["price"]; ?></p>

                 <?php if (!array_key_exists('cart', $_SESSION)) : ?>
                     <a href="/login" class="btn btn-secondary">Add to cart</a>
                 <?php else : ?>
                     <form method="POST" action="/orders?action=add_to_cart">
                         <input hidden name="pId" value="<?php echo $product["id"]; ?>" />
                         <input hidden name="pImage" value="<?php echo $product["image"]; ?>" />
                         <input hidden name="pName" value="<?php echo $product["NAME"]; ?>" />
                         <input hidden name="pColor" value="<?php echo $product["color"]; ?>" />
                         <input hidden name="pPrice" value="<?php echo $product["price"]; ?>" />

                         <button type="submit" class="btn btn-primary">Add to cart</button>
                     </form>
                 <?php endif ?>
             </div>
         </div>
     <?php endforeach; ?>
 </div>