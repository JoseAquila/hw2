<html>
    <head>
        <link rel='stylesheet' href="{{url ('css/mysignup.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{url ('images/icon.jpg') }}">
    </head>
    <title>MyFootball - Accedi</title>
    <body>
        <main class="login">
        
            @if(isset($old_username))
                <div class="errorj">
                    <span>Credenziali non valide</span>
                </div>
            @endif

            <h1>Benvenuto su MyFootball</h1>
                <form name='login' method='post' autocomplete="off" action="{{ route('login') }}">
                @csrf 
                    <div class="username">
                        <div><input type='text' name='username' placeholder='Username' value='{{ old("username") }}' ></div>
                    </div>

                    <div class="password">
                        <div><input type='password' name='password' placeholder='Password' ></div>
                    </div>

                    <div>
                        <button type='submit'>Accedi</button>
                    </div>
                </form>
                <div class="box_signup">Non hai un account? <a href='{{ url("register") }}' >Registrati</a>
        </main>
    </body>
</html>