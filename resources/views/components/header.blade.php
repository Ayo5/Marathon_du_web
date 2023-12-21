<header class="main-header">
    <div class="header-logo">
        <img src="/images/logo_reddrasil_blanc.png" style="width: 10%;" >
        <a href="{{route('index')}}">Readdrasil</a>
    </div>
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
        <a href="{{route('histoires.create')}}" class="header-story">Nouvelle Histoire</a>
        {{Auth::user()->name}}
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