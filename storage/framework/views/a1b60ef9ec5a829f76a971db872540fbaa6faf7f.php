<html>
  <head>
        <script>
            const BASE_URL = "<?php echo e(url('/')); ?>/";
            const CSRF_TOKEN = '<?php echo e(csrf_token()); ?>'//dove non uso <?php echo csrf_field(); ?>
        </script>
        <title>MyFootball - Home</title>
        <link rel="stylesheet" href="<?php echo e(url ('css/myhome.css')); ?>" />
        <script src='<?php echo e(url("js/myhome.js")); ?>' defer></script>
        <script src='<?php echo e(url("js/apiCat.js")); ?>' defer></script>
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
                    <a class="button" href = '<?php echo e(url("profile")); ?>'>Profilo</a>
                    <a class="button" href='<?php echo e(url("searchView")); ?>'>Cerca i tuoi amici</a>
                    <a class="button" href='<?php echo e(url("logout")); ?>'>Logout</a>
                </div>
            </nav>
            <div class="overlay"></div>
        </header>

    <article>

        <div>
            <img id='casetta' src="<?php echo e(url ('images/home.png')); ?>"/>
            <div id='homepage'>
                Homepage
            </div>
        </div>

        <div id="modal" class="hidden"> <!--  modale per persone a cui piace    -->
            <div class="window">
                <button id="modal_close">Chiudi</button>
                <div class="modal_desc"></div>
                <div id="modal_place">
                </div>
            </div>
        </div>

        <section id='post'>
            
            <a class="button" href = '<?php echo e(url("create_post_view")); ?>'>Nuovo post</a>

        </section>

        <section id="feed" data-source="<?php echo e(route('feed')); ?>">  <!-- qui si caricheranno i post-->
            
                <template id="post_template">

                    <article class="post">

                        <div class="userinfo">
                            <div class="names">
                                <a>
                                    <div class="name"></div>
                                    <div class="username"></div>
                                </a>
                            </div>
                            <div class="time"></div>
                        </div>

                        <div class="text"></div>

                        <div class="actions">
                            <div class="like"><span></span></div>
                            <div class="comment"><span></span></div> 
                        </div>

                        <div class="comments">
                            <div class="past_messages"></div>

                            <div class="comment_form">
                                <form method='post' action="<?php echo e(route('add_comment')); ?>"  autocomplete="off" >
                                    <input type="text" name="comment" maxlength="254" placeholder="Aggiungi un commento..." required="required">
                                    <input type="submit">
                                    <input type="hidden" name="postid">
                                </form>
                            </div>
                        </div>
                    </article>
                </template>
                
        </section>

        <div id="apiBox">
              <h2 id="clicca">CLICCA QUI!</h2>
        </div>

        <section id = 'finalSection'><!--  x ordinare il contenuto -->
        </section>

    </article>

    <footer>
      <p>
      Josè Luis Aquila<br>
      matricola: 1000001097
      </p>
    </footer>

  </body>
</html>



<?php /**PATH C:\xampp\htdocs\hw2\resources\views/home.blade.php ENDPATH**/ ?>