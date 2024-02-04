      <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item {{(request()->is('home')) ? 'active' : ''}}">
                  <a class="nav-link" href="{{ route('home') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                <li class="nav-item {{(request()->is('deposit')) ? 'active' : ''}}">
                  <a class="nav-link" href="{{ route('deposit') }}" >
                    <span class="nav-link-title">
                      Deposit
                    </span>
                  </a>
                </li>
                <li class="nav-item {{(request()->is('withdraw')) ? 'active' : ''}}">
                  <a class="nav-link" href="{{ route('withdraw') }}" >
                    <span class="nav-link-title">
                      Withdraw
                    </span>
                  </a>
                </li>
                <li class="nav-item {{(request()->is('transfer')) ? 'active' : ''}}">
                  <a class="nav-link" href="{{ route('transfer')  }}" >
                    <span class="nav-link-title">
                      Transfer
                    </span>
                  </a>
                </li>
                <li class="nav-item {{(request()->is('statement')) ? 'active' : ''}}">
                  <a class="nav-link" href="{{ route('statement') }}" >
                    <span class="nav-link-title">
                      Statement
                    </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{ route('logout') }}" >
                    <span class="nav-link-title">
                      Logout
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>
     