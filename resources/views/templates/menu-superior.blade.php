<nav >
    <div class="nav-wrapper">
        <a href="#" class="brand-logo" id="logo">
            <img src=" {{asset('asset/images/money.png')}}" width="120" height="75" class="d-inline-block align-top" alt="">
        </a>

        <a href="#" data-activates="menu-mobile" class="button-collapse">
            <i class="material-icons">menu</i>
        </a>

        <ul class="right hide-on-med-and-down">

            <li>
                <a href="{{ route('user.index')}}">Usuários</a>
            </li>

            <li>
                <a href="">Instituições</a>
            </li>

            <li>
                <a href="">Grupos</a>
            </li>

        </ul>

        <ul class="side-nav" id="menu-mobile">

            <li>
                <a href="">Usuários</a>
            </li>

            <li>
                <a href="">Instituições</a>
            </li>

            <li>
                <a href="">Grupos</a>
            </li>

        </ul>
    </div>
</nav>
