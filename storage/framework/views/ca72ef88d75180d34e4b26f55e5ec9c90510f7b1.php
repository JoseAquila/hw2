<html>
    <head>
        <link rel='stylesheet' href="<?php echo e(url ('css/mysignup.css')); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="icon" type="image/png" href="<?php echo e(url ('images/icon.jpg')); ?>">
    </head>
    <title>MyFootball - Accedi</title>
    <body>
        <main class="login">
        
            <?php if(isset($old_username)): ?>
                <div class="errorj">
                    <span>Credenziali non valide</span>
                </div>
            <?php endif; ?>

            <h1>Benvenuto su MyFootball</h1>
                <form name='login' method='post' autocomplete="off" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?> 
                    <div class="username">
                        <div><input type='text' name='username' placeholder='Username' value='<?php echo e(old("username")); ?>' ></div>
                    </div>

                    <div class="password">
                        <div><input type='password' name='password' placeholder='Password' ></div>
                    </div>

                    <div>
                        <button type='submit'>Accedi</button>
                    </div>
                </form>
                <div class="box_signup">Non hai un account? <a href='<?php echo e(url("register")); ?>' >Registrati</a>
        </main>
    </body>
</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/login.blade.php ENDPATH**/ ?>