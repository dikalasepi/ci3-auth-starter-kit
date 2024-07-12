<div class="page page-center">
    <div class="container container-tight py-4">
        <form class="card card-md" action="" method="POST">
            <input type="hidden" name="<?= csrf_name(); ?>" value="<?= csrf_value(); ?>">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title text-center">Change Email</div>
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
                    <div class="alert alert-info">After you change email, you'll be logout. Please verify new email address before you can login back.</div>
                    <label class="form-label">New Email</label>
                    <input type="email" name="new_email" id="passwordInput" class="form-control <?= form_error('new_email') ? 'is-invalid' : '' ?>" placeholder="Enter new email" value="<?= set_value('new_password', ''); ?>">
                    <span class="d-block text-danger mt-1">
                        <small><?= form_error('new_email') ?></small>
                    </span>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-info w-100">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>