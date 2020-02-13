<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/top">掲示板</a>
        <ul class="navbar-nav mr-auto">
            @if (true == Auth::check())
                @php
                    $user = Auth::user();
                @endphp
            @endif
        </ul>
        @if (true == Auth::check())
            <form class="form-inline my-lg-0 ml-auto">
                <a class="btn btn-outline-primary" href={{route('logout')}}>ログアウト</a>
            </form>
        @else
            <form class="form-inline my-lg-0 ml-auto">
                <a class="btn btn-outline-primary" href={{route('login.show')}}>ログイン</a>
            </form>
        @endif
    </nav>
</header>
