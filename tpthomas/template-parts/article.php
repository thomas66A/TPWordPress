<?php 
    $content = get_the_content();
    $thumb_url = get_the_post_thumbnail(null, 'medium'); 
    $permalink = get_the_permalink();
?>
<div class='flex'>
    
    <div class='content-article'>
    <div class="blocDePage" id="blocDePage2">				
				<div class="imgChat">  
					<span><?= $thumb_url; ?></span> 
				</div>
				<div class="contentChat">
					<p>
						<h1><?php echo $theTitle; ?></h1>
						<?php echo $content; ?>
					</p>
				</div>
				<div class="dsb" id="dsb2">
					<?php dynamic_sidebar();?>
				</div>
		   </div>
		   <?php include (TEMPLATEPATH . '/dispositionWidget.php'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<script>
				var local = localStorage.getItem('cote');
				console.log(local);
				if(local == 0){
					document.getElementById("dsb2").style.display="none";
				}
				else if(local == 1){
					document.getElementById("blocDePage2").style.flexDirection="initial";
				}
				else if(local == 2){
					document.getElementById("blocDePage2").style.flexDirection="row-reverse";
				}
				else{
					document.getElementById("blocDePage2").style.flexDirection="initial";
				}
			
			</script>
        <!-- <p class='lesArticles'><?= $thumbnail ?> <?= $content ?> </p> -->
   
    </div>

</div>