<style>
  .justify{
    text-align: justify;
  }

  .cursor{
    cursor: pointer;
  }

  .default-pic{
    height: 425px;
    width: 423px;
  }
</style>

<div class="container">
  <div class="row">
    <div class="col m6 s12">
      <img class="responsive-img" src="assets/images/lab3.png" alt="">
    </div>

    <div class="col m6 s12">
      <h5>
        RTC Laboratory Services and Supply House
      </h5>

      <p class="justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus repellat fugit natus veniam corrupti distinctio eius, debitis id sit, magni. At id obcaecati perferendis, impedit ab, nemo quibusdam accusamus inventore consectetur molestias rem accusantium aperiam cum alias facere, ullam veritatis et repellat commodi, eius tempora doloremque. Quas possimus tenetur, modi omnis, consequatur, pariatur eos eum illum doloribus, neque ab et? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae provident mollitia ipsa saepe quidem sint, harum. Suscipit animi distinctio numquam.
      </p>
    </div>
  </div>
</div>

<div class="container section scrollspy" id="c" style="padding-top: 50px;">
<h4>
  <strong>
    TOOLS
  </strong>
</h4>
  <div class="row">
    <div class="col s12 m4 materialboxed cursor">
      <div class="card responsive-img">
        <div class="card-image">
          <img class="default-pic" src="assets/images/tools/funnel.jpg">
          <span class="card-title black-text">FUNNEL</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m4 materialboxed cursor">
      <div class="card">
        <div class="card-image responsive-img">
          <img class="default-pic" src="assets/images/tools/beaker.jpg">
          <span class="card-title black-text">BEAKER</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m4 materialboxed cursor">
      <div class="card">
        <div class="card-image responsive-img">
          <img class="default-pic" src="assets/images/tools/test_tube.jpg">
          <span class="card-title black-text">TEST TUBE</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>
  </div>


<h4>
  <strong>
    CHEMICALS
  </strong>
</h4>
  <div class="row">
    <div class="col s12 m4 materialboxed cursor">
      <div class="card responsive-img">
        <div class="card-image">
          <img class="default-pic" src="assets/images/chemicals/acetone.jpg">
          <span class="card-title black-text">ACETONE</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m4 materialboxed cursor">
      <div class="card">
        <div class="card-image responsive-img">
          <img class="default-pic" src="assets/images/chemicals/petroleum_ether.jpg">
          <span class="card-title black-text">PETROLEUM ETHER</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m4 materialboxed cursor">
      <div class="card">
        <div class="card-image responsive-img">
          <img class="default-pic" src="assets/images/chemicals/toluene.jpg">
          <span class="card-title black-text">TOULENE</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>
  </div>

<h4>
  <strong>
    EQUIPMENTS
  </strong>
</h4>
  <div class="row">
    <div class="col s12 m4 materialboxed cursor">
      <div class="card responsive-img">
        <div class="card-image">
          <img class="default-pic" src="assets/images/equipment/bunsen_burner.jpg">
          <span class="card-title black-text">BUNSEN BURNER</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m4 materialboxed cursor">
      <div class="card">
        <div class="card-image responsive-img">
          <img class="default-pic" src="assets/images/equipment/barometer.png">
          <span class="card-title black-text">BAROMETER</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>

    <div class="col s12 m4 materialboxed cursor">
      <div class="card">
        <div class="card-image responsive-img">
          <img class="default-pic" src="assets/images/equipment/microscope.jpg">
          <span class="card-title black-text">MICROSOPE</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- START LOGIN MODAL -->
<div id="loginModal" class="modal">
  <div class="modal-content">
    <h4>LOGIN</h4>
    <div class="row">
      <?php echo form_open('c_authentication/login', array('class' => 'col s12')); ?>

        <div class="row">
        <div class="input-field col s12 col m12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="email" class="validate" required>
          <label for="icon_prefix">Email</label>
        </div>
        <div class="input-field col s12 col m12">
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