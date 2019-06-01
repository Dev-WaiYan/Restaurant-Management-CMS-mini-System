<?php $__env->startSection('content'); ?>
<header class="w3-center">
    <section>
        <h1>
            My Restaurant
        </h1>
        <h3>
            Welcome. Let's Eat.
        </h3> <br>
        <a href="menu"><button class="w3-text-white w3-large w3-border w3-red w3-border-green w3-hover-white w3-padding-16 w3-round-xxlarge">Available Foods</button></a>
    </section>
</header>

<!-- About -->
<section class="w3-gray w3-padding-16 w3-center w3-text-white about">
    <h2>About</h2> <br>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum deleniti reiciendis eveniet doloremque esse perferendis quia soluta sed facere molestias laudantium, accusantium inventore a debitis exercitationem. Quam facilis eligendi ea!</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quisquam cumque expedita suscipit iure quia ad saepe explicabo, labore quasi eos quo nihil commodi quibusdam ab ea alias nulla odit.</p>
    <br>
    <h3>Location</h3>
    <div class="w3-container">
        <div class="w3-col m3">&nbsp;</div>
        <div class="w3-card-4 w3-center w3-panel w3-sand w3-col m6 w3-round-xlarge">
        <h3>My Restaurant</h3> <i class="glyphicon glyphicon-home"></i> <br><br>
        <address>Address: No.000, Sule Yangon, Myanmar</address>
        <address>Bus : 1,2,3,4</address>
        </div>
        <div class="w3-col m3">&nbsp;</div>
    </div>
</section>

<!-- Contact -->
<section class="w3-dark-gray w3-padding-16 w3-center">
    <h2>Contact us:</h2> <i class="glyphicon glyphicon-ok-sign"></i> <br>
    <div class="w3-container">
        <div class="w3-col m3">&nbsp;</div>
        <div class="w3-card-4 w3-center w3-panel w3-sand w3-col m6 w3-round-large w3-padding-16">
        <p><i class="glyphicon glyphicon-phone-alt"></i> :&nbsp;&nbsp; 000-000-000</p>
        <p><i class="glyphicon glyphicon glyphicon-thumbs-up"></i> :&nbsp;&nbsp; myrestaurant/facebook.com</p>
        <p><i class="glyphicon glyphicon glyphicon-envelope"></i> :&nbsp;&nbsp; myrestaurant@gmail.com</p>
        <p><i class="glyphicon glyphicon-home"></i> :&nbsp;&nbsp; No.000, Sule Yangon, Myanmar</p>
        </div>
        <div class="w3-col m3">&nbsp;</div> <br>
        <div class="w3-col m12">
        <a href="booking"><p class="w3-center w3-text-orange">You can get booking via our website. Go to Booking.</p></a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.template.bootstrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>