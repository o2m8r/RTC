<div class="carousel carousel-slider center">
  <div class="carousel-fixed-item center">
    <a class="btn waves-effect white grey-text darken-text-2">button</a>
  </div>
  <div class="carousel-item red white-text" href="#one!">
    <h2>First Panel</h2>
    <p class="white-text">This is your first panel</p>
  </div>
  <div class="carousel-item amber white-text" href="#two!">
    <h2>Second Panel</h2>
    <p class="white-text">This is your second panel</p>
  </div>
  <div class="carousel-item green white-text" href="#three!">
    <h2>Third Panel</h2>
    <p class="white-text">This is your third panel</p>
  </div>
  <div class="carousel-item blue white-text" href="#four!">
    <h2>Fourth Panel</h2>
    <p class="white-text">This is your fourth panel</p>
  </div>
</div>

<div>
  <hr>

  <center id="c" class="section scrollspy">
    <i class="material-icons" style="font-size: 50pt;">contact_phone</i>
    <h3>CONTACT</h3>
    <br><br><br><br><br>
  </center>
  
  <hr>

  <center id="a" class="section scrollspy">
    <i class="material-icons" style="font-size: 50pt;">info</i>
    <h3>ABOUT</h3>
    <br><br><br><br><br>
  </center>

  <hr>
</div>

<!-- START LOGIN MODAL -->
<div id="loginModal" class="modal">
  <div class="modal-content">
    <h4>LOGIN</h4>
    <div class="row">
      <?php echo form_open('c_authentication/login', array('class' => 'col s12')); ?>

        <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="email" class="validate" required>
          <label for="icon_prefix">Email</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_telephone" type="password" class="validate" required>
          <label for="icon_telephone">Password</label>
        </div>
      </div>
        <div class="row">
          <div class="col s12">
            <button class="btn waves-effect waves-light right" type="submit" name="action">Login
              <i class="material-icons right">send</i>
            </button>
          </div>
        </div>

      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<!-- END LOGIN MODAL -->

<!-- START INQUIRE MODAL -->
<?php echo form_open('c_authentication/inquire'); ?>
<div id="inquireModal" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>INQUIRE</h4>
    
    <div class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">person</i>
          <input id="full_name" type="text" class="validate" required>
          <label for="full_name">Full Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">contact_mail</i>
          <input id="email" type="email" class="validate" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">business</i>
          <input id="institution" type="text" class="validate" required>
          <label for="institution">Institution</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">add_location</i>
          <input id="institution_address" type="text" class="validate" required>
          <label for="institution_address">Institution Address</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">perm_device_information</i>
          <input id="mobile" type="text" class="validate">
          <label for="mobile">Mobile</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">call</i>
          <input id="landline" type="text" class="validate">
          <label for="landline">Landline</label>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <center>
      <button class="btn waves-effect waves-green right" type="submit" name="action" style="width: 100%;">Inquire
      </button>
    </center>
  </div>
</div>
<?php echo form_close(); ?>
<!-- END INQUIRE MODAL -->

<script type="text/javascript">
  // smooth scroll
  $(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });

  // for carousel properties
  var carousel = $('.carousel.carousel-slider').carousel({
                                            fullWidth: true,
                                            indicators: true
                                          })

  var instance = M.Carousel.getInstance(carousel);
  setInterval(function(){ instance.next(); }, 2500);

</script>