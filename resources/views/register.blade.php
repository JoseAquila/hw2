<html><!--localhost/hw2/public/register  -->
    <head>
        <link rel='stylesheet' href="{{url ('css/mysignup.css') }}">
        <script src='{{ url("js/mysignup.js") }}' defer></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{url ('images/icon.jpg') }}">
        <title>MyFootball - Iscriviti</title>
    </head>

    <body>
    <main class="signup">
        <section class='signup'>
            <h1>Inserisci i tuoi dati</h1>
            <form name='signup' method='post' autocomplete="off"  action="{{ route('register') }}">
                @csrf
                <div class="names">
                    <div class="name @error('name') errorj @enderror">
                        <div><label for='name'>Nome</label></div>
                        <div><input type='text' name='name' value='{{ old("name") }}' ></div><!-- old perche se ho qualche dato non inserito correttamente mi faccio stampare il valore precedentemente inserito-->
                        <span>Nome non valido</span>
                    </div>

                    <div class="surname @error('surname') errorj @enderror">
                        <div><label for='surname'>Cognome</label></div>
                        <div><input type='text' name='surname' value='{{ old("surname") }}' ></div>
                        <span>Cognome non valido</span>
                    </div>
                </div>

                <div class="username @error('username') errorj @enderror">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' value='{{ old("username") }}' ></div>
                    <span>Username non valido</span>
                </div>

                <div class="email @error('email') errorj @enderror">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email' value='{{ old("email") }}' ></div>
                    <span>Email non valida</span>
                </div>

                <div class="password @error('password') errorj @enderror">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' value='{{ old("password") }}' ></div>
                    <span>Inserisci almeno 8 caratteri</span>
                </div>

                <div class="confirm_password @error('password') errorj @enderror">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password' value='{{ old("confirm_password") }}' ></div>
                    <span>Le password non coincidono</span>
                </div>

                <div class="allow @error('allow') errorj @enderror"> 
                    <div><input type='checkbox' name='allow' value="1"></div>
                    <div><label for='allow'>Acconsento al trattamento dei dati personali</label></div>
                    <span>Accetta la condizione</span>
                </div>
                <div class="submit">
                    <input type="submit"  value="Registrati" id="submit" {{--disabled--}}>
                </div>
            </form>
            
                <div class="box_signin">
                    Hai già un account? <a href="{{ url('login') }}">Accedi</a>
                </div>
            
        </section>
    </main>
    </body>
</html>