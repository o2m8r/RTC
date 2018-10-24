<nav class="nav-extended">
  <div class="nav-wrapper">
    <a href="#" class="brand-logo"> RTC</a>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <div class="nav-content">
        <ul class="tabs tabs-transparent">
          <li class="tab"><a href="profile" onclick="javascript:window.location.href='profile';"><i class="material-icons">person</i> </a></li>
          <li class="tab"><a href="logout" onclick="javascript:window.location.href='logout';"><i class="material-icons">exit_to_app</i></a></li>
        </ul>
      </div>
    </ul>
  </div>
</nav>

<!-- pag mobile view -->
<ul class="sidenav" id="mobile-demo">
  <li class="tab"><a href="profile"><i class="material-icons">person</i> Profile</a></li>
  <li class="tab"><a href="logout"><i class="material-icons">exit_to_app</i> Logout</a></li>
</ul>

<ul id="slide-out" class="sidenav">
  <li><div class="user-view">
    <div class="background">
      <img src="images/office.jpg">
    </div>
    <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
    <a href="#name"><span class="white-text name">John Doe</span></a>
    <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
  </div></li>
  <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
  <li><a href="#!">Second Link</a></li>
  <li><div class="divider"></div></li>
  <li><a class="subheader">Subheader</a></li>
  <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
</ul>
 <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>