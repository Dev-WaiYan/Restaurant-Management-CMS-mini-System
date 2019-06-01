<?php $__env->startSection('content'); ?>
    <section class="w3-row w3-khaki w3-padding-64">
    <div class="w3-col m3">&nbsp;</div>
    <div class="w3-col m6 w3-container">
        <h2>My Restaurant</h2>
        <h4>Admin Setting</h4> <hr style="background: green;height:1px;">
        <?php if(isset($message)): ?>
            <h4 class="w3-green w3-padding-32 w3-panel"><?php echo e($message); ?></h4>
        <?php endif; ?>
        <?php if(isset($error)): ?>
            <h4 class="w3-red w3-padding-32 w3-panel"><?php echo e($error); ?></h4>
        <?php endif; ?>
        <form action="setting" class="w3-padding-64" method="post">
        <?php echo e(csrf_field()); ?>

            <?php if(isset($oldusername) && isset($oldpassword)): ?>
            <h3>Old Username : <span class="w3-text-teal"><?php echo e($oldusername); ?></span></h3>
            <h3>Old Password : <span class="w3-text-teal"><?php echo e($oldpassword); ?></span></h3>
            <?php endif; ?>

            <?php if(isset($newusername) && isset($newpassword)): ?>
            <h3>New Username : <span class="w3-text-teal"><?php echo e($newusername); ?></span></h3>
            <h3>New Password : <span class="w3-text-teal"><?php echo e($newpassword); ?></span></h3>
            <?php endif; ?>
            <br><br>
            <label for="newusername">New Name :</label> <br><br>
            <input class="w3-input w3-round-large" type="text" name="newusername" id="newusername" value="" placeholder="eg. admin" required> <br><br>
            <label for="newpassword">New Password : </label> <br><br>
            <input class="w3-input w3-round-large" type="password" name="newpassword" id="newpassword" value="" placeholder="eg. password" required> <br><br><br>
            <button type="submit" class="w3-button w3-green w3-round-large">Confirm</button>
        </form>
    </div>
    <div class="w3-col m3">&nbsp;</div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.template.adminBootstrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>