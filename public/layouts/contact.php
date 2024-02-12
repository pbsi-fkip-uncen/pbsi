<?php

$slug = 'kontak';
$section = $slug;

$query = new \Contentful\Delivery\Query;
$query->setContentType('page')
->where('fields.slug', $slug)
->setLocale('*');

$entries = $client->getEntries($query);

$entry = $entries[0];
// if ($entry->getImages()) {
// 	$backgroundImg = $entry->getImages()[0]->getFile()->getUrl();
// }
?>

<?php include('includes/header.php'); ?>

<div class="mt-5" id="wrap">

	<main id="content" class="content">

		<section class="vc_row pt-90">
			<div class="container">
				<div class="row">
					<div class="lqd-column col-md-10 col-md-offset-1">

						<div class="fancy-title ca-initvalues-applied lqd-animations-done" data-custom-animations="true" data-ca-options="{&quot;triggerHandler&quot;:&quot;inview&quot;,&quot;animationTarget&quot;:&quot;all-childs&quot;,&quot;duration&quot;:1200,&quot;delay&quot;:100,&quot;initValues&quot;:{&quot;translateY&quot;:80,&quot;opacity&quot;:0},&quot;animations&quot;:{&quot;translateY&quot;:0,&quot;opacity&quot;:1}}">

							<div class="row">
								<div class="lqd-column col-md-12 px-md-5">
									<h1  data-fittext="true" data-fittext-options='{ "maxFontSize": 48, "minFontSize": 32 }'><?= printText('Contact Us', 'Contact Us')?></h1>
									<!-- <h2 class=" mb-25">Contact Us</h2> -->
								</div>
							</div>

							<div class="row">
								<div class="lqd-column col-md-8 px-md-5">

									<form method="POST" action="process.php">
									<input type="hidden" name="process" value="kontak"/>
									<input type="text" name="_gotcha" style="display:none" />

									<div class="form-group">
										<label for="name" class="col-form-label">Nama:</label>
										<input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
									</div>

									<div class="form-group">
										<label for="email" class="col-form-label">Pos Elektronik:</label>
										<input type="email" class="form-control" id="contact_email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" required>
										<!-- <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small> -->
									</div>

									<div class="form-group">
										<label for="phone">Nomor Telepon:</label>
										<input type="tel" id="myform_phone" name="phone" pattern="[/\+?([ -]?\d+)+|\(\d+\)([ -]\d+)/g" minlength="9" required class="form-control" placeholder="Phone Number" >
									</div>

									<div class="form-group">
										<label for="messages" class="col-form-label">Pesan:</label>
										<textarea class="form-control" placeholder="Message" id="messages" name="messages" rows="4" cols="50"></textarea>
									</div>

									<div class="d-flex justify-content-center mb-3">
									<input type="submit" class="btn btn-solid text-uppercase circle btn-bordered border-thin font-size-14 font-weight-semibold btn-assessment" value="Submit Data" style="padding: 0.5em 1em; color: #fff; border-color: #fff;"/>
									</div>

									</form>

								</div>
							</div>

						</div>

					</div>

				</div>
			</div>

		</section>
	</main>

<?php include('includes/footer.php'); ?>

</div>
<?php include('includes/appclose.php'); ?>

</body>
</html>