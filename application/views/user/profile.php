            <div class="page page-center">
                <div class="container container-tight py-3">
                    <?php if (flashdata('message')) : ?>
                        <div class="alert alert-important alert-success alert-dismissible" role="alert">
                            <div class="d-flex">
                                <div>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                </div>
                                <div>
                                    <?= flashdata('message'); ?>
                                </div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    <?php endif ?>

                    <?php if (flashdata('error')) : ?>
                        <div class="alert alert-important alert-danger">
                            <?= flashdata('error'); ?>
                        </div>
                    <?php endif ?>

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">Account Information</div>
                            <div>
                                <a href="<?= base_url(); ?>" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l14 0" />
                                        <path d="M5 12l6 6" />
                                        <path d="M5 12l6 -6" />
                                    </svg>
                                    Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <span class="d-block text-muted mb-1">
                                    <small>Full Name</small>
                                </span>
                                <span class="d-block"><?= auth()->full_name; ?></span>
                            </div>

                            <div class="mb-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col">
                                        <span class="d-block text-muted mb-1">
                                            <small>Email</small>
                                        </span>
                                        <span class="d-block"><?= auth()->email; ?></span>
                                    </div>
                                    <?php if ($this->config->item('auth_verify')) :
                                    ?>
                                        <div class="col">
                                            <a href="#" id="changeEmailButton" class="d-inline-block float-end btn btn-success" data-bs-toggle="modal" data-bs-target="#modalForm">Change Email</a>
                                        </div>
                                    <?php endif
                                    ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <span class="d-block text-muted mb-1">
                                    <small>Username</small>
                                </span>
                                <span class="d-block"><?= auth()->username ? auth()->username : '-'; ?></span>
                            </div>

                            <div class="mb-3 float-end">
                                <a href="<?= base_url('user/profile/edit_profile'); ?>" class="btn btn-info">Edit Profile</a>
                                <a href="#" id="changePasswordButton" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalForm">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal enter current password -->
            <div class="modal modal-blur fade" id="modalForm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form id="formEnterCurrentPassword" action="<?= base_url('user/profile/change_password'); ?>" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title">Verification</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Please enter your password.</label>
                                    <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Enter your password" value="" autofocus>
                                    <span id="current_password_error" class="text-danger mt-1"></span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                    Cancel
                                </a>
                                <button id="buttonSubmitCurrentPassword" type="submit" class="btn btn-info ms-auto">
                                    Verify
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
            <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
            <script>
                $(document).ready(function() {
                    const modalForm = $('#modalForm');
                    const formEnterPassword = $('#formEnterCurrentPassword');
                    const passwordInput = $('#current_password');
                    const passwordErrorMessage = $('#current_password_error')
                    const url = '<?= base_url('user/profile/check_password'); ?>';
                    let change_type = '';
                    $('#changeEmailButton').on('click', function() {
                        formEnterPassword.prepend(`<input type="hidden" name="type" value="email" />`);

                    });

                    $('#changePasswordButton').on('click', function() {
                        formEnterPassword.prepend(`<input type="hidden" name="type" value="password" />`);
                    });

                    modalForm.on('hidden.bs.modal', function() {
                        $('input[name="type"]').remove();
                        passwordInput.removeClass('is-invalid');
                        passwordInput.val('');
                        passwordErrorMessage.html('');
                    })

                    formEnterPassword.on('submit', function(event) {
                        event.preventDefault();
                        let formData = $(this).serialize();

                        $.ajax({
                            data: formData,
                            dataType: 'json',
                            contentType: 'application/x-www-form-urlencoded',
                            type: 'POST',
                            url: url,
                            success: function(result) {
                                passwordInput.removeClass('is-invalid');
                                passwordErrorMessage.html('');

                                if (result.errors) {
                                    if (result.errors.current_password) {
                                        passwordInput.addClass('is-invalid');
                                        passwordErrorMessage.html(result.errors.current_password);
                                    }
                                } else {
                                    modalForm.modal('hide');
                                    passwordInput.removeClass('is-invalid');
                                    passwordErrorMessage.html('');
                                    $(this).submit();

                                    let redirectUrl = result.data.url ?? '';
                                    let token = result.data.token ?? '';
                                    window.location.replace(redirectUrl + token);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Error: ', error, xhr, status);
                            }
                        });
                    });
                });
            </script>