
    <?php use dclass\devups\Form\Form; ?>
    <?php //Form::addcss(Product_price ::classpath('Ressource/js/product_price')) ?>
    
    <?= Form::open($product_price, ["action"=> "$action", "method"=> "post"]) ?>

     <div class='form-group'>
<label for='price'>Price</label>
	<?= Form::input('price', $product_price->getPrice(), ['class' => 'form-control']); ?>
 </div>
<div class='form-group'>
<label for='price_ttc'>Price_ttc</label>
	<?= Form::input('price_ttc', $product_price->getPrice_ttc(), ['class' => 'form-control']); ?>
 </div>
<div class='form-group'>
<label for='product'>Product</label>

                    <?= Form::select('product', 
                    FormManager::Options_Helper('name', Product::allrows()),
                    $product_price->getProduct()->getId(),
                    ['class' => 'form-control']); ?>
 </div>
<div class='form-group'>
<label for='currency'>Currency</label>

                    <?= Form::select('currency', 
                    FormManager::Options_Helper('id', Currency::allrows()),
                    $product_price->getCurrency()->getId(),
                    ['class' => 'form-control']); ?>
 </div>

       
    <?= Form::submit("save", ['class' => 'btn btn-success']) ?>
    
    <?= Form::close() ?>
    
    <?= Form::addDformjs() ?>    
    <?= Form::addjs(Product_price::classpath('Ressource/js/product_priceForm')) ?>
    