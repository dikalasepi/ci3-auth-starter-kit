<div class="page page-center">
    <div class="container container-tight py-4">
        <form class="card card-md" action="" method="POST" autocomplete="off">
            <input type="hidden" name="<?= csrf_name(); ?>" value="<?= csrf_value(); ?>">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title text-center">Change Password</div>
                <div>
                    <a href="<?= base_url('user/profile'); ?>" class="d-inline-block btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M5 12l6 6" />
                            <path d="M5 12l6 -6" />
                        </svg>
                        Cancel
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <div class="input-group input-group-flat <?= form_error('new_password') ? 'border border-danger rounded' : '' ?>">
                        <input type="password" name="new_password" id="passwordInput" class="form-control" placeholder="Password" autocomplete="off" autofocus>
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
                        <small><?= form_error('new_password') ?></small>
                    </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password Confirmation</label>
                    <div class="input-group input-group-flat <?= form_error('password_confirmation') ? 'border border-danger rounded' : '' ?>">
                        <input type="password" name="password_confirmation" id="passwordConfirmInput" class="form-control" placeholder="Confirmation" autocomplete="off">
                        <span class="input-group-text">
                            <a tabindex="-1" href="#" class="link-secondary" id="togglePasswordConfirmBtn" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-info w-100">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const inputPasswordField = document.getElementById('passwordInput');
    const inputPasswordConfirmField = document.getElementById('passwordConfirmInput');
    const togglePasswordButton = document.getElementById('togglePasswordBtn');
    const togglePasswordConfirmButton = document.getElementById('togglePasswordConfirmBtn');

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

    // triger toggle button to show/hide password confirmation
    togglePasswordConfirmButton.addEventListener('click', function(event) {
        event.preventDefault();
        const type = inputPasswordConfirmField.getAttribute("type") === "password" ? "text" : "password";
        inputPasswordConfirmField.setAttribute("type", type);

        // toggle visibility password confirmation icon
        type === 'password' ?
            togglePasswordConfirmButton.innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>` :
            togglePasswordConfirmButton.innerHTML = `<svg class="icon" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" /><path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" /><path d="M3 3l18 18" /></svg>`
    });
</script>