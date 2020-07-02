<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

{{--        <div class="nav-item dropdown">--}}
{{--            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                <i>notifications</i><span class="badge">{{count(Auth::user()->unreadNotifications)}}</span>--}}
{{--            </a>--}}

{{--            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--              <ul>--}}
{{--                  <li>--}}
{{--                  @foreach(Auth::user()->unreadNotifications as $notification)--}}
{{--                      @include(snake_case(class_basename()))--}}
{{--                      <a href="#"> {{snake_case(class_basename($notification->type))}}</a>--}}
{{--                  @endforeach--}}
{{--                  </li>--}}
{{--              </ul>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
</nav>
