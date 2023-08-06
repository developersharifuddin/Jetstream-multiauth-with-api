  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center border-bottom border-dark">
          <div class="image">
              @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                  <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                      alt="{{ Auth::user()->name }}" />
              @endif
              <img src="../backend/dist/img/dms.png" class="img" alt="User Image" style="height: 44px; width:auto;">
          </div>
          <div class="info">
              {{-- <a href="/user/profile" class="d-block"> DMS</a> --}}
          </div>
      </div>
      <!-- Sidebar -->
      <div class="sidebar mt-0">
          <!-- Sidebar user panel (optional) -->

          <div class="form-inline mb-4 mt-0">
              <div class="input-group bg-transparent" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar bg-transparent" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar bg-transparent">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
              <div class="sidebar-search-results">
                  <div class="list-group"><a href="#" class="list-group-item">
                          <div class="search-title"><strong class="text-light"></strong>N<strong
                                  class="text-light"></strong>o<strong class="text-light"></strong> <strong
                                  class="text-light"></strong>e<strong class="text-light"></strong>l<strong
                                  class="text-light"></strong>e<strong class="text-light"></strong>m<strong
                                  class="text-light"></strong>e<strong class="text-light"></strong>n<strong
                                  class="text-light"></strong>t<strong class="text-light"></strong> <strong
                                  class="text-light"></strong>f<strong class="text-light"></strong>o<strong
                                  class="text-light"></strong>u<strong class="text-light"></strong>n<strong
                                  class="text-light"></strong>d<strong class="text-light"></strong>!<strong
                                  class="text-light"></strong></div>
                          <div class="search-path"></div>
                      </a></div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ url('admin/dashboard') }}" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              House keeping
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('admin/category') }}" class="nav-link">
                                  <i class="nav-icon fas fa-th"></i>
                                  <p>
                                      Category
                                  </p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{ url('admin/category') }}" class="nav-link">
                                  <i class="nav-icon fas fa-th"></i>
                                  <p>
                                      Product
                                  </p>
                              </a>
                          </li>


                      </ul>
                  </li>


              </ul>
              </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
