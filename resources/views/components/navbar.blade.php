{{-- @php
    use Illuminate\Support\Facades\Auth;
    $menu = Auth::user()->getUserMenu();
@endphp --}}
<div class="row">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">EVENT</a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars text-light"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false"> CRUD
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{-- @foreach ($menu as $item)
                                <li>
                                    <a class="dropdown-item" href="{{ $item->route }}">{{ $item->name }}</a>
                                </li>
                            @endforeach --}}

                        </ul>
                    </li>
                </ul>
                <!-- Left links -->

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
                    <li class="nav-item text-center mx-2 mx-lg-1">
                        <a class="nav-link" href="/">
                            <div>
                                <i class="fas fa-arrow-right-from-bracket"></i>
                            </div>
                            Se Deconnecter
                        </a>
                    </li>
                </ul>
                <!-- Right links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

</div>
<br />
