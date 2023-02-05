  <div class="py-5">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-md-3 col-sm-6 my-3">
                  <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg"
                          alt="..." aria-label="Microsoft Logo" /></a>
              </div>
              <div class="col-md-3 col-sm-6 my-3">
                  <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg"
                          alt="..." aria-label="Google Logo" /></a>
              </div>
              <div class="col-md-3 col-sm-6 my-3">
                  <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg"
                          alt="..." aria-label="Facebook Logo" /></a>
              </div>
              <div class="col-md-3 col-sm-6 my-3">
                  <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..."
                          aria-label="IBM Logo" /></a>
              </div>
          </div>
      </div>
  </div>




  <section class="page-section" id="contact">
      <div class="container">
          <div class="text-center">
              <h2 class="section-heading text-uppercase">Contact Us</h2>
              <h3 class="section-subheading text-muted">
                  Lorem ipsum dolor sit amet consectetur.
              </h3>
          </div>

          <form id="contactForm" data-sb-form-api-token="API_TOKEN">
              <div class="row align-items-stretch mb-5">
                  <div class="col-md-6">
                      <div class="form-group">
                          <!-- Name input-->
                          <input class="form-control" id="name" type="text" placeholder="Your Name *"
                              data-sb-validations="required" />

                      </div>
                      <div class="form-group">
                          <!-- Email address input-->
                          <input class="form-control" id="email" type="email" placeholder="Your Email *"
                              data-sb-validations="required,email" />


                      </div>
                      <div class="form-group mb-md-0">
                          <!-- Phone number input-->
                          <input class="form-control" id="phone" type="tel" placeholder="Your Phone *"
                              data-sb-validations="required" />

                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group form-group-textarea mb-md-0">
                          <!-- Message input-->
                          <textarea class="form-control" id="message" placeholder="Your Message *"
                              data-sb-validations="required"></textarea>

                      </div>
                  </div>
              </div>

              <!-- Submit Button-->
              <div class="text-center">
                  <button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">
                      Send Message
                  </button>
              </div>
          </form>
      </div>
  </section>