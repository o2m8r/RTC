<nav class="nav-extended">
  <div class="nav-wrapper container">
    <a href="#" class="brand-logo"> RTC</a>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a class="active" href="ordered" onclick="javascript:window.location.href='ordered';"><i class="material-icons">shopping_cart</i> <span class="new badge blue" style="position: absolute; top: 1px;">0</span></a></li>
      <li><a href="profile" onclick="javascript:window.location.href='profile';"><i class="material-icons">person</i> </a></li>
      <li><a href="logout" onclick="javascript:window.location.href='logout';"><i class="material-icons">exit_to_app</i></a></li>
    </ul>
  </div>
</nav>

<!-- pag mobile view -->
<ul class="sidenav" id="mobile-demo">
  <li class="tab"><a class="active" href="ordered"><i class="material-icons">shopping_cart</i> Orders <span class="new badge">4</span></a></li>
  <li class="tab"><a href="profile"><i class="material-icons">person</i> Profile</a></li>
  <li class="tab"><a href="logout"><i class="material-icons">exit_to_app</i> Logout</a></li>
</ul>