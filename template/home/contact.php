
  <section id="main-container" class="main-container">
      <div class="container">

         <div class="row text-center">

            <h3 class="section-sub-title">Contact Us</h3>
         </div><!--/ Title row end -->

         <div class="row">
<div class="col-md-2"></div>
            <div class="col-md-4">
               <div class="ts-service-box-bg text-center">
                  <span class="ts-service-icon icon-round">
                     <i class="fa fa-envelope"></i>
                  </span>
                  <div class="ts-service-box-content">
                     <h4>Email Us</h4>
                     <p>admin@eprocloud.com</p>
                 </div>
               </div>
            </div><!-- Col 2 end -->

            <div class="col-md-4">
               <div class="ts-service-box-bg text-center">
                  <span class="ts-service-icon icon-round">
                     <i class="fa fa-phone-square"></i>
                  </span>
                  <div class="ts-service-box-content">
                     <h4>Call Us</h4>
                     <p>+234 8030003004</p>
                 </div>
               </div>
            </div><!-- Col 3 end -->
<div class="col-md-2"></div>
         </div><!-- 1st row end -->

         <div class="gap-40"></div>
<hr/>
         <div class="row">

            <div class="col-md-12">

               <h3 class="column-title">Message us directly</h3>

               <form id="contact-form">
                  <div class="error-container"></div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Name</label>
                        <input class="form-control form-control-name" name="name" id="name" placeholder="Full Name" type="text" required>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control form-control-email" name="email" id="email"
                           placeholder="Email address" type="email" required>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Subject</label>
                           <input class="form-control form-control-subject" name="subject" id="subject"
                           placeholder="Subject" required>
                        </div>
                     </div>
										 <input type="hidden" name="date" value="<?php echo date('d F, Y');?>"
                  </div>
                  <div class="form-group">
                     <label>Message</label>
                     <textarea class="form-control form-control-message" name="message" id="message" placeholder="Your Message Here..." rows="10" required></textarea>
                  </div>
                  <div class="text-right"><br>
                     <button class="btn btn-primary solid blank" type="button" id="send">Send Message <i id="loading" class="fa fa-cog fa-spin"></i></button>
                  </div>
               </form>
            </div>

         </div><!-- Content row -->
      </div><!-- Conatiner end -->
   </section><!-- Main container end -->
	 <script>
	 $(document).ready(function() {

	 //Hide all loading icons
	 $('#loading').hide();

	 $('#send').on('click',function() {
	 $('#loading').show();
	 $.ajax({
	   url:'<?php echo base_url()."home/send_message";?>',
	   type: "POST",
	   data: $('#contact-form').serialize(),
	   success:function(data) {
	 $('#loading').hide();
	 if(data="true") {
	 alert("Your Message has been sent, You'll be replied directly to your mail shortly");
	 window.location.href = "<?php echo base_url();?>";
	 } else {
	   alert(data);
	 }
	   }
	 })
	 });

	 });
	 </script>
