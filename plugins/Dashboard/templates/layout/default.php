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
        'Dashboard./css/sb-admin-2.min',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css'
    ]); ?>

</head>

<body id="page-top">
    <div id="wrapper">
        
        <!-- Menu -->
        <?= $this->Element('Dashboard.layout/menu'); ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <div class="container-fluid">

                    <!-- Flash -->
                    <?= $this->Flash->render() ?>

                    <!-- Contenu -->
                    <?= $this->fetch('content'); ?>

                </div>

            </div>

            <!-- Footer -->
            <?= $this->Element('Dashboard.layout/footer'); ?>

        </div>
    </div>

    <!-- Scripts -->
    <?= $this->Html->script([
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js',
        'Dashboard./js/jquery.min',
        'Dashboard./js/bootstrap.bundle.min',
        'Dashboard./js/jquery.easing.min',
        'Dashboard./js/sb-admin-2.min',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js',
        'Dashboard./js/custom'
    ]); ?>
</body>
</html>