<html><!--localhost/hw2/public/register  -->
    <head>
        <link rel='stylesheet' href="<?php echo e(url ('css/mysignup.css')); ?>">
        <script src='<?php echo e(url("js/mysignup.js")); ?>' defer></script>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="<?php echo e(url ('images/icon.jpg')); ?>">
        <title>MyFootball - Iscriviti</title>
    </head>

    <body>
    <main class="signup">
        <section class='signup'>
            <h1>Inserisci i tuoi dati</h1>
            <form name='signup' method='post' autocomplete="off"  action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <div class="names">
                    <div class="name <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> errorj <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <div><label for='name'>Nome</label></div>
                        <div><input type='text' name='name' value='<?php echo e(old("name")); ?>' ></div><!-- old perche se ho qualche dato non inserito correttamente mi faccio stampare il valore precedentemente inserito-->
                        <span>Nome non valido</span>
                    </div>

                    <div class="surname <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> errorj <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <div><label for='surname'>Cognome</label></div>
                        <div><input type='text' name='surname' value='<?php echo e(old("surname")); ?>' ></div>
                        <span>Cognome non valido</span>
                    </div>
                </div>

                <div class="username <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> errorj <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' value='<?php echo e(old("username")); ?>' ></div>
                    <span>Username non valido</span>
                </div>

                <div class="email <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> errorj <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email' value='<?php echo e(old("email")); ?>' ></div>
                    <span>Email non valida</span>
                </div>

                <div class="password <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> errorj <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' value='<?php echo e(old("password")); ?>' ></div>
                    <span>Inserisci almeno 8 caratteri</span>
                </div>

                <div class="confirm_password <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> errorj <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password' value='<?php echo e(old("confirm_password")); ?>' ></div>
                    <span>Le password non coincidono</span>
                </div>

                <div class="allow <?php $__errorArgs = ['allow'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> errorj <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"> 
                    <div><input type='checkbox' name='allow' value="1"></div>
                    <div><label for='allow'>Acconsento al trattamento dei dati personali</label></div>
                    <span>Accetta la condizione</span>
                </div>
                <div class="submit">
                    <input type="submit"  value="Registrati" id="submit" >
                </div>
            </form>
            
                <div class="box_signin">
                    Hai già un account? <a href="<?php echo e(url('login')); ?>">Accedi</a>
                </div>
            
        </section>
    </main>
    </body>
</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/register.blade.php ENDPATH**/ ?>