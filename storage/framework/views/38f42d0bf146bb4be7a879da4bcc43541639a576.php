<?php $__env->startSection('content'); ?>
<?php if(isset($editForm)): ?>
    <section class="w3-row w3-khaki w3-padding-64">
    <div class="w3-col m3">&nbsp;</div>
    <div class="w3-col m6 w3-container">
        <h2>My Restaurant</h2>
        <h4>Edit</h4> <hr style="background: green;height:1px;">
        <!-- Notification -->
        <?php if(isset($message)): ?>
            <h4 class="w3-green w3-padding-32 w3-panel"><?php echo e($message); ?></h4>
        <?php endif; ?>
        <?php if(isset($error)): ?>
            <h4 class="w3-red w3-padding-32 w3-panel"><?php echo e($error); ?></h4>
        <?php endif; ?>

        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form action="editmenu" class="w3-padding-64" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

            <input type="hidden" name="menuID" value="<?php echo e($menu->id); ?>">
            <h4>Old Menu : <?php echo e($menu->menu); ?></h4>
            <label for="menuname">New Menu :</label> <br><br>
            <input class="w3-input w3-round-large" type="text" name="menuname" id="menuname" value="" placeholder="item" required> <br><br><br>
            <h4>Old Price : <?php echo e($menu->price); ?></h4>
            <label for="price">New Price :</label> <br><br>
            <input class="w3-input w3-round-large" type="text" name="price" id="price" value="" placeholder="Just fill value" required> <br><br><br>
            <h4>Old Menu Photo: </h4><br>
            <img src="/menu-img/<?php echo e($menu->img); ?>" alt="photo" style="width: 150px;height: 100px;" class="w3-round-large"><br><br>
            <label for="file" class="w3-teal w3-padding-16 w3-panel w3-round-large">Choose Menu Photo</label>
            <input type="file" name="menuimg" id="file" required> <br><br>
            <button type="submit" name="updatemenu" class="w3-button w3-green w3-round-large">Update Menu</button>
        </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="w3-col m3">&nbsp;</div>
    </section>
<?php else: ?>
    <section class="w3-row w3-khaki w3-padding-64">
    <div class="w3-col m3">&nbsp;</div>
    <div class="w3-col m6 w3-container">
        <h2>My Restaurant</h2>
        <h4>Edit Menu</h4> <hr style="background: green;height:1px;">
        <!-- Notification -->
        <?php if(isset($message)): ?>
            <h4 class="w3-green w3-padding-32 w3-panel"><?php echo e($message); ?></h4>
        <?php endif; ?>
        <?php if(isset($error)): ?>
            <h4 class="w3-red w3-padding-32 w3-panel"><?php echo e($error); ?></h4>
        <?php endif; ?>
        <section class="w3-dark-gray w3-panel w3-padding-32 w3-center">
        <h3>Menu List</h3> <br><br>
        <?php if(count($menus) <= 0): ?>
            <h4 class="w3-text-red">No Menu Found.</h4>
        <?php else: ?>
        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table class="menu-list w3-border">
            <tr>
                <td style="text-align:left;">ID : </td>
                <td><?php echo e($menu->id); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;">Menu : </td>
                <td><?php echo e($menu->menu); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;">Price : </td>
                <td>$ - <?php echo e($menu->price); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;">Item : </td>
                <td><img src="/menu-img/<?php echo e($menu->img); ?>" alt="photo" style="width: 150px;height: 100px;" class="w3-round-large"></td>
            </tr>
            </table> <br>
            <!-- For delete and edit action -->
            <form action="editmenu" method="post">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="menuID" value="<?php echo e($menu->id); ?>">
            <button name="deleteMenu" class="w3-btn w3-round-large w3-red w3-hover-teal" type="submit">Delete</button>
            <button name="editMenu" class="w3-btn w3-round-large w3-green w3-hover-teal" type="submit">Edit Menu</button>
            </form>
            <hr style="background:blue;height:1px;"> <br>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </section>
    </div>
    <div class="w3-col m3">&nbsp;</div>
    </section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.template.adminBootstrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>