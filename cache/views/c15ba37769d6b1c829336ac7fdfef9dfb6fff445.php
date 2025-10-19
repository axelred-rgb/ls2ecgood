
<?php $__env->startSection('cssimport'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(assets); ?>vendor_components/jAlert/jAlert.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Event snippet for Ajout au panier * Le client a cliqué sur une offre conversion page -->

    <script src="https://cdn.cinetpay.com/seamless/main.js" type="text/javascript"></script>

    <style>
        .sdk {
            display: block;
            position: absolute;
            background-position: center;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
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
    <script>

    </script>

    <!---page Title --->
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
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white"><?php echo tt("Checkout"); ?></h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page content -->

    <section class="py-50">
        <div class="container">
            <div class="row">


                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-9">
                                    <h4 class="box-title"><?php echo tt("Product Summary"); ?></h4>
                                </div>
                                <div class="col-3">
                                    <a href="<?php echo e(route('resources')); ?>"  class="btn" style="width: 100%;height: 45px;border-radius: 5px;background-color: #0b8e36;border: 2px solid #0b8e36;
										color: #ffffff;" ><?php echo tt('Retourner à la liste des ressources'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th><?php echo tt("Produit"); ?></th>
                                        <th><?php echo tt("Prix unitaire"); ?></th>
                                        <th><?php echo tt("Quantité"); ?></th>
                                        <th><?php echo tt("Prix total"); ?></th>
                                        <th>*</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $total = 0 ;$totalht=0; $i=0;?>
                                    <?php $__currentLoopData = $panier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!is_null($pan)): ?>
                                            <tr id="produit<?php echo e($i); ?>">
                                                <td><?php echo e($pan[0]->getName()); ?></td>
                                                <td>
                                                    <label for="" data-price="<?php echo e($pan[0]->priceofsale); ?>" id="priceunit<?php echo e($i); ?>">
                                                        <?php echo e($pan[0]->priceofsale); ?>

                                                    </label> €
                                                </td>
                                                <td>
                                                    <?php echo e($pan[1]); ?>


                                                </td>
                                                <?php $ht = (int)$pan[1] * $pan[0]->priceofsale; $totalht += $ht;?>
                                                <?php $tot = round((($pan[0]->priceofsale*0.2)+$pan[0]->priceofsale),1) * (int)$pan[1]; $total += $tot;?>
                                                <td>
                                                   <span id="tot<?php echo e($i); ?>"><?php echo e($ht); ?></span>
                                                </td>
                                                <td>
                                                    <button type="submit" onclick="remove('<?php echo e($i); ?>')" style="background-color: #e0071f;margin-bottom: 0px;color: #ffffff;border: 1px solid #e0071f;border-radius: 5px;font-size: 14px;padding: 5px 10px;" class="submit-btn">
                                                        <?php echo tt('Retirer'); ?>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php $i++;?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="font-size: 25px;font-weight: bold;">
                                        <td colspan="3" style="text-align: center;">
                                            <?php echo tt('Total hors taxe'); ?>
                                        </td>
                                        <td colspan="2"  style="text-align: center;">
                                            <span id="pricetotal"><?php echo e($totalht); ?></span>
                                        </td>
                                    </tr>
                                    <tr style="font-size: 25px;font-weight: bold;">
                                        <td colspan="3" style="text-align: center;">
                                            <?php echo tt('TVA'); ?>
                                        </td>
                                        <td colspan="2"  style="text-align: center;">
                                            <span id="pricetva"><?php echo e($totalht*0.2); ?></span>
                                        </td>
                                    </tr>
                                    <tr style="font-size: 25px;font-weight: bold;">
                                        <td colspan="3" style="text-align: center;">
                                            <?php echo tt('Montant Total'); ?>
                                        </td>
                                        <td colspan="2"  style="text-align: center;">
                                            <span id="pricetotalttc"><?php echo e($total); ?></span>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>


                            <?php if(App::$user->getId()): ?>

                                    <hr>
                                    <div id="payment_method" <?php echo e($totalht==0 ? 'hidden=true':''); ?>>
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
                                                                    <option value="CDF"><?php echo tt('CDF'); ?></option>
                                                                    <option value="GNF"><?php echo tt('GNF'); ?></option>
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
                                <button onclick="location.href='<?php echo e(route('login')); ?>';" type="button" class="btn btn-info w-p100 mt-15"><?php echo tt("Login to Pay"); ?></button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








<?php $__env->stopSection(); ?>

<?php $__env->startSection("jsimport"); ?>

    <!--script type="text/javascript" src="<?php echo e(assets); ?>vendor_components/jAlert/jAlert.js"></script-->

    <!--script type="text/javascript" src="<?php echo e(assets); ?>vendor_components/jAlert/jAlert-functions.js"></script-->

    <?php if(App::$user->getRole() == 3): ?>
        <script src="https://www.paypal.com/sdk/js?client-id=ASq4h0hB7HT_bFKcGu8HFqqPHKOLlu0qszDornLOeSuMOPp9xXbbtQuQ0csML6egXOBLExP-aZDK0kOV&currency=EUR"></script>
    <?php else: ?>
        <script src="https://www.paypal.com/sdk/js?client-id=AX-b9tAA43U18tmHWrPdzgbVRmMTtk4IsqLnkJufx-pSutyEUSQCjnoLTPNaG6ayGUcqcKAd_OtZcpQ1&currency=EUR"></script>
    <?php endif; ?>
    <script src="<?php echo e(assets); ?>js/paypal.js"></script>
    <script src="<?php echo e(assets); ?>js/cinetpay.js"></script>
    <script>

        var product ="<?php echo e(tt('Achat de produit')); ?>";
        var initprice = parseFloat('<?php echo e($totalht); ?>');
        var inityear = parseFloat('<?php echo e($totalht); ?>');
        var initpricemonth = parseFloat('<?php echo e($totalht); ?>');
        var tva = (20*initprice)/100;
        var ttc = initprice + tva;
        var route = '<?php echo e(route('confirmpurchaseproduct')); ?>?id='+'achat_de_produit';
        let nbre_month ;

        var i = <?php echo e($i); ?>;
        var cart = <?php echo json_encode(unserialize($_SESSION['CART'])); ?>;

        function remove(a){
            $.ajax({
                url: __env + "api/deleteto.cart?index="+a,
                type: 'GET',
                success: function (res) {
                    console.log(res);
                    if (res.success) {
                        $('#dot').html(res.panier);
                        cart[a][1] = 0;
                        var alltotal = 0;
                        $('#produit'+a).fadeOut(300, function(){ $(this).remove();});
                        for (var k = 0; k < i; k++) {
                            if($('#produit'+k).length > 0){
                                alltotal += parseFloat($("#tot" + k).html())
                            }
                        }
                        alltotal = alltotal - parseFloat($("#tot"+ a).html());
                        setAllprice(alltotal);
                    }
                }
            });
        }

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

            if(isNaN(price) || price == 0){
                price = 0;
                tva = 0;
                ttc = 0;
                $("#payment_method").attr('hidden',true);
            }

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
            let description ="<?php echo e(tt('Achat de produit')); ?>";
            let name = '<?php echo e(App::$user->getFirstname()); ?>';
            let surname = '<?php echo e(App::$user->getLastname()); ?>';
            let email = '<?php echo e(App::$user->getEmail()); ?>';
            let phonenumber = '<?php echo e(App::$user->getPhonenumber()); ?>';
            let country = '<?php echo e(App::$user->getCountry()->iso); ?>';
            let countryname = '<?php echo e(App::$user->getCountry()->getName()); ?>';
            <?php endif; ?>

            $('#cinetpay').attr('onclick',`checkout('`+route+`',`+price+`,'`+devise+`','`+description+`','`+name+`','`+surname+`','`+email+`','`+phonenumber+`','`+country+`','`+countryname+`')`);

            purchase(price, 'Euro', 'EUR',"<?php echo e(tt('Achat de produit')); ?>" , $a, '#paypal-button-container',function(){ location.href = route; });

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
					</button>Vous devez selectionner une date
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


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/panier.blade.php ENDPATH**/ ?>