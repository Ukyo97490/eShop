<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/fav.png">
	<meta name="description" content="Site de vente en ligne de matériel informatique...">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
    <title>Ma boutique</title>
	<!--CSS-->
    <?= $this->Html->css([
        'FrontTheme./css/linearicons',
        'FrontTheme./css/font-awesome.min',
        'FrontTheme./css/themify-icons',
        'FrontTheme./css/bootstrap',
        'FrontTheme./css/owl.carousel',
        'FrontTheme./css/nice-select',
        'FrontTheme./css/nouislider.min',
        'FrontTheme./css/ion.rangeSlider',
        'FrontTheme./css/ion.rangeSlider.skinFlat',
        'FrontTheme./css/magnific-popup',
        'FrontTheme./css/main',
    ]);?>

</head>

<body>

 <!-- Menu -->
<?= $this->Element('FrontTheme.layout/menu'); ?>

<!-- Flash -->
<?= $this->Flash->render() ?>

<!-- Contenu -->
<?= $this->fetch('content'); ?>

<!-- Footer -->
<?= $this->Element('FrontTheme.layout/footer'); ?>



    <!-- Scripts -->
    <?= $this->Html->script([
        'FrontTheme./js/vendor/jquery-2.2.4.min',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min',
        'FrontTheme./js/vendor/bootstrap.min',
        'FrontTheme./js/jquery.ajaxchimp.min',
        'FrontTheme./js/jquery.nice-select.min',
        'FrontTheme./js/jquery.sticky',
        'FrontTheme./js/nouislider.min',
        'FrontTheme./js/countdown',
        'FrontTheme./js/jquery.magnific-popup.min',
        'FrontTheme./js/owl.carousel.min',

        'https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE',
        'FrontTheme./js/gmaps.min',
        'FrontTheme./js/main',
        'FrontTheme./js/custom'
    ]); ?>
</body>
</html>