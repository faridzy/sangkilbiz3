<?php

/**
 * @var yii\web\View $this
 * @var biz\master\models\ProductSupplier $model
 */

$this->title = 'Update Product Supplier: ' . ' ' . $model->id_product;
$this->params['breadcrumbs'][] = ['label' => 'Product Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_product, 'url' => ['view', 'id_product' => $model->id_product, 'id_supplier' => $model->id_supplier]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-supplier-update col-lg-8">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
