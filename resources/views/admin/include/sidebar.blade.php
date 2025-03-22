<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse text-white bg-dark pt-5 p-2">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column nav-pills mb-auto">
            <li class="nav-item">
                <a class="nav-link text-white active" href="{{ route('admin.index') }}">Bosh sahifa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.subjects') }}">Fanlar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="cheatsheet.html">Cheatsheet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="album.html">Album</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="forms.html">Forms</a>
            </li>
            <hr>
            <li class="nav-item ">
                <a class="nav-link px-3 text-white collapsed" data-bs-toggle="collapse" href="#layouts">
                    <span>Tables</span>
                    <span class="ms-auto">
			                  <span class="right-icon">></span>
			                </span>
                </a>
                <div class="collapse" id="layouts" style="">
                    <ul class="navbar-nav ps-3">
                        <li>
                            <a href="tables.html" class="nav-link text-white px-3">
                                <span>Tables</span>
                            </a>
                        </li>
                        <li>
                            <a href="data-tables.html" class="nav-link text-white px-3">
                                <span>Data Tables</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2"><ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.html">
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="404.html">
                        404
                    </a>
                </li>
            </ul>
        </ul>
    </div>
</nav>
