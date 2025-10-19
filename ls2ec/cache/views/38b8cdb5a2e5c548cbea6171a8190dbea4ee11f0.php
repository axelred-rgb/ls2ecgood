<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <h4 class="box-title mb-0">
            <?php echo tt("MY LABS"); ?>
        </h4>
        <hr>
		<div id="lab" hidden>
			<div class="row">
				<div class="col-sm-8">
					<div id="countdown">
						<strong>Temps restant</strong> :
						<span id="countdown_day" >--</span> jours
						<span id="countdown_hour">--</span> heures
						<span id="countdown_min" >--</span> minutes
						<span id="countdown_sec" >--</span> secondes
					</div>
				</div>
				<div class="col-sm-4">
					Login: <span id="login"></span>
					Password: <span id="password"></span>
				</div>
			</div>
			<br>
			
			<div class="card rounded-0">
				<iframe src="https://spacekola.com/connexion?session=off" id="frame_lab"  style="border: none;" height="00"></iframe>
			</div>
		</div>
		<?php $__currentLoopData = $u_labs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card rounded-0 labs" id="labs<?php echo e($key); ?>">
                <div class="d-lg-flex">
                    <div class="position-relative w-lg-400">
                        <a href="#">
                            <img class="" src="<?php echo e(assets); ?>images/front-end-img/courses/<?php echo e($lab->labs->courses->getImage()); ?>" alt="Card image cap">
                        </a>											
                    </div>
                    <div class="card mb-0 no-border no-shadow w-p100">
                        <div class="card-body" style="padding-bottom: 5px;">
                            <div class="cour-stac d-lg-flex align-items-center text-fade" style="margin-bottom: 20px;">
                                <h3 class="card-title mt-20"><?php echo e($lab->labs->courses->getName()); ?></h3>
                            </div>
							<div>
								<p class="card-text">
									<?php echo tt('To'); ?> <span><?php echo e($lab->date); ?></span>
                                    <?php echo tt('At'); ?> <span><?php echo e($lab->datefin); ?></span>
								</p>
							</div>
                        </div>
                        <div class="card-footer justify-content-between d-flex align-items-center">
                            <div class="d-flex fs-18 fw-600"> <span class="text-dark me-10"></span> </div>
                            <span>
								<?php
									if(date('Y-m-d H:i:s') < $lab->date){?>
										<button class="doingLab btn btn-success" onclick="lauchlab(<?php echo e($key); ?>,'<?php echo e($lab->date); ?>','<?php echo e($lab->datefin); ?>','<?php echo e($lab->labs_keys->login); ?>','<?php echo e($lab->labs_keys->password); ?>')"><?php echo tt("Start"); ?></button>
								<?php } else{?>
                                	<a class="doingLab btn btn-success" target="__blank" href="<?php echo e(route('showlabs')); ?>?id=<?php echo e($lab->getId()); ?>"><?php echo tt("Start"); ?></a>
								<?php } ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>

	<script>
		var datestop ;
		function lauchlab(a, b, c, d, e){
			alert("Vous ne pouvez pas encore commencer le lab");
			var datenow = new Date();
			var targetdate = new Date(b);

			if(datenow < targetdate){
				
			}
			else{
				datestop = c;
				//alert(datestop);
				$("#lab").removeAttr("hidden");
				$("#login").html(d);
				$("#password").html(e);
				$("#lab").insertAfter("#labs"+a).hide().show('slow');
				countdownManager.init(datestop);
				//$("#frame_lab").attr('src','https://spacekola.com/connexion?session=off');

			}

			
		}
		var diff;
		$("#frame_lab").noResize = true;
        $( ".doingLab" ).click(function() {
			//alert("mmmm");
			$( "#pills-mylabs-tab" ).find('span').trigger( "click" );

		});
		countdownManager = {
			// Configuration
			targetTime: null, // Date cible du compte à rebours (00:00:00)
			displayElement: { // Elements HTML où sont affichés les informations
				day:  null,
				hour: null,
				min:  null,
				sec:  null
			},
			
			// Initialisation du compte à rebours (à appeler 1 fois au chargement de la page)
			init: function(date){
				// Récupération des références vers les éléments pour l'affichage
				// La référence n'est récupérée qu'une seule fois à l'initialisation pour optimiser les performances
				this.displayElement.day  = jQuery('#countdown_day');
				this.displayElement.hour = jQuery('#countdown_hour');
				this.displayElement.min  = jQuery('#countdown_min');
				this.displayElement.sec  = jQuery('#countdown_sec');
				this.targetTime= new Date(date);
				// Lancement du compte à rebours
				this.tick(); // Premier tick tout de suite
				window.setInterval("countdownManager.tick();", 1000); // Ticks suivant, répété toutes les secondes (1000 ms)
			},
			
			// Met à jour le compte à rebours (tic d'horloge)
			tick: function(){
				// Instant présent
				var timeNow  = new Date();
				
				// On s'assure que le temps restant ne soit jamais négatif (ce qui est le cas dans le futur de targetTime)
				if( timeNow > this.targetTime ){
					timeNow = this.targetTime;
				}
				
				// Calcul du temps restant
				diff = this.dateDiff(timeNow, this.targetTime);
				
				this.displayElement.day.text(  diff.day  );
				this.displayElement.hour.text( diff.hour );
				this.displayElement.min.text(  diff.min  );
				this.displayElement.sec.text(  diff.sec  );

				if(diff.hour == 0 && diff.min == 3 ){
					$("#close_lab").html("FERMETURE DANS 3 MIN");
				}
				if(diff.hour == 0 && diff.min == 2 ){
					$("#close_lab").html("FERMETURE DANS 2 MIN");
				}
				if(diff.hour == 0 && diff.min == 1 ){
					$("#close_lab").html("FERMETURE DANS 1 MIN");
				}
				if(diff.hour == 0 && diff.min == 0  && diff.sec==0){
					$("#close_lab").html("TEMPS D'ACCES AU LABS EXPIRE");
					$("#frame_lab").attr("src","#");
				}
			},
			
			// Calcul la différence entre 2 dates, en jour/heure/minute/seconde
			dateDiff: function(date1, date2){
				var diff = {}                           // Initialisation du retour
				var tmp = date2 - date1;
		
				tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
				diff.sec = tmp % 60;                    // Extraction du nombre de secondes
				tmp = Math.floor((tmp-diff.sec)/60);    // Nombre de minutes (partie entière)
				diff.min = tmp % 60;                    // Extraction du nombre de minutes
				tmp = Math.floor((tmp-diff.min)/60);    // Nombre d'heures (entières)
				diff.hour = tmp % 24;                   // Extraction du nombre d'heures
				tmp = Math.floor((tmp-diff.hour)/24);   // Nombre de jours restants
				diff.day = tmp;
		
				return diff;
			}
		};
		
		/*jQuery(function($){
			// Lancement du compte à rebours au chargement de la page
			countdownManager.init();
		});*/

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ls2ec\web\views/board/mylabs.blade.php ENDPATH**/ ?>