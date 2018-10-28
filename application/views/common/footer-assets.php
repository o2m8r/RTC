	<script> M.AutoInit(); // materialize initialize </script>
	<!-- CSS3 Animate IT JS -->
	<script src="<?php echo base_url(); ?>assets/css3-animate-it-master/js/css3-animate-it.js"></script>
  	
  	<script>

  		$(document).ready(function() {
		    // for input masks
		    $(":input").inputmask();
		});
		
  		window.onload = function(){
  			document.getElementById('<?php echo str_replace(' ', '-', strtolower($title)); ?>').className = 'active';
  		}
  	</script>
</body>

</html>