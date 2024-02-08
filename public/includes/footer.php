<footer class="footer bg-blue-light">
	<div class="container-footer">
		<div class="columns is-multiline is-mobile">
			<div class="column is-3-tablet is-6-mobile">
				<a class="footer" href="home">
					<img src="<?= $setting->getProdiIcon()->getFile()->getUrl(); ?>" />
				</a>
				<div>
					<?= date('Y') ?>	FKIP PBSI UNCEN All Rights Reserved. Published by <a
						href="http://pbsi.fkip.uncen.ac.id" target="_blank">PBSI FKIP UNCEN</a>
				</div>
			</div>
			<div class="column is-3-tablet is-6-mobile">
				<p>Kontak:</p>
				<p>Pos Elektronik: <a class="footer" href="mailto:<?= $setting->getProdiEmail(); ?>">
						<?= $setting->getProdiEmail(); ?>
					</a></p>
				<?php if ($setting->getPhone() != null) { ?>
					<p>Telepon: </p>
				<?php } ?>
				<p class="is-hidden-tablet">Alamat:</p>
				<p class="is-hidden-tablet">
					<?= $setting->getAddress(); ?>>
				</p>
			</div>
			<div class="column is-3-tablet is-6-mobile is-hidden-mobile">
				<p>Alamat:</p>
				<p>
					<?= $setting->getAddress(); ?>>
				</p>
			</div>
			<div class="column is-3-tablet is-hidden-mobile">
				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31885.834293957403!2d140.62652415426666!3d-2.5942301825600595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686cf7bf10b7bcd9%3A0xa46dbf1c9c4704aa!2sUniversitas%20Cenderawasih!5e0!3m2!1sid!2sid!4v1693185524644!5m2!1sid!2sid"
					width="300" height="120" style="border:0;" allowfullscreen="" loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
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
<script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="assets/js/baguetteBox.js" async></script>
<script type="text/javascript" src="assets/js/main.js"></script>

</body>

</html>