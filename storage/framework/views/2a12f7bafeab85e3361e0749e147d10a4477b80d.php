<div class="card">
<div class="card-body">
    <form method="POST" action="<?php echo e(route('login')); ?>">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right"><?php echo e(__('البـــريد الالكتروني')); ?></label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('كلــمة السر')); ?></label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('تذكرني على هذا الجهاز')); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary" onclick="event.stopImmediatePropagation();">
                    <?php echo e(__('تسجيل الدخول')); ?>

                </button>

                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                    <?php echo e(__('نسيت كلمة المرور؟')); ?>

                </a>
            </div>
        </div>
    </form>
</div>
</div> <!-- End of Login Card -->