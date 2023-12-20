<header class="main-header">
    <button><a href="{{route('index')}}">🏛 Accueil</a></button>
    <button><a href="{{route('contact')}}">☎️ Contact</a></button>
    @auth
        <!-- Ajout de bouton qui sont disponible uniquement une fois connecté -->
    @endauth

</header>

@guest
    <div class="a-droite">
        <div class="center-image">
            <img class="logo" src="{{url('storage/images/Logo.png') }}" alt="Logo du site">
        </div>
        <button><a href="{{route('register')}}">📥 Enregistrement</a></button>
        <button><a href="{{route('login')}}">😎 Connexion</a></button>
    </div>
@endguest
@auth
    <div class="a-droite">
        {{Auth::user()->name}}
        <button><a href="#" id="logout">Logout</a>
        </button>
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