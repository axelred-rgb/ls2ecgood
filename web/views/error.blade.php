
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.multipurposethemes.com/admin/eduadmin-template/bs5/front-end/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 12:35:48 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://www.multipurposethemes.com/admin/eduadmin-template/bs5/images/favicon.ico">

    <title>LS2EC TRAINING</title>

	<!-- Vendors Style-->
    <link rel="stylesheet" href="{{ assets  }}css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="{{ assets   }}css/style.css">
    <link rel="stylesheet" href="{{ assets   }}css/skin_color.css">


</head>

<body class="theme-primary">

	<section class="error-page h-p100">
		<div class="container h-p100">
		  <div class="row h-p100 align-items-center justify-content-center text-center">
			  <div class="col-lg-7 col-md-10 col-12">
				  <div>
					  <img src="{{ assets   }}images/404.png" class="max-w-650 w-p100" alt="" />
					  <h1>@tt("Page Non trouvée !")</h1>
					  <h3>@tt("Il semble que cette ressource soit indisponible")</h3>
					  <div class="my-30" >
						  <a href="<?php echo isset($_SESSION['ls2ec_last_url']) ? $_SESSION['ls2ec_last_url'] : route('home'); ?>" class="btn btn-primary">
							  @tt("Retournez à la page précédente")
						  </a>
					  </div>

					  <form class="search-form mx-auto mt-30 w-p75" hidden="true">
						<div class="input-group rounded5 overflow-h">
						  <input type="text" name="search" class="form-control" placeholder="Search">
						  <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-search"></i></button>
						</div>
						<!-- /.input-group -->
					  </form>
				  </div>
			  </div>
		  </div>
		</div>
	</section>



</body>

<!-- Mirrored from www.multipurposethemes.com/admin/eduadmin-template/bs5/front-end/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 12:35:51 GMT -->
</html>

