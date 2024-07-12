<div class="page page-center">
    <div class="container container-tight py-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title">Edit Profile</div>
                <div>
                    <a href="<?= base_url('user/profile'); ?>" class="btn btn-secondary">
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
                <form action="<?= base_url('user/profile/edit_profile') ?>" method="post">
                    <input type="hidden" name="<?= csrf_name(); ?>" value="<?= csrf_value(); ?>">
                    <?= method_field('put'); ?>
                    <input type="hidden" name="id" value="<?= auth()->id; ?>">
                    <div class="mb-3">
                        <label for="full_name" class="d-block text-muted mb-1">
                            <small>Full Name</small>
                        </label>
                        <input type="text" name="full_name" id="full_name" class="form-control <?= form_error('full_name') ? 'is-invalid' : ''; ?>" value="<?= set_value('full_name', auth()->full_name); ?>" autofocus>
                        <span class="text-danger mt-1">
                            <small><?= form_error('full_name'); ?></small>
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="d-block text-muted mb-1">
                            <small>Email</small>
                        </label>
                        <input type="email" name="email" id="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= set_value('email', auth()->email); ?>" <?= ($this->config->item('auth_verify')) ? 'readonly' : ''; ?>>
                        <span class="text-danger mt-1">
                            <small><?= form_error('email'); ?></small>
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="d-block text-muted mb-1">
                            <small>Username</small>
                        </label>
                        <input type="text" name="username" id="username" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" value="<?= set_value('username', auth()->username); ?>">
                        <span class="text-danger mt-1">
                            <small><?= form_error('username'); ?></small>
                        </span>
                    </div>

                    <div class="mb-3 mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>