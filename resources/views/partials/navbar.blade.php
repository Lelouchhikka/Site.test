<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            HALYK
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
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
                        <li> <a href="{{ route('brands.index') }}" class="nav-link" >
                                {{__("Admin panel for brands")}} </a>
                        </li>
                        <li> <a href="{{ route('products.index') }}" class="nav-link" >
                                {{__("Admin panel for products")}}</a>
                        </li>
                        <li> <a href="{{ route('categories.index') }}" class="nav-link" >
                                {{__("Admin panel for categories")}} </a>
                        </li>
                    @endif

                    <li href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Выйти</li>

                    <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>

                @endguest

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"
                    >
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                        <ul class="list-group" style="margin: 20px;">
                            @include('partials.cart-drop')
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
