<html>
  <head>
      <title>MyFootball - MyProfile</title>
      <link rel="stylesheet" href="<?php echo e(url ('css/myprofile.css')); ?>" />
      <link rel="icon" type="image/png" href="<?php echo e(url ('images/icon.jpg')); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
        <header>
            <nav>
                <h1 id="nome">
                    MyFootball
                </h1>
                <div id="links">
                    <a class="button" href = '<?php echo e(url("home")); ?>'>Home</a>
                    <a class="button" href='<?php echo e(url("logout")); ?>'>Logout</a>
                </div>
            </nav>
            <div class="overlay"></div>
        </header>


        <div class="box">

            <div class="info">
                <h3>MyFootball - Profilo Utente</h3>
            </div>

            <section class="area">

                <div class="area1">
                    <h4>Name: <span><?php echo e($name); ?></span></h4>
                    <h4>Surname: <span><?php echo e($surname); ?></span></h4>
                    <h4>Username: <span><?php echo e($username); ?></span></h4>
                    <h4>Email: <span><?php echo e($email); ?></span></h4>
                    <h4>Post pubblicati: <span><?php echo e($numeroPost); ?></span> </h4>
                </div>

            </section>

        </div>

  </body>
</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/profile.blade.php ENDPATH**/ ?>