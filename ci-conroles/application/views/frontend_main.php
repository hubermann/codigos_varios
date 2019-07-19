<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Title -->
	<title>10en8 | Algo mas..</title>

	<!-- Required Meta Tags Always Come First -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url('public_folder/frontend/favicon.ico'); ?>">
	<!-- Google Fonts -->
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/bootstrap/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/icon-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/icon-hs/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/dzsparallaxer/dzsparallaxer.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/dzsparallaxer/dzsscroller/scroller.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/dzsparallaxer/advancedscroller/plugin.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/animate.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/hs-bg-video/hs-bg-video.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/fancybox/jquery.fancybox.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/hs-megamenu/src/hs.megamenu.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/hamburgers/hamburgers.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/slick-carousel/slick/slick.css'); ?>">

	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/icon-hs/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/vendor/fancybox/jquery.fancybox.min.css'); ?>">

	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/font-awesome/fontawesome-all.min.css'); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- CSS Unify -->
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/css/unify-core.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/css/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/css/unify-components.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/css/unify-globals.css'); ?>">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="<?php echo base_url('public_folder/frontend/assets/css/custom.css'); ?>">

	<style media="screen">
		.bgheader{background: #444;}
		.bg-blue{background:#14171e;}
		.section-bggray{background: #332e33;}
		.section-bgwhite{background: #FFF;}
	</style>
</head>

<body>
	<main>
		<div class="bgheader">
		<?php include_once('frontend/header.php'); ?>

		<?php include_once('frontend/notificaciones.php'); ?>
		</div>
		<?php (isset($content)) ? $this->load->view($content) : $this->load->view('frontend/inicio'); ?>

		<?php #include_once('frontend/profile-settings.php'); ?>

		<?php include_once('frontend/footer.php'); ?>

		<?php include_once('frontend/link_to_up.php'); ?>

	</main>

	<div class="u-outer-spaces-helper"></div>

	<!-- JS Global Compulsory -->

	<script type="text/javascript" src="<?= base_url('public_folder/frontend/assets/vendor/jquery/jquery-3.2.1.js');?>"></script>
	<script src="<?php echo base_url('public_folder/frontend/assets/vendor/jquery-migrate/jquery-migrate.min.js') ?>"></script>
	<script src="<?php echo base_url('public_folder/frontend/assets/vendor/jquery.easing/js/jquery.easing.js') ?>"></script>
	<script src="<?php echo base_url('public_folder/frontend/assets/vendor/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('public_folder/frontend/assets/vendor/bootstrap/bootstrap.min.js') ?>"></script>

	<!-- slick carousel  -->
	<script src="<?php echo base_url('public_folder/frontend/assets/vendor/hs-megamenu/src/hs.megamenu.js') ?>"></script>

	<!-- JS Implementing Plugins -->
	<script src="<?php echo base_url('public_folder/frontend/assets/vendor/slick-carousel/slick/slick.js') ?>"></script>

	<!-- JS Unify -->
	<script src="<?php echo base_url('public_folder/frontend/assets/js/hs.core.js') ?>"></script>
	<script src="<?php echo base_url('public_folder/frontend/assets/js/components/hs.header.js') ?>"></script>
	<script src="<?php echo base_url('public_folder/frontend/assets/js/helpers/hs.hamburgers.js') ?>"></script>
	<script src="<?php echo base_url('public_folder/frontend/assets/js/components/hs.tabs.js') ?>"></script>
	<script src="<?php echo base_url('public_folder/frontend/assets/js/components/hs.go-to.js') ?>"></script>
	<script src="<?php echo base_url('public_folder/frontend/assets/js/helpers/hs.focus-state.js') ?>"></script>


	<!-- JS Global Compulsory -->

	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/jquery-migrate/jquery-migrate.min.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/jquery.easing/js/jquery.easing.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/popper.min.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/bootstrap/bootstrap.min.js') ?>"></script>

	    <!-- JS Implementing Plugins -->
	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/appear.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/masonry/dist/masonry.pkgd.min.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/jquery.countdown.min.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/fancybox/jquery.fancybox.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/slick-carousel/slick/slick.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/vendor/gmaps/gmaps.min.js') ?>"></script>

	    <!-- JS Unify -->
	    <script src="<?php echo base_url('public_folder/frontend/assets/js/hs.core.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/js/components/hs.header.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/js/components/hs.scroll-nav.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/js/components/hs.tabs.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/js/components/hs.countdown.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/js/components/hs.carousel.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/js/components/gmap/hs.map.js') ?>"></script>
	    <script src="<?php echo base_url('public_folder/frontend/assets/js/components/hs.go-to.js') ?>"></script>

			<!-- JS Unify -->
			<script  src="<?= base_url('/public_folder/frontend/assets/js/components/hs.popup.js'); ?>"></script>


			<!-- JS Customization -->
			<script src="<?php echo base_url('public_folder/frontend/assets/js/custom.js') ?>"></script>












	<!-- JS Plugins Init. -->
	<script>
		$(document).on('ready', function () {
				// initialization of tabs
				$.HSCore.components.HSTabs.init('[role="tablist"]');

				// initialization of go to
				$.HSCore.components.HSGoTo.init('.js-go-to');

				// Form Focus State
				$.HSCore.helpers.HSFocusState.init();
			});

			$(window).on('load', function () {
				// initialization of header
				$.HSCore.components.HSHeader.init($('#js-header'));
				$.HSCore.helpers.HSHamburgers.init('.hamburger');

				// initialization of HSMegaMenu component
				$('.js-mega-menu').HSMegaMenu({
					event: 'hover',
					pageContainer: $('.container'),
					breakpoint: 991
				});
			});

			$(window).on('resize', function () {
				setTimeout(function () {
					$.HSCore.components.HSTabs.init('[role="tablist"]');
				}, 200);
			});
	</script>

	<!-- JS Plugins Init. -->
    <script>
      // initialization of google map
      function initMap() {
        $.HSCore.components.HSGMap.init('.js-g-map');
      }

      $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');

        $('#carouselCus1').slick('setOption', 'responsive', [{
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        }], true);

        $('#carouselCus2').slick('setOption', 'responsive', [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 3
          }
        }, {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            centerPadding: '100px'
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            centerPadding: '60px'
          }
        }, {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            centerPadding: '40px'
          }
        }], true);

        $('#carouselCus3').slick('setOption', 'responsive', [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 5
          }
        }, {
          breakpoint: 992,
          settings: {
            slidesToShow: 4
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 3
          }
        }, {
          breakpoint: 576,
          settings: {
            slidesToShow: 2
          }
        }], true);

        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of go to section
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of countdowns
        var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
          yearsElSelector: '.js-cd-years',
          monthElSelector: '.js-cd-month',
          daysElSelector: '.js-cd-days',
          hoursElSelector: '.js-cd-hours',
          minutesElSelector: '.js-cd-minutes',
          secondsElSelector: '.js-cd-seconds'
        });
      });

      $(window).on('load', function() {
        // initialization of HSScrollNav
        $.HSCore.components.HSScrollNav.init($('#js-scroll-nav'), {
          duration: 700,
          easing: 'easeOutExpo'
        });

        // initialization of masonry.js
        $('.masonry-grid').imagesLoaded().then(function () {
          $('.masonry-grid').masonry({
            columnWidth: '.masonry-grid-sizer',
            itemSelector: '.masonry-grid-item',
            percentPosition: true
          });
        });
      });

      $(window).on('resize', function () {
        setTimeout(function () {
          $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
      });

			$(document).on('ready', function () {
				// initialization of popups
				$.HSCore.components.HSPopup.init('.js-fancybox');
			});
    </script>



</body>
</html>
