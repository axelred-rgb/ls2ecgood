
<?php $__env->startSection('cssimport'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(assets); ?>vendor_components/jAlert/jAlert.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<style>
		.btn-cart {
			background-color: #0b8e36;
			border-color: #0b8e36;
			color: #ffffff;
			padding: 8px!important;
			border-radius:10px!important;
		}
		.btn-cart i{
			font-size: 70px;
		}
		.btn-cart:hover i{
			color: #ffffff;
		}
		.btn-cart i:hover{
			color: #ffffff;
		}
		#dot{
			background-color: #ffffff;
			border-radius: 50%;
			top: 1px;
			right: 2px;
			position: absolute;
			padding: 8px;
			color: #000000;
			border-color: #0b8e36;
			border: solid 1px #0b8e36;
		}

	</style>


	<script src="https://cdn.cinetpay.com/seamless/main.js" type="text/javascript"></script>

	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white"><?php echo tt("Shop Details"); ?></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->
	<?php
		$cartnumber = 0;
		if(isset($_SESSION['CART'])){
			$panier = unserialize($_SESSION['CART']);
			foreach ($panier as $pan){
				if(!is_null($pan)){
					$cartnumber ++ ;
				}
			}
		}
		else{
			$panier = [];
			$cartnumber = 0;
		}
	?>
	<div class="icon-bar-sticky" style="top:20%">
		<a href="<?php echo e(route('panier')); ?>" class="waves-effect waves-light btn btn-social-icon btn-cart">
			<i class="fa fa-shopping-cart "></i>
			<p id="dot" class="count"><?php echo e($cartnumber); ?></p>
		</a>
	</div>

	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="box mb-0">
						<div class="box-body">
							<div class="row">
								<div class="col-md-4 col-sm-6">
									<div class="box box-body b-1 text-center no-shadow">
										<img src="<?php echo e($product->srcCover()); ?>" id="product-image" class="img-fluid" alt="" />
									</div>

									<div class="clear"></div>
								</div>
								<div class="col-md-8 col-sm-6">
									<h2 class="box-title mt-0"><?php echo e($product->getName()); ?></h2>

									<h1 class="pro-price mb-0 mt-20"> <?php echo e(round((($product->priceofsale*0.2)+$product->priceofsale),1)); ?> € TTC</h1>
									<hr>
									<p> <?php echo e($product->getDescription()); ?> </p>
									<br>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
											<tr>
												<th><?php echo tt("Product"); ?></th>
												<th><?php echo tt("Price"); ?></th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td><?php echo e($product->getName()); ?>

													<input hidden type="number" value="1" min="1" id="qte" style="border-color:#0b8e36" class="form-control">
												</td>
												<td id="price">
													0 €
												</td>
											</tr>

											<tr>
												<th class="text-end"><?php echo tt("Total HT"); ?></th>
												<th id="pricetotal">
													0 €
												</th>
											</tr>
											<tr>
												<th class="text-end"><?php echo tt("TVA"); ?> (20%)</th>
												<th id="pricetva">
													0 €
												</th>
											</tr>
											<tr>
												<th class="text-end"><?php echo tt("Total TTC"); ?></th>
												<th id="pricetotalttc">
													0 €
												</th>
											</tr>
											</tbody>
										</table>
									</div>

									<?php if(App::$user->getId()): ?>
										<?php $c_product = Paiement::where("this.user_id", App::$user->getId())->andwhere('this.product_id',$product->getId())->count() ?>

										<?php if($c_product == 0): ?>

											<?php $find = false;?>
											<?php if(count($panier) > 0): ?>
												<?php $__currentLoopData = $panier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if(!is_null($pan)): ?>
														<?php if($pan[2] == $product->getId()): ?>
															<?php $find = true;?>
														<?php endif; ?>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>

											<div class="row">

												<div class="col-sm-12 col-md-6">
													<?php if(!$find): ?>
														<a onclick="app.addtocart(this)" data-id="<?php echo e($product->getId()); ?>" class="btn" style="width: 100%;
															height: 45px;
															border-radius: 5px;
															background-color: #0b8e36;
															border: 2px solid #0b8e36;
															color: #ffffff;" ><?php echo tt('Ajouter au panier'); ?>
														</a>
													<?php else: ?>
														<a href="<?php echo e(route('panier')); ?>" data-id="<?php echo e($product->getId()); ?>" class="btn" style="width: 100%;
															height: 45px;
															border-radius: 5px;
															background-color: #0b8e36;
															border: 2px solid #0b8e36;
															color: #ffffff;" ><?php echo tt('Mon panier'); ?>
														</a>
													<?php endif; ?>
												</div>
												<div class="col-sm-12 col-md-6">
													<button onclick="showpayment()" style="width: 100%;
    height: 45px;
    border-radius: 5px;
    background-color: #ffffff;
    border: 2px solid #0b8e36;
    color: #0b8e36;" onclick="checkout()"><?php echo tt('Effectuer directement le paiement'); ?></button>
												</div>
											</div>



											<hr>
											<div id="payment_method" hidden="true">
												<h4 class="box-title mb-15"><?php echo tt("Choose payment Option"); ?></h4>
												<div class="tab-content tabcontent-border" >
													<div class="tab-pane active" id="pay" role="tabpanel">
														<div class="p-30">
															<div id="smart-button-container">
																<div id="messageF"></div>
																<div style="text-align: center;">
																	<div id="paypal-button-container"></div>
																	<div style="text-align: center;">
																	<div id="paypal-button-container"></div>
																	<select name="" id="devise" style="width: 40%;
    height: 45px;
    border: 2px solid #0b8e36;
    border-radius: 5px;">
																		<option value=""><?php echo tt('Selectionnez la devise'); ?></option>
																		<option value="XAF"><?php echo tt('XAF'); ?></option>
																		<option value="XOF"><?php echo tt('XOF'); ?></option>
																	</select>
																	<button id="cinetpay" style="width: 57%;
    height: 45px;
    border-radius: 5px;
    background-color: #0b8e36;
    border: 2px solid #0b8e36;
    color: #ffffff;" onclick="checkout()"><?php echo tt('Mobile money'); ?></button>

																</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php else: ?>

											<hr>
											<div id="payment_method">
												<h4 class="box-title mb-15"><?php echo tt("Choose payment Option"); ?></h4>
												<div class="tab-content tabcontent-border" >
													<div class="tab-pane active" id="pay" role="tabpanel">
														<div class="p-30">
															<div id="smart-button-container">
																<div id="messageF"></div>
																<div style="text-align: center;">
																	<div id="paypal-button-container"></div>
																	<div style="text-align: center;">
																	<div id="paypal-button-container"></div>
																	<select name="" id="devise" style="width: 40%;
    height: 45px;
    border: 2px solid #0b8e36;
    border-radius: 5px;">
																		<option value=""><?php echo tt('Selectionnez la devise'); ?></option>
																		<option value="XAF"><?php echo tt('XAF'); ?></option>
																		<option value="XOF"><?php echo tt('XOF'); ?></option>
																	</select>
																	<button id="cinetpay" style="width: 57%;
    height: 45px;
    border-radius: 5px;
    background-color: #0b8e36;
    border: 2px solid #0b8e36;
    color: #ffffff;" onclick="checkout()"><?php echo tt('Mobile money'); ?></button>

																</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php endif; ?>
									<?php else: ?>
										<button onclick="location.href='<?php echo e(route('login')); ?>';" type="button" class="btn btn-info w-p100 mt-15"><?php echo tt("Login to Pay"); ?></button>
									<?php endif; ?>

								</div>

							</div>
						</div>				
					</div>
				</div>
			</div>
		</div>
	</section>		


<?php $__env->stopSection(); ?>

<?php $__env->startSection("jsimport"); ?>

	<script type="text/javascript" src="<?php echo e(assets); ?>vendor_components/jAlert/jAlert.js"></script>

	<script type="text/javascript" src="<?php echo e(assets); ?>vendor_components/jAlert/jAlert-functions.js"></script>
	<?php if(App::$user->getRole() == 3): ?>
		<script src="https://www.paypal.com/sdk/js?client-id=ASq4h0hB7HT_bFKcGu8HFqqPHKOLlu0qszDornLOeSuMOPp9xXbbtQuQ0csML6egXOBLExP-aZDK0kOV&currency=EUR"></script>
	<?php else: ?>
		<script src="https://www.paypal.com/sdk/js?client-id=AX-b9tAA43U18tmHWrPdzgbVRmMTtk4IsqLnkJufx-pSutyEUSQCjnoLTPNaG6ayGUcqcKAd_OtZcpQ1&currency=EUR"></script>
	<?php endif; ?>
	<script src="<?php echo e(assets); ?>js/paypal.js"></script>
	<script src="<?php echo e(assets); ?>js/cinetpay.js"></script>
	<script>

		var product = '<?php echo e($product->getId()); ?>';
		var initprice = parseFloat('<?php echo e($product->priceofsale); ?>');
		var inityear = parseFloat('<?php echo e($product->priceofsale); ?>');
		var initpricemonth = parseFloat('<?php echo e($product->priceofsale); ?>');
		var tva = (20*initprice)/100;
		var ttc = initprice + tva;
		var route = '<?php echo e(route('confirmpurchasesimpleproduct')); ?>?id='+product;
		let nbre_month ;

		function showpayment(){
			$("#payment_method").removeAttr('hidden');
		}

		function checkCode(el){
			model.addLoader($(el));
			var price = initprice;
			let code = $("#codepromo").val();
			$.get(__env+"api/lazyloading.codepromo?dfilters=on&code:eq="+code, function(data, status){
				//data.listEntity;
				model.removeLoader();
				//console.log(data.listEntity[0].valeur);
				//alert(data.listEntity[0].valeur);
				$p = price;

				if(data.listEntity.length > 0){
					//price = price * parseInt(data.listEntity[0].valeur);

					if(data.listEntity[0].nbremonth == 0 || data.listEntity[0].state != 0){
						$('#errorcode').html('<span style="color:#fb0202"><?php echo tt("Code invalide"); ?></span>');
					}
					else{
						if(data.listEntity[0].nbremonth !== -1){
							if(data.listEntity[0].nbremonth <= nbre_month){
								route += '&code=' + data.listEntity[0].id;

								price = setAllprice(price, parseInt(data.listEntity[0].valeur) / 100);

								$('#errorcode').html('<span style="color:#0b8e36">' + data.listEntity[0].valeur + ' % <?php echo tt("de réduction"); ?></span>');
							}
							else{
								$('#errorcode').html('<span style="color:#fb0202"><?php echo tt("Code invalide"); ?></span>');
							}
						}
						else{
							route += '&code=' + data.listEntity[0].id;

							price = setAllprice(price, parseInt(data.listEntity[0].valeur) / 100);

							$('#errorcode').html('<span style="color:#0b8e36">' + data.listEntity[0].valeur + ' % <?php echo tt("de réduction"); ?></span>');
						}
					}

				}
				else{
					$('#errorcode').html('<span style="color:#fb0202"><?php echo tt("Code invalide"); ?></span>');
				}
			});
		}

		function setAllprice(price, reduction = 0){
			$p = price;
			price = price * reduction;

			price = $p - price;
			price = Math.round(price * 100) / 100;
			tva = (20*price)/100;
			tva = Math.round(tva * 100) / 100;
			ttc = price + tva;
			ttc = Math.round(ttc * 100) / 100;
			route += '&price='+price;
			route += '&tva='+tva;
			route += '&ttc='+ttc;

			$('#paypal-button-container').empty();
			$a = '';

			$a += '<span>'+price+' €</span>';
			$('#pricetotal').html('<span>'+price+' €</span>');
			$('#pricetva').html('<span>'+tva+' €</span>');
			$('#pricetotalttc').html('<span>'+ttc+' €</span>');
			$('#price').html($a);
			price = ttc;
			route += '&montant='+price;
			//return price;

			<?php if(App::$user->getId()): ?>
				let devise = 'XAF';
				let description = '<?php echo e($product->getName()); ?>';
				let name = '<?php echo e(App::$user->getFirstname()); ?>';
				let surname = '<?php echo e(App::$user->getLastname()); ?>';
				let email = '<?php echo e(App::$user->getEmail()); ?>';
				let phonenumber = '<?php echo e(App::$user->getPhonenumber()); ?>';
				let country = '<?php echo e(App::$user->getCountry()->iso); ?>';
				let countryname = '<?php echo e(App::$user->getCountry()->getName()); ?>';
			<?php endif; ?>

			$('#cinetpay').attr('onclick',`checkout('`+route+`',`+price+`,'`+devise+`','`+description+`','`+name+`','`+surname+`','`+email+`','`+phonenumber+`','`+country+`','`+countryname+`')`);

			purchase(price, 'Euro', 'EUR', "<?php echo e($product->getName()); ?>" , $a, '#paypal-button-container',function(){ location.href = route; });

		}


		function reset(){
			//alert("maff");
			$("#message").html("");
			$("#paypal-button-container").html("");
			$('#payment_method').attr('hidden','hidden');
		}
		function  aaa(product, date){
			alert(product);
			alert(date);
		}
		function payment(){
			reset();

			if($('#begindate').val() == ""){
				alert($('#begindate').val());
				$('#message').html(`
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
					</button>
					${'<?php echo tt("Vous devez selectionner une date"); ?>'}
				</div>
				`);
			}
			else{
				$("#payment_method").removeAttr('hidden');
				var date  = $('#begindate').val();

			}
		}

		setTimeout(()=>setAllprice(initprice), 500);


	</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/shop-details.blade.php ENDPATH**/ ?>