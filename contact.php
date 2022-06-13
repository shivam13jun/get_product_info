<?php include "header.php"; ?>

<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="container">
    <div class="row">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="">Your name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">Your email</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Contact Number</label>
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message">Your message</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row-->
 <div class="text-center text-md-left">
               <button type="submit" name="submit" id="save" class="btn btn-success">
          Submit
        </button>
            </form>

           
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        

    </div>
    </div>
    

</section>
<!--Section: Contact v.2-->

<?php include "footer.php"; ?>