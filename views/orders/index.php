 <div class="container d-flex flex-column">
     <?php foreach ($data['orders'] as $order) : ?>
         <div class="card mb-4" style="width: 16rem;">
             <div class="card-body">
                 <p class="card-title">
                     <?php echo $order["id"]; ?>
                 </p>
                 <p class="card-title">
                     Note: <?php echo $order["note"]; ?>
                 </p>
                 <a href="/orders?action=order_delete&order=<?php echo $order["id"]; ?>" class="btn btn-danger me-2">
                     Delete
                 </a>
                 <a class="btn btn-secondary">
                     Edit
                 </a>
             </div>
         </div>
     <?php endforeach; ?>
 </div>