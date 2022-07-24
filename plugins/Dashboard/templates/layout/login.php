<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Administration du site ecommerce</title>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <?= $this->Html->css([
        'Dashboard./css/sb-admin-2.min'
    ]); ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Contenu -->
        <?= $this->fetch('content'); ?>
    </div>

    <!-- Scripts -->
    <?= $this->Html->script([
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js',
        'Dashboard./js/jquery.min',
        'Dashboard./js/bootstrap.bundle.min',
        'Dashboard./js/jquery.easing.min',
        'Dashboard./js/sb-admin-2.min'
    ]); ?>
</body>
</html>