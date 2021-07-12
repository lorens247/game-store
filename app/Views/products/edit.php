<?php
/**
 * @var \codeIgniter\View\View $this
 * @var string[] $entity
*/

$this->extend('main_template');  //layout
?>
<?php $this->section('content'); //name ?> 
<?php if (isset($validation)): ?>
    <?= $validation->listErrors() ?>
<?php endif; ?>

<?= form_open(current_url(), ['method' =>'post']) ?>
<div class="form-group">
    <?= form_label('Title', 'title', [ //labeltext, id 
        'for' => 'title', 'class' => 'control-label'
    ]) ?>
    <?= form_input('title', esc($entity['title']), [ //data, value
        'class' => 'form-control'
    ]) ?>
</div>

<div class="form-group">
    <?= form_label('Price', 'price', [  //labeltext, id 
        'for' =>'price', 'class' =>'control-label'
    ]) ?>
    <?= form_input('price', esc($entity['price']), [ //data, value
        'class' => 'form-control',
        'min' => 0,
        'step' => '.1'
    ], 'number') ?>
</div>

<div class="form-group">
    <?= form_label('Description', 'description', [  //labeltext, id 
        'for' =>'description', 'class' =>'control-label'
    ]) ?>
    <?= form_textarea('description', esc($entity['description']), [ //data, value
        'class' =>'form-control'
    ]) ?>
</div>

<?= form_submit('submit', 'Submit', [ //data. value  
    'class' =>'btn btn-primary'
    ])?>
<?=form_close() ?>

<?php $this->endsection(); ?>