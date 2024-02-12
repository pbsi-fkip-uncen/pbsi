<nav class="navbar bg-blue-light" role="navigation" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="home">
        <img src="<?= $setting->getProdiIcon()->getFile()->getUrl() ?>" width="312" height="48">
      </a>

      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
        data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <?php foreach ($setting->getNavMenu() as $menu) { ?>
          <?php if (count($menu->getSubpages()) > 0) { ?>
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link" href="<?= $menu->getSlug(); ?>">
                <?= $menu->getTitle() ?>
              </a>
              <div class="navbar-dropdown">
                <?php foreach ($menu->getSubpages() as $submenu) { ?>
                  <?php if ($submenu->getSlug() == 'galeri') { ?>
                    <a class="navbar-item" href="<?= $submenu->getSlug(); ?>">
                    <?php } else { ?>
                      <a class="navbar-item" href="<?= $menu->getSlug(); ?>/<?= $submenu->getSlug(); ?>">
                      <?php } ?>
                      <?= $submenu->getTitle() ?>
                    </a>
                  <?php } ?>
              </div>
            </div>
          <?php } else { ?>
            <a class="navbar-item" href="<?= $menu->getSlug(); ?>">
              <?= $menu->getTitle() ?>
            </a>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>