  <!-- sidebar @s -->
  <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
      <div class="nk-sidebar-element nk-sidebar-head">
          <div class="nk-sidebar-brand">
              <a href="{{url('/dashboard')}}" class="logo-link nk-sidebar-logo">
                    <img class="logo-light logo-img" src="{{ url('assets') }}/dashlite/images/logo.png" srcset="{{ url('assets') }}/dashlite/images/logo2x.png 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{ url('assets') }}/dashlite/images/logo-dark.png" srcset="{{ url('assets') }}/dashlite/images/logo-dark2x.png 2x" alt="logo-dark">
              </a>
          </div>
          <div class="nk-menu-trigger mr-n2">
              <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
              <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
          </div>
      </div><!-- .nk-sidebar-element -->
      <div class="nk-sidebar-element">
          <div class="nk-sidebar-content">
              <div class="nk-sidebar-menu" data-simplebar>
                  <ul class="nk-menu">
                      <li class="nk-menu-item">
                          <a href="{{url('/dashboard')}}" class="nk-menu-link">
                              <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                              <span class="nk-menu-text">Dashboard</span>
                          </a>
                      </li>
                      <!--orders_start_route-->
                      <!-- .nk-menu-item -->
                      <li class="nk-menu-item has-sub">
                          <a href="#" class="nk-menu-link nk-menu-toggle">
                              <span class="nk-menu-icon"><em class="icon ni ni-img"></em></span>
                              <span class="nk-menu-text">Orders</span>
                          </a>
                          <ul class="nk-menu-sub">
                              @if(auth()->user()->type=='sender')
                              <li class="nk-menu-item">
                                  <a href="{{url('sender/orders')}}" class="nk-menu-link"><span class="nk-menu-text">My Orders</span></a>
                              </li>
                              <li class="nk-menu-item">
                                  <a href="{{url('sender/orders/create')}}" class="nk-menu-link"><span class="nk-menu-text">create</span></a>
                              </li>
                              @else
                              <li class="nk-menu-item">
                                  <a href="{{url('biker/orders/suggested')}}" class="nk-menu-link"><span class="nk-menu-text">To-do</span></a>
                              </li>
                              <li class="nk-menu-item">
                                  <a href="{{url('biker/orders')}}" class="nk-menu-link"><span class="nk-menu-text">My Orders</span></a>
                              </li>
                              @endif
                          </ul><!-- .nk-menu-sub -->
                      </li><!-- .nk-menu-item -->

                  </ul><!-- .nk-menu -->
              </div><!-- .nk-sidebar-menu -->
          </div><!-- .nk-sidebar-content -->
      </div><!-- .nk-sidebar-element -->
  </div>
  <!-- sidebar @e -->
