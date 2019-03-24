<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/images/logoMain.png" type="image/x-icon">
    <title>Блог Светланы Чечиной</title>

    <?php include(ROOT.'/view/layout/styles.php')?>
    <!--@yield('styles')-->


</head>

<body>

<?php include(ROOT.'/view/layout/header.php')?>
<?php echo $content ?>

<!--@yield('content')-->
<?php include(ROOT.'/view/layout/footer.php')?>

<?php include(ROOT.'/view/layout/scripts.php')?>
<!--@yield('scripts')-->

</body>



</html>