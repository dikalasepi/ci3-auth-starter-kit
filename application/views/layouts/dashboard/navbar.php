<!-- Navbar -->
<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- header right section -->
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(https://ui-avatars.com/api/?name=<?= url_title(auth()->full_name) ?>)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div><?= auth()->full_name; ?></div>
                        <!-- In case you want to show user role you can delete comment below and adjust your view -->
                        <!-- <div class="mt-1 small text-muted">UI Designer</div> -->
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="<?= base_url('user/profile'); ?>" class="dropdown-item">Profile</a>
                    <div class="dropdown-divider"></div>
                    <form id="formLogoutNavbar" action="<?= base_url('auth/logout') ?>" method="post">
                        <input type="hidden" name="<?= csrf_name(); ?>" value="<?= csrf_value(); ?>">
                    </form>
                    <a id="anchorLogoutNavbar" href="<?= base_url('auth/logout') ?>" class="dropdown-item">Logout</a>
                    <script>
                        logoutLinkNavbar = document.getElementById('anchorLogoutNavbar');
                        logoutLinkNavbar.addEventListener('click', function(e) {
                            e.preventDefault();
                            document.getElementById('formLogoutNavbar').submit();
                        });
                    </script>
                </div>
            </div>
        </div>
        <!-- header left section -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div>
                <!-- content of left section -->
            </div>
        </div>
    </div>
</header>