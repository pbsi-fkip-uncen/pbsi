<?php
global $blocks;
global $id;

$company = 'Pendidikan Bahasa dan Sastra Indonesia';

$query = new \Contentful\Delivery\Query;
$query->setContentType('settings')
  ->where('fields.prodiName', $company);
$entries = $client->getEntries($query);

if ($entries->getTotal() > 0) {
  $setting = $entries[0];
}

foreach ($blocks as $block):

  switch ($block->getType()) {
    case 'Header': ?>

      <?php
      break;
    case 'banner':
      ?>

      <!-- Banner -->
      <section class="hero soft-brown bg-0">
        <div class="hero-body banner-top">
          <div class="container">
            <div class="columns is-multiline is-mobile">
              <?php $src = 'assets/img/placeholder.webp';
              if ($block->getThumbnail() != null) {
                $src = $block->getThumbnail()->getFile()->getUrl();
              } ?>
              <div class="background-slide-home"
                style="background-image: url('<?= $src; ?>'); height: 100vh; width: 100%; background-size: cover; background-position: center; display: block; object-fit: cover; background-repeat: no-repeat;">
                <div class="overlay txt-white">
                  <div class="box-card reveal reveal_visible">
                    <p class="banner-title txt-white"><span>
                        <?= $block->getSubtitle(); ?>
                      </span></p>
                    <h1 class="banner-title txt-5em txt-white">
                      <?= $block->getTitle(); ?>
                    </h1>
                    <div class="banner-title txt-white">
                      <p>
                        <?= $parser->parse($block->getDescription()); ?>
                      </p>
                    </div>
                    <h4 class="title is-4 txt-white">
                      <?= $parser->parse($block->getIntroduction()); ?>
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Banner -->

      <?php
      break;
    case 'Hero2':
      ?>

      <!-- Banner 2 -->
      <section class="hero is-large soft-brown bg-0 hero2parent">
        <div class="hero-body banner-top2">
          <div class="container">
            <div class="columns is-multiline is-mobile">
              <div class="column is-full-mobile is-12-tablet">
                <h1 class="title is-1">
                  <?= $block->getTitle(); ?>
                </h1>
                <br />
                <a href="<?= $block->getButtonLink(); ?>" target="_blank" class="banner-link">
                  <?= $block->getButtonText(); ?>
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php $card = $block->getCards()[0]; ?>
        <?php if ($card) { ?>
          <div class="hero-body hero2">
            <a href="<?= $card->getButtonLink(); ?>" target="_blank">
              <div class="banner-event2" style="background-image: url('<?= $card->getImage()->getFile()->getUrl(); ?>');">
                <div class="columns is-multiline is-mobile">
                  <div class="column is-full-mobile is-12-tablet">
                  </div>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>
      </section>
      <!-- Banner 2 -->

      <?php
      break;
    case 'Event':
      ?>

      <!-- Event -->

      <section class="section bg-brown-2" id="event">
        <div class="container">
          <div class="columns is-multiline is-mobile is-vcentered">
            <div class="column is-full-mobile is-half-tablet splide">
              <div class="splide__track">
                <ul class="splide__list">
                  <?php foreach ($block->getImages() as $key => $img) { ?>
                    <li class="splide__slide" onclick="openForm()" style="padding: auto;">
                      <div style="background-image: url(<?= $img->getFile()->getUrl(); ?>);">
                        <!-- <button class="open-button" onclick="openForm()"> -->
                        <!-- <img src="<?php // $img->getFile()->getUrl();?>" class="img-event"/> -->
                        <!-- </button> -->
                      </div>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <div class="column is-full-mobile is-offset-1-tablet is-5-tablet">
              <div class="content">
                <p class="sub-title-2 fw-bold">EVENT</p>
                <h2 class="title is-2 text-white">
                  <?= $block->getTitle(); ?>
                </h2>
                <p class="text-white">
                  <?= $block->getIntroduction(); ?>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="form-popup" id="myForm" style="height: 80vh; margin: 10vh 3rem;">
          <section class="section soft-brown bg-0" style="height: 80vh; position: relative;">
            <div class="container centered container-event">
              <p class="sub-title mb-3 fw-bold">EVENT</p>
              <div class="columns is-multiline is-mobile is-vcentered">
                <?php foreach ($block->getCards()[0]->getImages() as $key => $img) { ?>
                  <div class="column is-4-tablet is-full-mobile div-event-2">
                    <div class="div-event">
                      <div style="background-image: url('<?= $img->getFile()->getUrl(); ?>');" class="img-event"></div>
                    </div>
                  </div>
                <?php } ?>

              </div>
            </div>
            <div onclick="closeForm()"
              style="position: absolute; top: 2rem; right: 2rem; background-color: transparent; color: #000;"> X </div>
          </section>
        </div>
      </section>

      <?php break;
    case 'tentang kami': ?>

      <section class="">
        <div class="container">
          <div class="columns">
            <div class="column is-6-tablet is-full-mobile">
              <?php $src = 'assets/img/placeholder.webp';
              if ($block->getThumbnail() != null) {
                $src = $block->getThumbnail()->getFile()->getUrl();
              } ?>
              <img src="<?= $src; ?>" />
            </div>
            <div class="column is-6-tablet is-full-mobile">
              <div class="">
                <p><span>
                    <?= $block->getTitle(); ?>
                  </span></p>
              </div>
              <div class="">
                <p><span>
                    <?= $block->getIntroduction(); ?>
                  </span></p>
              </div>
              <div class="">
                <p><span>
                    <?= $block->getDescription(); ?>
                  </span></p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php break;
    case 'visi-misi': ?>

      <section class="">
        <div class="container">
          <div class="columns">
            <div class="column is-6-tablet is-full-mobile">

              <div class="div-vision">
                <h3>Visi</h3>
                <p>
                  <?= $setting->getProdiVision(); ?>
                </p>
              </div>

              <div class="div-mission">
                <h3>Misi</h3>
                <p>
                  <?= $setting->getProdiMission(); ?>
                </p>
              </div>

            </div>
            <div class="column is-6-tablet is-full-mobile">
              <?php $src = 'assets/img/placeholder.webp';
              if ($block->getThumbnail() != null) {
                $src = $block->getThumbnail()->getFile()->getUrl();
              } ?>
              <img src="<?= $src; ?>" />
            </div>
          </div>
        </div>
      </section>

      <?php break;
    case 'tujuan': ?>

      <section class="">
        <div class="container">
          <div class="columns">
            <div class="column is-6-tablet is-full-mobile">
              <?php $src = 'assets/img/placeholder.webp';
              if ($block->getThumbnail() != null) {
                $src = $block->getThumbnail()->getFile()->getUrl();
              } ?>
              <img src="<?= $src; ?>" />
            </div>
            <div class="column is-6-tablet is-full-mobile">
              <div class="div-vision">
                <h3>Tujuan</h3>
                <p>
                  <?= $setting->getProdiPurpose(); ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php break;
    case 'galeri': ?>

      <section class="">
        <div class="container swiper">
          <div class="columns swiper-wrapper">
            <?php foreach ($block->getCards() as $card) { ?>
              <?php foreach ($card->getImages() as $img) { ?>
                <div class="column is-4-tablet is-full-mobile swiper-slide">
                  <img src="<?= $img->getFile()->getUrl(); ?>" />
                </div>
              <?php }
            } ?>
          </div>
        </div>
      </section>

      <?php break;
    case 'artikel': ?>

      <section class="">
        <div class="container">
          <div class="columns slick-article">
            <?php $query = new \Contentful\Delivery\Query;
            $query->setContentType('article')
              ->setLimit(3);
            $articles = $client->getEntries($query); ?>
            <?php foreach ($articles as $article) { ?>
              <div class="column is-4-tablet is-full-mobile">
                <a href="<?= $article->getSlug(); ?>">
                  <div class="news-item news-item-cat-blog col-md-4">
                    <div class="news-item-image">
                      <?php $src = 'assets/img/placeholder.webp';
                      if ($article->getThumbnail() != null) {
                        $src = $article->getThumbnail()->getFile()->getUrl();
                      } ?>
                      <div class="news-item-image-inner article-card" style="background-image: url('<?= $src; ?>')">
                        <img src="<?= $src; ?>" class="portfolio-img">
                      </div>
                    </div>
                    <div class="news-item-content">
                      <div class="news-item-date">
                        <?php $posteddate = date('Y-m-d');
                        if ($article->getPublishedAt() != null) {
                          $posteddate = $article->getPublishedAt();
                        }
                        ?>
                      </div>
                      <div class="news-item-title font-size-32">
                        <a href="<?= $article->getSlug(); ?>" data-wpel-link="internal">
                          <span class="font-eurostile-bold">
                            <?= $article->getTitle(); ?>
                          </span>
                          <br>
                          <?php if ($article->getDescription() != null) { ?>
                            <span class="font-eurostile-regular">
                              <?= $article->getDescription(); ?>
                            </span>
                          <?php } ?>
                        </a>
                      </div>
                      <div class="news-item-desc font-proximanova-regular"></div>
                    </div>
                  </div>
                </a>
              </div>
              <?php
            } ?>
          </div>
        </div>
      </section>

      <?php
      break;
    case 'Custom':
      ?>


      <!-- Custom-Banner -->

      <?php if ($block->getImages()) { ?>
        <?php $c = 0;
        foreach ($block->getImages() as $img):
          $c++ ?>
          <section class="hero is-large">
            <a href="<?= $block->getButtonLink(); ?>" target="_blank">
              <div class="banner-event" style="background-image: url('<?= $img->getFile()->getUrl(); ?>');">
                <div class="hero-body">
                  <div class="columns is-multiline is-mobile">
                    <div class="column is-full-mobile is-12-tablet">
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </section>
        <?php endforeach; ?>
      <?php } ?>

      <?php
      break;
    case '':
      ?>

      <!-- Custom -->
      <?php if ($block->getImages()) { ?>

        <section class="section is-fullheight bg-event" style="border-bottom: 24px solid #5448c8;">
          <div class="">
            <div class="columns is-multiline is-mobile reverse-column is-vcentered">
              <div class="column is-full-tablet is-full-mobile is-relative" data-aos="fade-right" data-aos-duration="1000">

                <div class="columns is-multiline is-mobile is-centered is-vcentered">
                  <div class="column is-full-mobile is-half-tablet padding-2">
                    <ul class=" top-menu ">
                      <li><img src="./assets/img/instansi-1.svg" class="logo-instansi" align="left"></li>
                      <li><img src="./assets/img/logo-1.png" class="logo-instansi" align="left" style="    max-width: 13%;">
                      </li>
                      <li><img src="./assets/img/instansi-3.svg" class="logo-instansi" align="left"></li>
                      <li><img src="./assets/img/instansi-4.png" class="logo-instansi" align="left"></li>
                    </ul>
                  </div>

                  <div class="column is-full-mobile is-half-tablet is-centered date padding-1">
                    <div class="columns is-multiline is-mobile">
                      <div class="column is-full-mobile is-6-tablet">
                        <p class="is-white paragraf-date"> Pendaftaran <br>17 Juni - 8 Juli 2022 </p>
                      </div>
                      <div class="column is-full-mobile is-6-tablet">
                        <p class="is-white paragraf-date"> Mentoring <br>18 Juli - 05 Oktober 2022 </p>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="column is-full-tablet is-full-mobile is-relative" data-aos="fade-right" data-aos-duration="1000">

                <div class="columns is-multiline is-mobile is-centered is-vcentered">
                  <div class="column is-full-mobile is-half-tablet padding-3">
                    <img class="is-hidden-mobile" style="width: 43.5rem;"
                      src="https://images.ctfassets.net/1di1ntjloe8f/1WxPkG1lUcvANDa06eA40M/425a787f847dff85bc849c49579f65d4/logo_ssf_1.0-10-svg.png">

                    <h1 class="title-startup is-purple pt-3 is is-hidden-tablet">
                      SURABAYA <br>
                      <span class="is-orange">STARTUP</span><br>
                      FEST <span class="line-number has-text-white">1.O</span>
                    </h1>
                  </div>

                  <div class="column is-full-mobile is-half-tablet is-centered">
                    <div
                      class="columns is-multiline is-mobile is-centered is-vcentered is-relative height-narasumber is-hidden-mobile">
                      <?php $c = 0;
                      foreach ($block->getImages() as $img):
                        $c++ ?>
                        <div class="column is-full-mobile is-4-tablet has-text-white px-0 image-placeholder "><br>
                          <img class="img-narasumber img-narsum margin-img" src="<?= $img->getFile()->getUrl(); ?>">

                          <div class="label-img">
                            <h3 class="title-event has-text-white">
                              <?= $img->getTitle(); ?>
                            </h3>
                            <p class="paragraf-img has-text-white">
                              <?= $img->getDescription(); ?>
                            </p>
                          </div>

                        </div>


                      <?php endforeach; ?>
                    </div>

                    <div class="columns is-multiline is-mobile is-centered is-vcentered is-relative is-hidden-tablet">
                      <?php $c = 0;
                      foreach ($block->getImages() as $img):
                        $c++ ?>
                        <div class="column is-full-mobile is-4-tablet has-text-white image-placeholder1"><br>
                          <img class="" src="<?= $img->getFile()->getUrl(); ?>">

                          <div class="image-placeholder-mobile">
                            <h3 class="title-event has-text-white">
                              <?= $img->getTitle(); ?>
                            </h3>
                            <p class="paragraf-img has-text-white">
                              <?= $img->getDescription(); ?>
                            </p>
                          </div>

                        </div>


                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="column is-full-tablet is-full-mobile is-relative" data-aos="fade-right" data-aos-duration="1000">

                <div class="columns is-multiline is-mobile is-centered is-vcentered">
                  <div class="column is-full-mobile is-half-tablet padding-4">
                    <p class="event-desc is-hidden-tablet">
                      <?= $block->getIntroduction(); ?>
                    </p>
                    <p class="event-desc is-hidden-mobile">
                      <?= $block->getDescription(); ?>
                    </p>

                    <a href="https://forms.gle/WUB7BJB21FeaAjKZ8" class="btn btn-apply">
                      <span class="text-apply">APPLY NOW</span>
                    </a>

                  </div>

                  <div class="column is-full-mobile is-5-tablet is-offset-1-tablet is-centered padding-5">
                    <div class="columns is-multiline is-mobile is-centered is-vcentered">

                      <?php if ($block->getCards()) { ?>
                        <?php $c = 0;
                        foreach ($block->getCards() as $card):
                          $c++ ?>

                          <?php if ($card->getImages()) { ?>
                            <?php $c = 0;
                            foreach ($card->getImages() as $img):
                              $c++ ?>
                              <div class="column is-full-mobile is-3-tablet">
                                <img class="img-event" src="<?= $img->getFile()->getUrl(); ?>">
                                <p class="paragraf-event is-purple">
                                  <?= $img->getTitle(); ?>
                                </p>
                              </div>
                            <?php endforeach; ?>
                          <?php } ?>

                        <?php endforeach; ?>
                      <?php } ?>


                    </div>
                  </div>
                </div>
              </div>

              <!--  -->

            </div>

            <div class="ornamen-1 is-hidden-mobile">
              <img
                src="https://images.ctfassets.net/1di1ntjloe8f/4CizJ0SW5GmJ623SlIfzPG/12938cf387ad958be2d143954d65a5c2/ornamen_1.svg">
            </div>
            <div class="ornamen-2 is-hidden-mobile">
              <img
                src="https://images.ctfassets.net/1di1ntjloe8f/3T9Htn1ohGg6VL2yTa9II8/d95c1b0ade349b655c9680d9bf07a3b1/ornamen_2.svg">
            </div>
            <div class="ornamen-3 is-hidden-mobile">
              <img
                src="https://images.ctfassets.net/1di1ntjloe8f/7IVjMNMEAY2wgw1gj0FeKx/dff1fac4774b55734f28149f9ea5be40/ornamen_3.svg">
            </div>
            <div class="ornamen-4 is-hidden-mobile">
              <img
                src="https://images.ctfassets.net/1di1ntjloe8f/3Pu1Wsqw3fm9Q9Y6WuTuan/4ec297c529aaa8bc87235b6da71f003d/ornamen_4.svg">
            </div>
          </div>

        </section>

      <?php } ?>


      <?php
      break;
    case 'Home':
      ?>

      <!-- Home -->

      <?php if ($block->getImages()) { ?>
        <?php $c = 0;
        foreach ($block->getImages() as $img):
          $c++ ?>
          <section class="section  gradient-home bg-brown"
            style=" background-size: cover; width: 100%;  display: flex; float: left; position: relative; z-index: 2; transition: opacity 1000ms ease-in-out 0s;"
            id="home">


            <div class="container">
              <div class="columns is-multiline is-mobile is-centered">
                <div class="column is-10-mobile is-12-tablet ">
                  <h2 class="title is-2 is-white">
                    <?= $block->getTitle(); ?>
                  </h2>
                  <p class="is-white">
                    <?= $block->getIntroduction(); ?>
                  </p>
                </div>
              </div>

            </div>

          </section>

        <?php endforeach; ?>
      <?php } ?>

      <?php
      break;
    case 'About':
      ?>

      <section class="section" id="about">
        <div class="container">
          <div class="columns is-multiline is-mobile is-vcentered">
            <div class="column is-full-mobile is-4-tablet">
              <div class="content">
                <p class="sub-title fw-bold">ABOUT</p>
                <h2 class="title is-6">
                  <?= $block->getTitle(); ?>
                </h2>
                <p class="fw-bold">
                  <?= $block->getIntroduction(); ?>
                </p>
              </div>
            </div>
            <div class="column is-full-mobile is-8-tablet">
              <div class="square">
                <img src="<?= $block->getImage()->getFile()->getUrl(); ?>" class="img-square" />
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php
      break;
    case 'Our-Values':
      ?>

      <!-- Our-Values -->

      <section class="section soft-brown bg-1 relative" id="our-values">
        <div class="container">
          <div class="columns is-multiline is-mobile pb-2 is-centered">
            <div class="column is-10-mobile is-full-tablet has-text-centered value-title">
              <h2 class="title is-2 fw-bold">
                <?= $block->getTitle(); ?>
              </h2>
              <p class="fw-bold">
                <?= $block->getIntroduction(); ?>
              </p>
            </div>
          </div>

          <div class="columns is-multiline is-mobile is-centered">
            <div class="column is-12-mobile is-10-tablet">
              <div class="columns is-mobile is-multiline is-centered">
                <?php if ($block->getCards()) { ?>
                  <?php $c = 0;
                  foreach ($block->getCards() as $card):
                    $c++ ?>
                    <?php if ($card->getImages()) { ?>
                      <?php $i = 0;
                      foreach ($card->getImages() as $img):
                        $i++ ?>

                        <div class='column is-10-mobile is-4-tablet value-item'>
                          <!--<a href="#<?= $img->getId(); ?>" class='a-value' data-effect="mfp-zoom-in">-->
                          <a href="#" class='a-value' data-effect="mfp-zoom-in">
                            <div class="white-box">
                              <div class='white-box2'>
                                <!-- <div class='white-box3' style="background-image: url('<?= $img->getFile()->getUrl(); ?>'); background-repeat: no-repeat; background-position: center;"> -->
                                <div class='white-box3'>
                                  <div class="content">
                                    <p style="line-height: 1.1; text-align: center;"><span>
                                        <?= $card->getIntroduction(); ?>
                                      </span></p>
                                  </div>
                                </div>
                              </div>

                              <div class='white-box1'>
                                <p class="fw-bold desc-icon">
                                  <img class="img-icon" src="<?= $img->getFile()->getUrl(); ?>">
                                  <?= $img->getTitle(); ?>
                                </p>
                                <!-- <p class="paragraph-value"><?= $img->getDescription(); ?></p> -->
                              </div>

                            </div>
                          </a>
                        </div>
                      <?php endforeach; ?>
                    <?php } ?>
                  <?php endforeach; ?>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>


      <?php
      break;
    case 'Team':
      ?>

      <!--Team-->

      <section class="section relative" id="team">

        <div class="container">
          <div class="columns is-multiline is-mobile is-centered pb-2">
            <div class="column is-full-mobile is-full-tablet has-text-centered">
              <h2 class="title is-2 fw-bold">
                <?= $block->getTitle(); ?>
              </h2>
              <p class="is-white paragraph-value" style="text-align: center;">
                <?= $block->getIntroduction(); ?>
              </p>
            </div>
          </div>
        </div>

        <?php if ($block->getCards()) { ?>
          <div class="columns is-multiline is-mobile is-centered pb-2">

            <?php $c = 0;
            foreach ($block->getCards() as $card):
              $c++ ?>
              <?php if ($card->getImages()) { ?>
                <?php $c = 0;
                foreach ($card->getImages() as $img):
                  $c++ ?>

                  <div class="column is-full-mobile is-4-tablet has-text-centered">
                    <div class="team-box">
                      <a href="#<?= $img->getId(); ?>" data-effect="mfp-zoom-in">
                        <img class="img-full img-team" src="<?= $img->getFile()->getUrl(); ?>">
                      </a>
                      <p class="fw-bold">
                        <?= $img->getTitle(); ?>
                      </p>
                      <p><span class="sub-title circle fw-bold">
                          <?= $card->getButtonText(); ?>
                        </span></p>
                    </div>

                  </div>

                  <div id="<?= $img->getId(); ?>" class="pop-up with-bg mfp-with-anim mfp-hide mfp-mobile">
                    <div class="popup-cont">
                      <div class="columns is-mobile">
                        <div class="column is-full-mobile is-4-tablet relative">
                          <div class='brown-box'></div>
                          <img class="img-full img-team" src="<?= $img->getFile()->getUrl(); ?>">
                        </div>
                        <div class="column is-full-mobile is-8-tablet">
                          <div class="content">
                            <p class="title-team">
                              <?= $card->getButtonText(); ?>
                            </p>
                            <h3 class="title is-3">
                              <?= $img->getTitle(); ?>
                            </h3>
                            <p>
                              <?= $card->getIntroduction(); ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php endforeach; ?>
              <?php } ?>
            <?php endforeach; ?>

          </div>
        <?php } ?>
        </div>

      </section>

      <!-- Team -->


      <?php

      break;
    case 'Custom':

      echo $parser->parse($block->getSourceCode());

      break;
    default: ?>

      <?php
      break;
  }
endforeach;
?>

<script>
  $(document).ready(function () {
    $('.slick-gallery').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3
    });

    $('.slick-article').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3
    });

    const swiper = new Swiper('.swiper', {
      // Optional parameters
      direction: 'vertical',
      loop: true,

      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
      },

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      // And if we need scrollbar
      scrollbar: {
        el: '.swiper-scrollbar',
      },
    });
  });
</script>