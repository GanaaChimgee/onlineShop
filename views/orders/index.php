 <div class="container d-flex flex-column">

     <?php foreach ($data['orders'] as $order) : ?>
         <div class="card mb-4" style="width: 16rem;">
             <div class="card-body">
                 <form method="POST" action="/orders?action=order_edit">
                     <p class="card-title">
                         <?php echo $order["id"]; ?>
                     </p>

                     <?php if (array_key_exists('edit', $_REQUEST) && $_REQUEST['edit'] == 'true') : ?>
                         <input type="text" name="orderNote" value="<?= $order["note"]; ?>">
                         <input type="text" name="orderId" value="<?= $order["id"]; ?>" hidden>
                     <?php else : ?>
                         <p class="card-title">
                             Note: <?php echo $order["note"]; ?>
                         </p>
                     <?php endif ?>

                     <a href="/orders?id=<?php echo $order["id"]; ?>" class="btn btn-dark">
                         Details
                     </a>

                     <a href="/orders?action=order_delete&order=<?php echo $order["id"]; ?>" class="btn btn-dark">
                         Delete
                     </a>


                     <?php if (array_key_exists('edit', $_REQUEST) && $_REQUEST['edit'] == 'true') : ?>
                         <button class="btn btn-dark" type="submit">
                             Update
                         </button>
                     <?php else : ?>
                         <a href="/orders?edit=true" class="btn btn-dark">
                             Edit
                         </a>
                     <?php endif ?>

                 </form>
             </div>
         </div>
     <?php endforeach; ?>
 </div>