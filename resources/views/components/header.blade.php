<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="/">
      TicketMaster
    </a>

    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-success" href="/newEvents">New Events</a>
        </li>
      </ul>
      <!-- Left links -->
    
      <div class="d-flex align-items-center">
        <button data-mdb-ripple-init type="button" class="btn btn-link px-3 me-2" style="text-decoration: none">
          Accounts
        </button>
        <button data-mdb-ripple-init type="button" class="btn btn-primary me-3">
          Add Account
        </button>
      </div>
    </div>

  </div>

</nav>