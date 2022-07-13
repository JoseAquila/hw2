<html>
  <head>
        <title>MyFootball - Campionati</title>
        <script>
            const BASE_URL = "<?php echo e(url('/')); ?>/";
        </script>
        <link rel="stylesheet" href="<?php echo e(url ('css/ApiCampionati.css')); ?>" />
        <script src='<?php echo e(url("js/ApiCampionati.js")); ?>' defer></script>
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
                    <a class="button" href='<?php echo e(url("home")); ?>'>Home</a>
                    <a class="button" href='<?php echo e(url("logout")); ?>'>Logout</a>
                </div>
            </nav>
            <div class="overlay"></div>
        </header>
    
        <section>

        <article id="containerCampionato">
                

                <form id="formCampionati">
                  <div>
                    Stagione
                    <select name = 'stagione' id='stagione'>
                      <option value="2021">2021-22</option>
                      <option value="2020">2020-21</option>
                      <option value="2019">2019-20</option>
                      <option value="2018">2018-19</option>
                      <option value="2017">2017-18</option>
                      <option value="2016">2016-17</option>
                      <option value="2015">2015-16</option>
                      <option value="2014">2014-15</option>
                    </select>
                  </div>
        
                    Seleziona la nazione di cui vuoi visualizzare il campionato :	
                    <select name = 'tipo' id='tipo'>
                        <option value="ita.1">Italia</option>
                        <option value="eng.1">Inghilterra</option>
                        <option value="ger.1">Germania</option>
                        <option value="esp.1">Spagna</option>
                        <option value="fra.1">Francia</option>
                    </select>
        
                  <input type="submit" value="Seleziona">
                    
                    
                </form>
        
                <article id="viewCampionati">
        
                </article>
        
              </article>

        </section>

  </body>
</html>



<?php /**PATH C:\xampp\htdocs\hw2\resources\views/campionati.blade.php ENDPATH**/ ?>