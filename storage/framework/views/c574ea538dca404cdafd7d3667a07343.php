<div>
<form wire:submit.prevent="updateUserDetails">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="acc-name">First name <span class="required">*</span></label>
                <input type="text" class="form-control" placeholder="Editor"
                    id="acc-name" name="first_name" wire:model="first_name" required />
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="acc-lastname">Last name <span class="required">*</span></label>
                <input type="text" class="form-control" id="acc-lastname"
                    name="last_name" wire:model="last_name" required />
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>

    <div class="form-group mb-2">
        <label for="acc-text">Display name <span class="required">*</span></label>
        <input type="text" class="form-control" id="acc-text" name="display_name"
            wire:model="display_name" required />
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['display_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        <p>This will be how your name will be displayed in the account section and in reviews</p>
    </div>

    <div class="form-group mb-4">
        <label for="acc-email">Email address <span class="required">*</span></label>
        <input type="email" class="form-control" id="acc-email" name="email"
            wire:model="email" required />
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <div class="change-password">
        <h3 class="text-uppercase mb-2">Password Change</h3>

        <div class="form-group">
            <label for="acc-password">Current Password (leave blank to leave unchanged)</label>
            <input type="password" class="form-control" id="acc-password"
                name="current_password" wire:model="current_password" />
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="form-group">
            <label for="acc-new-password">New Password (leave blank to leave unchanged)</label>
            <input type="password" class="form-control" id="acc-new-password"
                name="new_password" wire:model="new_password" />
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="form-group">
            <label for="acc-new-password_confirmation">Confirm New Password</label>
            <input type="password" class="form-control" id="acc-new-password_confirmation"
                name="new_password_confirmation" wire:model="new_password_confirmation" />
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['new_password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

    </div>


    <div class="form-footer mt-3 mb-0">
        <button type="submit" class="btn btn-dark mr-0">
            Save changes
        </button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div><?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/livewire/account-form.blade.php ENDPATH**/ ?>