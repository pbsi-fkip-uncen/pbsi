<footer class="footer">
	<div class="container">
		<div class="columns is-multiline is-mobile">
		<div class="column">
			<p>Email us: <a class="footer" href="mailto:<?=$setting->getProdiEmail();?>"><?=$setting->getProdiEmail();?></a></p>
		</div>
		<?php if($setting->getPhone() != null) { ?>
		<div class="column">
			<p>Call us: <a class="footer" href="tel:<?=$setting->getPhone();?>"><?=$setting->getPhone();?></a></p>
		</div>
		<?php } ?>
		<?php if($setting->getFacebook() != null) { ?>
		<div class="column">
			<p>Facebook <a class="footer" href="<?=$setting->getFacebook();?>"><?=$setting->getFacebook();?></a></p>
		</div>
		<?php } ?>
		<!-- <div class="column">
			<p>&copy; <?= date('Y'); ?>. site by <a href="http://pbsi.fkip.uncen.ac.id" target="_blank" class="is-yellow-text bordered">PBSI</a></p>
		</div> -->
		</div>
	</div>
</footer>
	
<script src="assets/js/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="assets/js/clipboard.min.js"></script>
<script src="assets/js/responsiveslides.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.4.3/plyr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="assets/js/bulma.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="assets/js/baguetteBox.js" async></script>
<script type="text/javascript" src="assets/js/main.js"></script>

</body>
</html>