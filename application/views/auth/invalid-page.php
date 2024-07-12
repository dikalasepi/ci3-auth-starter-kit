<div class="page page-center">
    <div class="container container-tight py-4">
        <?php if (flashdata('error')) : ?>
            <div class="alert alert-important alert-danger mb-3 text-center"><?= flashdata('error'); ?></div>
        <?php endif ?>
        <div class="text-center mb-4">
            <!-- Change with your own logo or application's name -->
            <a href="<?= base_url('auth') ?>" class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets/img/logo.svg') ?>" height="36" alt=""></a>
        </div>
        <div class="text-center">
            <div class="my-5">
                <h2 class="h1"><?= $heading ?></h2>
                <p class="fs-h3 text-muted">
                    <?= $message ?>
                </p>
            </div>
            <div class="text-center text-muted mt-3">
                Forget it, <a href="<?= base_url('auth') ?>">send me back</a> to the sign in screen.
            </div>
        </div>
    </div>
</div>