<?php
/**
 * @var string $message
 * @var \CodeIgniter\View\View $this
 * @var array $products
 */

$this->extend('main_template');  //layout
?>

<?php $this->section('content'); //name ?> 
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <?php foreach($products as $product): ?>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal"><?= esc($product['title']) ?></h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">$<?= esc($product['price']) ?> </h1>
                <ul class="list-unstyled mt-3 mb-4">
                <li><?= esc($product['description']) ?></li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
            </div>
            </div>
        </div>
      <?php endforeach ?>
    </div>

    </div>
  </main>


<?php $this->endsection(); ?>