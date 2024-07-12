<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <!-- Change with your own logo or application's name -->
            <a href="<?= base_url('auth') ?>" class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets/img/logo.svg') ?>" height="36" alt=""></a>
        </div>
        <div class="text-center">
            <div class="my-5">
                <h2 class="h1">Check your inbox</h2>
                <p class="fs-h3 text-muted">
                    We've sent you a verification link.<br />
                    Please click the button within email message to verify your email.
                </p>
            </div>
            <div class="text-center text-muted mt-3">
                Can't see the email? Please check the spam folder.<br />
                Wrong email? Please <a href="<?= base_url('auth/resend_verification') ?>">re-enter your address</a>.
            </div>
        </div>
    </div>
</div>