
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="color: lightgreen;">
            My Halyk
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <div class="input-group">
                <li>
                <div class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
                </div>
                </li>
                @if(session()->get('locale')=='ru')
                    {{(App::setLocale('ru'))}}
                @endif
                <li> <a href="{{ route('Ru') }}" class="nav-link" > {{__("Ru")}}</a> </li>
                <li> <a href="{{ route('En') }}" class="nav-link" > {{__("En")}}</a> </li>
                @guest
                    <li >
                    <a href="{{ route('login') }}" class="nav-link">
                        {{__("Login")}} </a>
                    </li>
                    <li> <a href="{{ route('register') }}" class="nav-link" >
                            {{__("Register")}}</a>
                    </li>
                @else

                    @if(Auth::user()->usertype==='admin')
                        <li> 
                            <h4>{{Auth::user()->username}}</h4>
                        </li>
                    @endif

                    <li href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Выйти</li>

                    <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>

                @endguest

            </ul>
        </div>
    </div>
</nav>
