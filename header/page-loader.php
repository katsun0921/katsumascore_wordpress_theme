	<?php if (get_theme_mod( 'progression_studios_page_transition', 'transition-off-pro') == "transition-on-pro") : ?><div id="page-loader-pro">
		<div id="center-loader">
		
		<?php if (get_theme_mod( 'progression_studios_transition_loader') == "cube-grid-pro") : ?>	
	  	 <div class="sk-cube-grid">
	  		 <div class="sk-cube sk-cube1"></div>
	  		 <div class="sk-cube sk-cube2"></div>
	  		 <div class="sk-cube sk-cube3"></div>
	  		 <div class="sk-cube sk-cube4"></div>
	  		 <div class="sk-cube sk-cube5"></div>
	  		 <div class="sk-cube sk-cube6"></div>
	  		 <div class="sk-cube sk-cube7"></div>
	  		 <div class="sk-cube sk-cube8"></div>
	  		 <div class="sk-cube sk-cube9"></div>
	  	 </div>
		 <?php endif ?>
		 
		 <?php if (get_theme_mod( 'progression_studios_transition_loader') == "rotating-plane-pro") : ?>	
		 <div class="sk-rotating-plane"></div>
		 <?php endif ?>
		 
		 <?php if (get_theme_mod( 'progression_studios_transition_loader') == "double-bounce-pro") : ?>	
		<div class="sk-double-bounce">
			<div class="sk-child sk-double-bounce1"></div>
			<div class="sk-child sk-double-bounce2"></div>
	 	</div>
		 <?php endif ?>
		 
		 
		  <?php if (get_theme_mod( 'progression_studios_transition_loader') == "sk-rectangle-pro") : ?>	
		 <div class="sk-wave">
			 <div class="sk-rect sk-rect1"></div>
			 <div class="sk-rect sk-rect2"></div>
			 <div class="sk-rect sk-rect3"></div>
			 <div class="sk-rect sk-rect4"></div>
			 <div class="sk-rect sk-rect5"></div>
		 </div>
		 <?php endif ?>
		 
		 
		 <?php if (get_theme_mod( 'progression_studios_transition_loader') == "sk-cube-pro") : ?>	
		 <div class="sk-wandering-cubes">
			 <div class="sk-cube sk-cube1"></div>
			 <div class="sk-cube sk-cube2"></div>
		 </div>
		  <?php endif ?>
		 
		
		<?php if (get_theme_mod( 'progression_studios_transition_loader') == "sk-chasing-dots-pro") : ?>	
		 <div class="sk-chasing-dots">
			 <div class="sk-child sk-dot1"></div>
			 <div class="sk-child sk-dot2"></div>
		 </div>
		  <?php endif ?>
		 
		 <?php if (get_theme_mod( 'progression_studios_transition_loader') == "sk-circle-child-pro") : ?>	
		 <div class="sk-circle">
			 <div class="sk-circle1 sk-child"></div>
			 <div class="sk-circle2 sk-child"></div>
			 <div class="sk-circle3 sk-child"></div>
			 <div class="sk-circle4 sk-child"></div>
			 <div class="sk-circle5 sk-child"></div>
			 <div class="sk-circle6 sk-child"></div>
			 <div class="sk-circle7 sk-child"></div>
			 <div class="sk-circle8 sk-child"></div>
			 <div class="sk-circle9 sk-child"></div>
			 <div class="sk-circle10 sk-child"></div>
			 <div class="sk-circle11 sk-child"></div>
			 <div class="sk-circle12 sk-child"></div>
		 </div>
		  <?php endif ?>
		  
  		 <?php if (get_theme_mod( 'progression_studios_transition_loader') == "sk-folding-cube") : ?>	
 	    <div class="sk-folding-cube">
 	      <div class="sk-cube1 sk-cube"></div>
 	      <div class="sk-cube2 sk-cube"></div>
 	      <div class="sk-cube4 sk-cube"></div>
 	      <div class="sk-cube3 sk-cube"></div>
 	    </div>
  		  <?php endif ?>
		  
		  
   	<?php if (get_theme_mod( 'progression_studios_transition_loader', 'circle-loader-pro') == "circle-loader-pro") : ?>	
  	   <div class="progression-studios-spinner"></div>
   	<?php endif ?>
		 

			 <?php if (get_theme_mod( 'progression_studios_loading_text_new')) : ?><div id="loading-pro"><?php echo esc_attr(get_theme_mod('progression_studios_loading_text_new')); ?><span>.</span><span>.</span><span>.</span></div><?php endif ?>
			 
		</div>
	</div><?php endif ?>