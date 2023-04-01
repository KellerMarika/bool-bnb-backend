    <aside class="navigation top-0 bottom-0 start-0 d-flex">
        @vite(['resources/js/dashboardAside.js'])
    
        <ul class=" top-0 start-0 w-100 ps-1 d-flex flex-column h-100">
 

            {{-- HOME NO --}}
            <li id="home " class="list w-100 ">
                <b></b>
                <b></b>
                <a class="p-relative w-100 text-decoration-none " href="{{ $frontendURL }}/">
                    <span class="icon text-cemter pt-2 d-block">
                        <ion-icon class="fs-3" name="home-outline"></ion-icon>
                    </span>
                    <span class="title d-block p-relative ps-3">Home</span>
                </a>
            </li>
            <li id="profile"
                class="  list w-100  d-block   {{ Route::currentRouteName() === 'Admin.dashboard' ? 'active' : '' }} ">
                <b></b>
                <b></b>
                <a class="p-relative w-100 text-decoration-none" href="{{ $backendURL }}/Admin/dashboard">


                    <span class="icon text-cemter pt-2 d-block ">
                        <ion-icon class="fs-3" name="person-outline"></ion-icon>
                    </span>
                    <span class="title d-block p-relative ps-3">Profilo</span>
                </a>
            </li>

            <li id="apartments"
                class="list w-100  {{ Route::currentRouteName() === 'Admin.apartments.index' ? 'active' : '' }} ">
                <b></b>
                <b></b>
                <a class="p-relative w-100 text-decoration-none " href="{{ $backendURL }}/Admin/apartments">
                    <span class="icon text-cemter pt-2 d-block">
                        <ion-icon class="fs-3" name="images-outline"></ion-icon>
                    </span>
                    <span class="title d-block p-relative ps-3">Appartamenti</span>
                </a>
            </li>

            <li id="messages"
                class="list w-100 {{ Route::currentRouteName() === 'Admin.dashboard.messages' ? 'active' : '' }} ">
                <b></b>
                <b></b>
                <a class="p-relative w-100 text-decoration-none " href="{{ $backendURL }}/Admin/dashboard/messages">
                    <span class="icon text-cemter pt-2 d-block">
                        <ion-icon class="fs-3" name="mail-outline"></ion-icon>
                    </span>
                    <span class="title d-block p-relative ps-3">Messaggi</span>
                </a>
            </li>
            {{-- logout link --}}

        </ul>

        <ul class="bottom-0">
            <li  class="" style="margin-left: -5px justify-self-end align-self-end position-relative bottom-0 flex-fill">
                <form class=" " id="logout-form" action="{{ route('logout') }}" method="POST"
                    {{-- class="d-none" --}}>
                    @csrf
                    <button class="btn btn-link p-0 m-0 text-decoration-none">
                        <span class="icon text-cemter pt-2 d-block">
                            <ion-icon class="fs-3" name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title d-block p-relative ps-3 ">Esci</span>
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    {{-- menu --}}
    <div class="toggle">
        <ion-icon name="menu-outline" class="open"></ion-icon>
        <ion-icon name="close-outline" class="close"></ion-icon>
    </div>

