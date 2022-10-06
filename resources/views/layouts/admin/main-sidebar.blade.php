
        <!-- Page Sidebar Start-->
        <div class="page-sidebar">
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{asset('assets/images/dashboard/man.png')}}" alt="#">
                    </div>
                    <h6 class="mt-3 f-14">{{auth()->user()->full_name}}</h6>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="{{route('admin')}}"><i data-feather="home"></i><span>Dashboard</span></a></li>

                    <li><a class="sidebar-header" href="{{route('album.index')}}"><i data-feather="users"></i><span>Albums</span></a></li>

                    <li>
                        <a class="sidebar-header" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i data-feather="log-in">
                            </i><span>Login</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            <input type="hidden" name="admin" value="admin">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->
