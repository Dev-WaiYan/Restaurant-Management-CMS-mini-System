<?php $__env->startSection('content'); ?>
    <section class="w3-khaki w3-row w3-padding-64">
    <div class="w3-col m3">&nbsp;</div>
    <div class="w3-col m6 w3-card-4 w3-light-gray w3-center w3-padding-32 w3-round-xlarge">
    <h2>Bookings</h2> <br>
    <?php if(isset($message)): ?>
        <div class="w3-teal w3-padding-32">
        <h3><?php echo e($message); ?></h3>
        <a href="bookinglist"><button class="w3-btn w3-light-grey">Got it</button></a>
        </div> <br>
    <?php endif; ?>

    <?php if(count($bookingLists) > 0): ?>
    <?php $__currentLoopData = $bookingLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table class="booking-list">
            <tr>
                <td style="text-align:left;">Customer ID : </td>
                <td><?php echo e($booking->id); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;">Customer Name : </td>
                <td><?php echo e($booking->customerName); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;">Email : </td>
                <td><?php echo e($booking->email); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;">Phone : </td>
                <td><?php echo e($booking->phone); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;">Date : </td>
                <td><?php echo e($booking->date); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;">Time : </td>
                <td><?php echo e($booking->time); ?> - <?php echo e($booking->timePartition); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;">Number of Table : </td>
                <td><?php echo e($booking->tables); ?></td>
            </tr>
        </table> <br>
    <!-- For delete action -->
        <form action="bookingDelete" method="post">
        <?php echo e(csrf_field()); ?>

        <button class="w3-btn w3-round-large w3-red w3-hover-teal" type="submit">Delete Selected Bookings</button>
        <br><br><label class="w3-text-red">Choose to delete </label> <br>
        <input type="checkbox" name="customerID[]" value="<?php echo e($booking->id); ?>">
        <hr style="background:red;height:1px;">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </form>

    <?php else: ?>
    <h2 class="w3-text-red">No Booking Exist.</h2>
    <?php endif; ?>
    </div>
    <div class="w3-col m3">&nbsp;</div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.template.adminBootstrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>