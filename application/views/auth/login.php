    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <!-- Change with your own logo or application's name -->
                <a href="<?= base_url('auth') ?>" class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets/img/logo.svg') ?>" height="36" alt=""></a>
            </div>

            <?php if (flashdata('message')) : ?>
                <div class="alert alert-important alert-success"><?= (flashdata('message')) ?></div>
            <?php endif ?>

            <?php if (flashdata('error')) : ?>
                <div class="alert alert-important alert-danger"><?= (flashdata('error')) ?></div>
            <?php endif ?>

            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form action="<?= base_url('auth') ?>" method="POST">
                        <input type="hidden" name="<?= csrf_name(); ?>" value="<?= csrf_value(); ?>">
                        <div class="mb-3">
                            <label class="form-label">Username or email address</label>
                            <input type="text" name="username" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" placeholder="username or your@email.com" value="<?= flashdata('username') ?? set_value('username', '') ?>" autofocus>
                            <span class="d-block text-danger mt-1">
                                <small><?= form_error('username') ?></small>
                            </span>
                        </div>
                        <div class="mb-2">
                            <label for="passwordInput" class="form-label">
                                Password

                            </label>
                            <div class="input-group input-group-flat <?= form_error('password') ? 'border border-danger rounded' : '' ?>">
                                <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Your password" autocomplete="off">
                                <span class="input-group-text">
                                    <a tabindex="-1" href="#" class="link-secondary" id="togglePasswordBtn" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                            <span class="d-block text-danger mt-1">
                                <small><?= form_error('password') ?></small>
                            </span>
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input name="remember" type="checkbox" class="form-check-input" />
                                <span class="form-check-label">Remember me on this device</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if ($this->config->item('auth_reset')) : ?>
                <div class="text-center mt-3">
                    <a href="<?= base_url('auth/forgot_password') ?>">Forgot password?</a>
                </div>
            <?php endif ?>

            <?php if ($this->config->item('auth_register')) : ?>
                <div class="text-center text-muted mt-2">
                    Don't have account yet? <a href="<?= base_url('auth/register') ?>" tabindex="-1">Sign up</a>
                </div>
            <?php endif ?>
        </div>
    </div>

    <script>
        const inputPasswordField = document.getElementById('passwordInput');
        const togglePasswordButton = document.getElementById('togglePasswordBtn');

        // trigger toggle button to show/hide password
        togglePasswordButton.addEventListener('click', function(event) {
            event.preventDefault();
            const type = inputPasswordField.getAttribute("type") === "password" ? "text" : "password";
            inputPasswordField.setAttribute("type", type);

            // toggle visibility password icon
            type === 'password' ?
                togglePasswordButton.innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>` :
                togglePasswordButton.innerHTML = `<svg class="icon" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" /><path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" /><path d="M3 3l18 18" /></svg>`
        });
    </script>