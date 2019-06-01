<?php $__env->startSection('content'); ?>
<section class="w3-row w3-khaki w3-padding-64">
<div class="w3-col m3">&nbsp;</div>
<div class="w3-col m6 w3-container">
    <h2>My Restaurant</h2>
    <h4>Add Menu</h4> <hr style="background: green;height:1px;">
    <!-- Notification -->
    <?php if(isset($message)): ?>
        <h4 class="w3-green w3-padding-32 w3-panel"><?php echo e($message); ?></h4>
    <?php endif; ?>
    <?php if(isset($error)): ?>
        <h4 class="w3-red w3-padding-32 w3-panel"><?php echo e($error); ?></h4>
    <?php endif; ?>

    <form action="/addmenu" class="w3-padding-64" method="post" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

        <label for="menuname">Give Menu Name :</label> <br><br>
        <input class="w3-input w3-round-large" type="text" name="menuname" id="menuname" value="" placeholder="item" required> <br><br>
        <label for="price">Fill Price : </label> <br><br>
        <input class="w3-input w3-round-large" type="text" name="price" id="price" value="" placeholder="Just fill value" required> <br><br>
        <label for="file" class="w3-teal w3-padding-16 w3-panel w3-round-large">Choose Menu Photo</label>
        <input type="file" name="menuimg" id="file" required> <br><br>
        <button type="submit" name="addmenu" class="w3-button w3-green w3-round-large">Add to Cook</button>
    </form>
</div>
<div class="w3-col m3">&nbsp;</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.template.adminBootstrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>