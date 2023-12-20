<header class="main-header">
    <button><a href="{{route('index')}}">🏛 Accueil</a></button>
    <button><a href="{{route('test-vite')}}">Test Vite</a></button>
    <button><a href="{{route('contact')}}">☎️ Contact</a></button>
    <button><a href="{{route('equipes')}}">👨🏻‍💻 Équipes</a></button>

    @auth
        <button><a href="{{route('home')}}">🏡 Home</a></button>
        <button><a href="{{route('test-vite')}}">🧪 Test Vite</a></button>
    @endauth

@guest
        <button><a href="{{route('register')}}">📥 Enregistrement</a></button>
        <button><a href="{{route('login')}}">😎 Connexion</a></button>
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