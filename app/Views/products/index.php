<?php
/**
 * @var array $products
 * @var $pager
 */
?>

<?php foreach($products as $product): ?>
    <div>
        <?= esc($product['title']) ?>
    </div>
<?php endforeach; ?>

<div>
    <?= $pager->links() ?>
</div>
