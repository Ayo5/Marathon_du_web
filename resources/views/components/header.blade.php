<header class="main-header">
    <a href="{{route('index')}}" class="header-logo"><img src="{{url('storage/images/logo_reddrasil_blanc.png')}}" style="max-width: 30%;" alt="Logo">Readdrasil</a>
    <a href="{{route('index')}}">Accueil</a>
    <a href="{{route('equipes')}}">Équipe</a>
    <a href="{{route('test-vite')}}">A propos</a>
    <a href="{{route('contact')}}">Contact</a>

    @auth
        <a href="{{route('home')}}">Profil</a>
    @endauth

@guest
        <a href="{{route('register')}}">S'enregistrer </a>
        <a href="{{route('login')}}">Se connecter</a>
@endguest
@auth
    <div class="a-droite">
        <a href="#" id="logout">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <script>
        document.getElementById('logout').addEventListener("click", (event) => {
            document.getElementById('logout-form').submit();
        });
    </script>
@endauth
</header>