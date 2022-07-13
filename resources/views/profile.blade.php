<html>
  <head>
      <title>MyFootball - MyProfile</title>
      <link rel="stylesheet" href="{{url ('css/myprofile.css') }}" />
      <link rel="icon" type="image/png" href="{{url ('images/icon.jpg') }}">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
        <header>
            <nav>
                <h1 id="nome">
                    MyFootball
                </h1>
                <div id="links">
                    <a class="button" href = '{{ url("home") }}'>Home</a>
                    <a class="button" href='{{ url("logout") }}'>Logout</a>
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
                    <h4>Name: <span>{{ $name }}</span></h4>
                    <h4>Surname: <span>{{ $surname }}</span></h4>
                    <h4>Username: <span>{{ $username }}</span></h4>
                    <h4>Email: <span>{{ $email }}</span></h4>
                    <h4>Post pubblicati: <span>{{ $numeroPost }}</span> </h4>
                </div>

            </section>

        </div>

  </body>
</html>