<html>
    <head>
        <script>
            const BASE_URL = "<?php echo e(url('/')); ?>/";
            const CSRF_TOKEN = '<?php echo e(csrf_token()); ?>'
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='<?php echo e(url("css/search.css")); ?>'>
        <script src='<?php echo e(url("js/search.js")); ?>' defer></script>
        <link rel="icon" type="image/png" href="<?php echo e(url ('images/icon.jpg')); ?>">
    </head>
    
    <title>MyFootball - Cerca amici</title>

    <body>
        <header>
            <nav>
                <h1 id="nome">
                    MyFootball
                </h1>
                <div id="links">
                    <a class="button" href = "<?php echo e(url ('home')); ?>">Home</a>
                    <a class="button" href="<?php echo e(url ('logout')); ?>">Logout</a>
                </div>
            </nav>
            <div class="overlay"></div>
        </header>

        <div class="container">

            <div class="search-container">
                <input type="text" class="search_bar" id="username_search" placeholder="Cerca per username" name="search" onkeyup="checkUsername()">    <!-- si attiva al riascio-->
                <button class="search-button" id="search_button" onclick="fetchPosts()" value='Cerca' disabled>Cerca</button>
            </div>

            <div id="posts" class="posts-container"></div>
        </div>
    </body>
</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/searchView.blade.php ENDPATH**/ ?>