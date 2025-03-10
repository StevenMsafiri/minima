<?php $this->view("minima/header", $data) ?>

        <section class="section background-white">
            <div class="s-12 m-12 l-4 center">
                <h4 class="text-size-20 margin-bottom-20 text-dark text-center">Upload Image</h4>
                <form name="contactForm" class="customform" method="post">
                    <div class="s-12">
                        <input name="title" class="subject" placeholder="Enter a title" title="title" type="text" required>
                        <p class="subject-error form-error">Please enter the title.</p>
                    </div>

                    <div class="s-12">
                        <input name="file" class="subject" placeholder="Image file" title="Subject" type="file" required>
                        <p class="subject-error form-error">Please upload your file.</p>
                    </div>

                    <div class="s-12">
                        <textarea name="message" class="required message" placeholder="Description" rows="3"></textarea>
                        <p class="message-error form-error">Please enter your image description.</p>
                    </div>


                    <div class="s-12"><button class="s-12 submit-form button background-primary text-white" type="submit">Submit Button</button></div>
                </form>
            </div>
        </section>
<?php $this->view("minima/footer", $data) ?>