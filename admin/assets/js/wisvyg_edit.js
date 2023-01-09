// first wysiwyg
function initTiny() {
  tinymce.init({
    selector: 'textarea#content',
    setup: function (editor) {
      editor.on('change', function () {
        editor.save()
      })
    },
    plugins:
      'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar:
      'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    image_prepend_url: 'https://www.example.com/images/',
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    mode: 'textareas',
    theme_advanced_buttons3_add: 'save',
    save_enablewhendirty: true,
    save_onsavecallback: 'mysave',

    templates: [
      {
        title: 'CTA',
        description: 'creates a new table',
        content: `<div class="cta_main">
        <div class="container-fluid mb-lg-5 pb-lg-5">
          <div class="row owl-carousel owl-theme" id="post_cta_slider">
          <div class="col-12 ctabox col-lg-11 mb-5 mb-md-0 ">
              <div class="cta_inside">
                <div class="ribbon">
                <div class="box">
                  <span>One-Time or Subscription</span>
                </div>
                </div>
                  <div class="cta_img">
                      <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                          alt="">
                  </div>
                  <div class="cta_content">
                      <p>Sildenafil</p>
                      <div class="cta_cd_span d-flex">
                      <img src="https://i.ibb.co/cwNVVwD/13-Pro-2.png">
                          <span>Effective for 62-82% of men</span>
                      </div>
                      <div class="cta_cd_span d-flex">
                      <img src="https://i.ibb.co/cwNVVwD/13-Pro-2.png">
                          <span>Works in 1hr and lasts 4-5hrs</span>
                      </div>
                  </div>
                  <div class="cta_cd_button">
                      <p><span> $37.00</span></p>
                      <button>View</button>
                  </div>
              </div>
            </div>
            <div class="col-12 ctabox col-lg-11 mb-5 mb-md-0 ">
              <div class="cta_inside">
                <div class="ribbon">
                <div class="box">
                  <span>One-Time or Subscription</span>
                </div>
                </div>
                  <div class="cta_img">
                      <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                          alt="">
                  </div>
                  <div class="cta_content">
                     <p>Sildenafil</p>
                      <div class="cta_cd_span d-flex">
                      <img src="https://i.ibb.co/cwNVVwD/13-Pro-2.png">
                          <span>Effective for 62-82% of men</span>
                      </div>
                      <div class="cta_cd_span d-flex">
                      <img src="https://i.ibb.co/cwNVVwD/13-Pro-2.png">
                          <span>Works in 1hr and lasts 4-5hrs</span>
                      </div>
                  </div>
                  <div class="cta_cd_button">
                      <p><span> $37.00</span></p>
                      <button>View</button>
                  </div>
              </div>
            </div>
            <div class="col-12 ctabox col-lg-11 mb-5 mb-md-0 ">
              <div class="cta_inside">
                <div class="ribbon">
                <div class="box">
                  <span>One-Time or Subscription</span>
                </div>
                </div>
                  <div class="cta_img">
                      <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                          alt="">
                  </div>
                  <div class="cta_content">
                     <p>Sildenafil</p>
                      <div class="cta_cd_span d-flex">
                      <img src="https://i.ibb.co/cwNVVwD/13-Pro-2.png">
                          <span>Effective for 62-82% of men</span>
                      </div>
                      <div class="cta_cd_span d-flex">
                      <img src="https://i.ibb.co/cwNVVwD/13-Pro-2.png">
                          <span>Works in 1hr and lasts 4-5hrs</span>
                      </div>
                  </div>
                  <div class="cta_cd_button">
                      <p><span> $37.00</span></p>
                      <button>View</button>
                  </div>
              </div>
            </div>
            <div class="col-12 ctabox col-lg-11 mb-5 mb-md-0 ">
              <div class="cta_inside">
                <div class="ribbon">
                <div class="box">
                  <span>One-Time or Subscription</span>
                </div>
                </div>
                  <div class="cta_img">
                      <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                          alt="">
                  </div>
                  <div class="cta_content">
                     <p>Sildenafil</p>
                      <div class="cta_cd_span d-flex">
                      <img src="https://i.ibb.co/cwNVVwD/13-Pro-2.png">
                          <span>Effective for 62-82% of men</span>
                      </div>
                      <div class="cta_cd_span d-flex">
                      <img src="https://i.ibb.co/cwNVVwD/13-Pro-2.png">
                          <span>Works in 1hr and lasts 4-5hrs</span>
                      </div>
                  </div>
                  <div class="cta_cd_button">
                      <p><span> $37.00</span></p>
                      <button>View</button>
                  </div>
              </div>
            </div> 
          </div>
        </div>
      </div>`,
      },
      {
        title: 'Products Content 10',
        description: 'creates a new table',
        content: `<div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-1">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-1"
              aria-expanded="true"
              aria-controls="panelsStayOpen-collapse-1"
            >
             1. What is PEs 
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-1"
            class="accordion-collapse collapse show"
            aria-labelledby="panelsStayOpen-heading-1"
          >
            <div class="accordion-body">
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, rerum cum reiciendis fugiat officiis, suscipit ducimus minima illo omnis, accusamus fuga? Delectus laborum, distinctio, fuga laboriosam tenetur, soluta eveniet voluptate quis dolore atque vel temporibus? Sint perferendis accusantium a, reiciendis quos voluptas recusandae assumenda odio ex facere neque et repudiandae nisi autem sed id. Sapiente in, aliquid id beatae deleniti officiis possimus molestiae eveniet fugit perferendis quibusdam illo recusandae quia aperiam consequatur vel incidunt ex vero facilis nobis quas quaerat. Aspernatur quaerat, esse cum atque id quae asperiores deleniti itaque?</p>
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-3">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-3"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-3"
            >
             2. Conclusion 
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-3"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-3"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-4">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-4"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-4"
            >
            3.  Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-4"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-4"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-5">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-5"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-5"
            >
            4.  Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-5"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-5"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-6">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-6"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-6"
            >
            5.  Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-6"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-6"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-7">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-7"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-7"
            >
            6. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-7"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-7"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-8">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-8"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-8"
            >
            7. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-8"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-8"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-9">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-9"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-9"
            >
             8. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-9"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-9"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-2">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-2"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-2"
            >
             9. FAQ's
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-2"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-2"
          >
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>

        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-10">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-10"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-10"
            >
             10. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-10"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-10"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>

      </div>`,
      },
      {
        title: 'Products Content 15',
        description: 'creates a new table',
        content: `<div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-1">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-1"
              aria-expanded="true"
              aria-controls="panelsStayOpen-collapse-1"
            >
             1. What is PEs 
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-1"
            class="accordion-collapse collapse show"
            aria-labelledby="panelsStayOpen-heading-1"
          >
            <div class="accordion-body">
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, rerum cum reiciendis fugiat officiis, suscipit ducimus minima illo omnis, accusamus fuga? Delectus laborum, distinctio, fuga laboriosam tenetur, soluta eveniet voluptate quis dolore atque vel temporibus? Sint perferendis accusantium a, reiciendis quos voluptas recusandae assumenda odio ex facere neque et repudiandae nisi autem sed id. Sapiente in, aliquid id beatae deleniti officiis possimus molestiae eveniet fugit perferendis quibusdam illo recusandae quia aperiam consequatur vel incidunt ex vero facilis nobis quas quaerat. Aspernatur quaerat, esse cum atque id quae asperiores deleniti itaque?</p>
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-3">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-3"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-3"
            >
             2. Conclusion 
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-3"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-3"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-4">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-4"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-4"
            >
            3.  Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-4"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-4"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-5">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-5"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-5"
            >
            4.  Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-5"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-5"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-6">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-6"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-6"
            >
            5.  Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-6"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-6"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-7">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-7"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-7"
            >
            6. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-7"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-7"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-8">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-8"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-8"
            >
            7. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-8"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-8"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-9">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-9"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-9"
            >
             8. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-9"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-9"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-2">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-2"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-2"
            >
             9. FAQ's
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-2"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-2"
          >
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>

        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-10">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-10"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-10"
            >
             10. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-10"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-10"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>

        <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="panelsStayOpen-heading-11">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#panelsStayOpen-collapse-11"
            aria-expanded="false"
            aria-controls="panelsStayOpen-collapse-11"
          >
           11. Conclusion
          </button>
        </h2>
        <div
          id="panelsStayOpen-collapse-11"
          class="accordion-collapse collapse"
          aria-labelledby="panelsStayOpen-heading-11"
        >
          <div class="accordion-body">
            <strong>This is the third item's accordion body.</strong> It
            is hidden by default, until the collapse plugin adds the
            appropriate classes that we use to style each element. These
            classes control the overall appearance, as well as the showing
            and hiding via CSS transitions. You can modify any of this
            with custom CSS or overriding our default variables. It's also
            worth noting that just about any HTML can go within the
            <code>.accordion-body</code>, though the transition does limit
            overflow.
          </div>
        </div>
      </div>
      <div class="accordion-item mb-3">
      <h2 class="accordion-header" id="panelsStayOpen-heading-12">
        <button
          class="accordion-button collapsed"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapse-12"
          aria-expanded="false"
          aria-controls="panelsStayOpen-collapse-12"
        >
         12. Conclusion
        </button>
      </h2>
      <div
        id="panelsStayOpen-collapse-12"
        class="accordion-collapse collapse"
        aria-labelledby="panelsStayOpen-heading-12"
      >
        <div class="accordion-body">
          <strong>This is the third item's accordion body.</strong> It
          is hidden by default, until the collapse plugin adds the
          appropriate classes that we use to style each element. These
          classes control the overall appearance, as well as the showing
          and hiding via CSS transitions. You can modify any of this
          with custom CSS or overriding our default variables. It's also
          worth noting that just about any HTML can go within the
          <code>.accordion-body</code>, though the transition does limit
          overflow.
        </div>
      </div>
    </div>

    <div class="accordion-item mb-3">
    <h2 class="accordion-header" id="panelsStayOpen-heading-13">
      <button
        class="accordion-button collapsed"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#panelsStayOpen-collapse-13"
        aria-expanded="false"
        aria-controls="panelsStayOpen-collapse-13"
      >
       13. Conclusion
      </button>
    </h2>
    <div
      id="panelsStayOpen-collapse-13"
      class="accordion-collapse collapse"
      aria-labelledby="panelsStayOpen-heading-13"
    >
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It
        is hidden by default, until the collapse plugin adds the
        appropriate classes that we use to style each element. These
        classes control the overall appearance, as well as the showing
        and hiding via CSS transitions. You can modify any of this
        with custom CSS or overriding our default variables. It's also
        worth noting that just about any HTML can go within the
        <code>.accordion-body</code>, though the transition does limit
        overflow.
      </div>
    </div>
  </div>

  <div class="accordion-item mb-3">
  <h2 class="accordion-header" id="panelsStayOpen-heading-14">
    <button
      class="accordion-button collapsed"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#panelsStayOpen-collapse-14"
      aria-expanded="false"
      aria-controls="panelsStayOpen-collapse-14"
    >
     14. Conclusion
    </button>
  </h2>
  <div
    id="panelsStayOpen-collapse-14"
    class="accordion-collapse collapse"
    aria-labelledby="panelsStayOpen-heading-14"
  >
    <div class="accordion-body">
      <strong>This is the third item's accordion body.</strong> It
      is hidden by default, until the collapse plugin adds the
      appropriate classes that we use to style each element. These
      classes control the overall appearance, as well as the showing
      and hiding via CSS transitions. You can modify any of this
      with custom CSS or overriding our default variables. It's also
      worth noting that just about any HTML can go within the
      <code>.accordion-body</code>, though the transition does limit
      overflow.
    </div>
  </div>
</div>

<div class="accordion-item mb-3">
<h2 class="accordion-header" id="panelsStayOpen-heading-15">
  <button
    class="accordion-button collapsed"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#panelsStayOpen-collapse-15"
    aria-expanded="false"
    aria-controls="panelsStayOpen-collapse-15"
  >
   15. Conclusion
  </button>
</h2>
<div
  id="panelsStayOpen-collapse-15"
  class="accordion-collapse collapse"
  aria-labelledby="panelsStayOpen-heading-15"
>
  <div class="accordion-body">
    <strong>This is the third item's accordion body.</strong> It
    is hidden by default, until the collapse plugin adds the
    appropriate classes that we use to style each element. These
    classes control the overall appearance, as well as the showing
    and hiding via CSS transitions. You can modify any of this
    with custom CSS or overriding our default variables. It's also
    worth noting that just about any HTML can go within the
    <code>.accordion-body</code>, though the transition does limit
    overflow.
  </div>
</div>
</div>



      </div>`,
      },
      {
        title: 'FAQ',
        description: 'FAQ Accordian',
        content: `<div class="accordion bottom-accordion-section" id="accordionPanelsStayOpenExample">
        <div class="accordion-item mb-3">
          <h3 class="accordion-header accordian-heading" id="panelsStayOpen-heading-1">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-1"
              aria-expanded="true"
              aria-controls="panelsStayOpen-collapse-1"
            >
             1. What is PEs 
            </button>
          </h3>
          <div
            id="panelsStayOpen-collapse-1"
            class="accordion-collapse collapse show"
            aria-labelledby="panelsStayOpen-heading-1"
          >
            <div class="accordion-body">
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, rerum cum reiciendis fugiat officiis, suscipit ducimus minima illo omnis, accusamus fuga? Delectus laborum, distinctio, fuga laboriosam tenetur, soluta eveniet voluptate quis dolore atque vel temporibus? Sint perferendis accusantium a, reiciendis quos voluptas recusandae assumenda odio ex facere neque et repudiandae nisi autem sed id. Sapiente in, aliquid id beatae deleniti officiis possimus molestiae eveniet fugit perferendis quibusdam illo recusandae quia aperiam consequatur vel incidunt ex vero facilis nobis quas quaerat. Aspernatur quaerat, esse cum atque id quae asperiores deleniti itaque?</p>
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h3 class="accordion-header accordian-heading" id="panelsStayOpen-heading-3">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-3"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-3"
            >
             2. Conclusion 
            </button>
          </h3>
          <div
            id="panelsStayOpen-collapse-3"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-3"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h3 class="accordion-header accordian-heading" id="panelsStayOpen-heading-4">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-4"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-4"
            >
            3.  Conclusion
            </button>
          </h3>
          <div
            id="panelsStayOpen-collapse-4"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-4"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h3 class="accordion-header accordian-heading" id="panelsStayOpen-heading-5">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-5"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-5"
            >
            4.  Conclusion
            </button>
          </h3>
          <div
            id="panelsStayOpen-collapse-5"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-5"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h3 class="accordion-header accordian-heading" id="panelsStayOpen-heading-6">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-6"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-6"
            >
            5.  Conclusion
            </button>
          </h3>
          <div
            id="panelsStayOpen-collapse-6"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-6"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h3 class="accordion-header accordian-heading" id="panelsStayOpen-heading-7">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-7"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-7"
            >
            6. Conclusion
            </button>
          </h3>
          <div
            id="panelsStayOpen-collapse-7"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-7"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h3 class="accordion-header accordian-heading" id="panelsStayOpen-heading-8">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-8"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-8"
            >
            7. Conclusion
            </button>
          </h3>
          <div
            id="panelsStayOpen-collapse-8"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-8"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h3 class="accordion-header accordian-heading" id="panelsStayOpen-heading-9">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-9"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-9"
            >
             8. Conclusion
            </button>
          </h3>
          <div
            id="panelsStayOpen-collapse-9"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-9"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h3 class="accordion-header accordian-heading" id="panelsStayOpen-heading-2">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-2"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-2"
            >
             9. FAQ's
            </button>
          </h3>
          <div
            id="panelsStayOpen-collapse-2"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-2"
          >
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>

        <div class="accordion-item mb-3">
          <h3 class="accordion-header accordian-heading" id="panelsStayOpen-heading-10">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-10"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-10"
            >
             10. Conclusion
            </button>
          </h3>
          <div
            id="panelsStayOpen-collapse-10"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-10"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>

      </div>`,
      },
      {
        title: 'Add Read More Btn',
        description: 'add btn',
        content: `<a class="moreless-button">Read more...</a></span></p>`,
      },
      {
        title: 'Three Column Image',
        description: 'creates a new table',
        content: `
    <div class="img_with_para my-4 row d-block d-md-flex">
              <div class="col mb-4 mb-md-0">
                <img src="https://web-static.wrike.com/blog/content/uploads/2016/11/iStock-492785970.jpg?av=f9b41860b73b93b38b906a96accd10e2" alt="">
              </div>
              <div class="col">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet
                  natus facere, ratione ut non, maxime voluptates id pariatur
                  dolorem officia, repellendus illum libero modi nisi
                  reprehenderit asperiores sint ullam necessitatibus.
              </div>
            </div>
            <div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
              quas ipsam maxime magnam, reiciendis consequuntur voluptatum
              dignissimos. Ratione sint corrupti quia neque adipisci? Quos saepe
              impedit cupiditate eius nam commodi?
            </div>
            <hr>
            <p></p>
    `,
      },
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar:
      'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image imagetools table',
    content_style:
      'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
  })
}
initTiny()

// second wysiwyg
function initTinyproduct() {
  tinymce.init({
    selector: 'textarea#shrt_desc',
    setup: function (editor) {
      editor.on('change', function () {
        editor.save()
      })
    },
    plugins:
      'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar:
      'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    mode: 'textareas',
    theme_advanced_buttons3_add: 'save',
    save_enablewhendirty: true,
    save_onsavecallback: 'mysave',
    templates: [
      {
        title: 'Products Content',
        description: 'creates a new table',
        content: `<div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-1">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-1"
              aria-expanded="true"
              aria-controls="panelsStayOpen-collapse-1"
            >
             1. What is PEs 
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-1"
            class="accordion-collapse collapse show"
            aria-labelledby="panelsStayOpen-heading-1"
          >
            <div class="accordion-body">
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, rerum cum reiciendis fugiat officiis, suscipit ducimus minima illo omnis, accusamus fuga? Delectus laborum, distinctio, fuga laboriosam tenetur, soluta eveniet voluptate quis dolore atque vel temporibus? Sint perferendis accusantium a, reiciendis quos voluptas recusandae assumenda odio ex facere neque et repudiandae nisi autem sed id. Sapiente in, aliquid id beatae deleniti officiis possimus molestiae eveniet fugit perferendis quibusdam illo recusandae quia aperiam consequatur vel incidunt ex vero facilis nobis quas quaerat. Aspernatur quaerat, esse cum atque id quae asperiores deleniti itaque?</p>
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-3">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-3"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-3"
            >
             2. Conclusion 
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-3"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-3"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-4">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-4"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-4"
            >
            3.  Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-4"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-4"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-5">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-5"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-5"
            >
            4.  Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-5"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-5"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-6">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-6"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-6"
            >
            5.  Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-6"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-6"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-7">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-7"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-7"
            >
            6. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-7"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-7"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-8">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-8"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-8"
            >
            7. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-8"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-8"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-9">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-9"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-9"
            >
             8. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-9"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-9"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-2">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-2"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-2"
            >
             9. FAQ's
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-2"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-2"
          >
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>

        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-heading-10">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapse-10"
              aria-expanded="false"
              aria-controls="panelsStayOpen-collapse-10"
            >
             10. Conclusion
            </button>
          </h2>
          <div
            id="panelsStayOpen-collapse-10"
            class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-heading-10"
          >
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It
              is hidden by default, until the collapse plugin adds the
              appropriate classes that we use to style each element. These
              classes control the overall appearance, as well as the showing
              and hiding via CSS transitions. You can modify any of this
              with custom CSS or overriding our default variables. It's also
              worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit
              overflow.
            </div>
          </div>
        </div>
      </div>`,
      },
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar:
      'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image imagetools table',
    content_style:
      'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
  })
}
initTinyproduct()

$('.tox-tinymce .tox-menubar').append(
  '<button aria-haspopup="true" role="menuitem" type="button" tabindex="-1" data-alloy-tabstop="true" unselectable="on" class="tox-mbtn tox-mbtn--select" aria-expanded="false" style="user-select: none;"><span class="tox-mbtn__select-label">File</span><div class="tox-mbtn__select-chevron"><svg width="10" height="10" focusable="false"><path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z" fill-rule="nonzero"></path></svg></div></button>',
)
