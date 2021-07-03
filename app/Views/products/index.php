<?php
/**
 * @var array $products
 * @var \CodeIgniter\Pager\Pager $pager
 * @var \CodeIgniter\View\View\ $this
 */

$this->extend('main_template');  //layout
?>
<?php $this->section('content') ?>

<div class="text-left">
    <a href="#" class="btn btn-primary mb-3 mr-3"> Add New</a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($products as $product): ?>
    <tr>
        <td><?= esc($product['title']) ?> </td>
        <td><?= esc($product['price']) ?> </td>
        <td class="text-right">
            <a href="#" class="btn btn-primary mb-3 mr-3">Edit</a>
            <a href="#" class="btn btn-warning mb-3 mr-3">Delete</a>
        </td>
    </tr> 
    <?php endforeach; ?>
    </tbody>
</table>
<div>
        <?= $pager->links() ?>
</div>
<?php $this->endsection(); ?>
