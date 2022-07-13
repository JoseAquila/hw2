<html>  
    <head>
      <link rel="stylesheet" href="<?php echo e(url ('css/create_post.css')); ?>" />
      <script src='<?php echo e(url("js/create_post.js")); ?>' defer></script>
      <link rel="icon" type="image/png" href="<?php echo e(url ('images/icon.jpg')); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>MyFootball - New post</title>
    </head>
    
    <body>
        <header>
            <nav>
                <h1 id="nome">
                    MyFootball
                </h1>
                <div id="links">
                    <a class="button" href='<?php echo e(url("home")); ?>'>MyHome</a>
                    <a class="button" href='<?php echo e(url("logout")); ?>'>Logout</a>
                </div>
            </nav>
            <div class="overlay"></div>
        </header>

        <section id="container">
                <div id="newpost">
                    <form class = 'scelta'  autocomplete="off" data-route="<?php echo e(route('create_post')); ?>">
                        <h4>Condividi qualcosa su MyHome con i tuoi amici</h4>
                        <div class="think"><button id="think"> Scrivi post</button></div>
                    </form>
                        <div id='pensiero' class='hidden'>
                            <form class = 'invia_post' method='post' action="<?php echo e(route('create_post')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <textarea name="text"></textarea>
                                    <input type="submit" value='Pubblica'>
                            </form>
                        </div>
                    <div id="dispatch_result_success" class="hidden">
                        <span>Post salvato con successo</span><br>
                        <button id="newpost_success">Nuovo post</button><br>
                        <a href='<?php echo e(url("home")); ?>'>Vai alla home</a>
                    </div>
                    <div id="dispatch_result_fail" class="hidden">
                        <span>Errore nella creazione del post</span><br>
                        <a class="button_fail" href='<?php echo e(url("create_post")); ?>'>Riprova</a>
                        <a class="button_fail" href='<?php echo e(url("home")); ?>'>MyHome</a>
                    </div>
                </div>
        </section>
    </body>
</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/create_post.blade.php ENDPATH**/ ?>