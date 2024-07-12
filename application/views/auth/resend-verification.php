<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <!-- Change with your own logo or application's name -->
            <a href="<?= base_url('auth') ?>" class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets/img/logo.svg') ?>" height="36" alt=""></a>
        </div>
        <?php if (flashdata('error')) : ?>
            <div class="alert alert-important alert-danger mb-3"><?= flashdata('error'); ?></div>
        <?php endif ?>

        <?php if (form_error('email')) : ?>
            <div class="alert alert-important alert-danger mb-3 text-center"><?= form_error('email') ?></div>
        <?php endif ?>

        <form id="formResendVerification" action="" class="card card-md" method="POST">
            <input type="hidden" name="<?= csrf_name(); ?>" value="<?= csrf_value(); ?>">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Account Activation</h2>
                <p class="text-muted mb-4">Enter your email address and we'll send link to activate your account.</p>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input id="email" name="email" type="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" placeholder="Enter email" autofocus>
                </div>
                <div class="form-footer">
                    <button id="buttonSubmitResendVerification" type="submit" class="btn btn-primary w-100">
                        <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                            <path d="M3 7l9 6l9 -6" />
                        </svg>
                        Send me link
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Forget it, <a href="<?= base_url('auth') ?>">send me back</a> to the sign in screen.
        </div>
    </div>
</div>

<script>
    // const form = document.querySelector('#formResendVerification');
    // const emailInput = document.querySelector('#email');
    // const buttonSubmit = document.querySelector('#buttonSubmitResendVerification');
    // let emailInputValue = '';

    // emailInput.addEventListener('change', function() {
    //     emailInputValue = this.value;
    // });

    // buttonSubmit.addEventListener('click', function(event) {
    //     event.preventDefault();
    //     form.setAttribute('action', "" + emailInputValue);
    //     form.submit();
    // });
</script>