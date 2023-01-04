!(function (s) {
  'use strict'
  var e,
    t = localStorage.getItem('language'),
    n = 'en'
  function a(e) {
    document.getElementById('header-lang-img') &&
      ('en' == e
        ? (document.getElementById('header-lang-img').src =
            'assets/images/flags/us.jpg')
        : 'sp' == e
        ? (document.getElementById('header-lang-img').src =
            'assets/images/flags/spain.jpg')
        : 'gr' == e
        ? (document.getElementById('header-lang-img').src =
            'assets/images/flags/germany.jpg')
        : 'it' == e
        ? (document.getElementById('header-lang-img').src =
            'assets/images/flags/italy.jpg')
        : 'ru' == e &&
          (document.getElementById('header-lang-img').src =
            'assets/images/flags/russia.jpg'),
      localStorage.setItem('language', e),
      null == (t = localStorage.getItem('language')) && a(n),
      s.getJSON('assets/lang/' + t + '.json', function (e) {
        s('html').attr('lang', t),
          s.each(e, function (e, t) {
            'head' === e && s(document).attr('title', t.title),
              s("[key='" + e + "']").text(t)
          })
      }))
  }
  function c() {
    for (
      var e = document
          .getElementById('topnav-menu-content')
          .getElementsByTagName('a'),
        t = 0,
        s = e.length;
      t < s;
      t++
    )
      'nav-item dropdown active' === e[t].parentElement.getAttribute('class') &&
        (e[t].parentElement.classList.remove('active'),
        null !== e[t].nextElementSibling &&
          e[t].nextElementSibling.classList.remove('show'))
  }
  function r(e) {
    1 == s('#light-mode-switch').prop('checked') && 'light-mode-switch' === e
      ? (s('html').removeAttr('dir'),
        s('#dark-mode-switch').prop('checked', !1),
        s('#rtl-mode-switch').prop('checked', !1),
        s('#dark-rtl-mode-switch').prop('checked', !1),
        s('#bootstrap-style').attr('href', 'assets/css/bootstrap.min.css'),
        s('#app-style').attr('href', 'assets/css/app.min.css'),
        sessionStorage.setItem('is_visited', 'light-mode-switch'))
      : 1 == s('#dark-mode-switch').prop('checked') && 'dark-mode-switch' === e
      ? (s('html').removeAttr('dir'),
        s('#light-mode-switch').prop('checked', !1),
        s('#rtl-mode-switch').prop('checked', !1),
        s('#dark-rtl-mode-switch').prop('checked', !1),
        s('#bootstrap-style').attr('href', 'assets/css/bootstrap-dark.min.css'),
        s('#app-style').attr('href', 'assets/css/app-dark.min.css'),
        sessionStorage.setItem('is_visited', 'dark-mode-switch'))
      : 1 == s('#rtl-mode-switch').prop('checked') && 'rtl-mode-switch' === e
      ? (s('#light-mode-switch').prop('checked', !1),
        s('#dark-mode-switch').prop('checked', !1),
        s('#dark-rtl-mode-switch').prop('checked', !1),
        s('#bootstrap-style').attr('href', 'assets/css/bootstrap-rtl.min.css'),
        s('#app-style').attr('href', 'assets/css/app-rtl.min.css'),
        s('html').attr('dir', 'rtl'),
        sessionStorage.setItem('is_visited', 'rtl-mode-switch'))
      : 1 == s('#dark-rtl-mode-switch').prop('checked') &&
        'dark-rtl-mode-switch' === e &&
        (s('#light-mode-switch').prop('checked', !1),
        s('#rtl-mode-switch').prop('checked', !1),
        s('#dark-mode-switch').prop('checked', !1),
        s('#bootstrap-style').attr(
          'href',
          'assets/css/bootstrap-dark-rtl.min.css',
        ),
        s('#app-style').attr('href', 'assets/css/app-dark-rtl.min.css'),
        s('html').attr('dir', 'rtl'),
        sessionStorage.setItem('is_visited', 'dark-rtl-mode-switch'))
  }
  function l() {
    document.webkitIsFullScreen ||
      document.mozFullScreen ||
      document.msFullscreenElement ||
      (console.log('pressed'), s('body').removeClass('fullscreen-enable'))
  }
  s('#side-menu').metisMenu(),
    s('#vertical-menu-btn').on('click', function (e) {
      e.preventDefault(),
        s('body').toggleClass('sidebar-enable'),
        992 <= s(window).width()
          ? s('body').toggleClass('vertical-collpsed')
          : s('body').removeClass('vertical-collpsed')
    }),
    s('#sidebar-menu a').each(function () {
      var e = window.location.href.split(/[?#]/)[0]
      this.href == e &&
        (s(this).addClass('active'),
        s(this).parent().addClass('mm-active'),
        s(this).parent().parent().addClass('mm-show'),
        s(this).parent().parent().prev().addClass('mm-active'),
        s(this).parent().parent().parent().addClass('mm-active'),
        s(this).parent().parent().parent().parent().addClass('mm-show'),
        s(this)
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .addClass('mm-active'))
    }),
    s(document).ready(function () {
      var e
      0 < s('#sidebar-menu').length &&
        0 < s('#sidebar-menu .mm-active .active').length &&
        300 < (e = s('#sidebar-menu .mm-active .active').offset().top) &&
        ((e -= 300),
        s('.vertical-menu .simplebar-content-wrapper').animate(
          { scrollTop: e },
          'slow',
        ))
    }),
    s('.navbar-nav a').each(function () {
      var e = window.location.href.split(/[?#]/)[0]
      this.href == e &&
        (s(this).addClass('active'),
        s(this).parent().addClass('active'),
        s(this).parent().parent().addClass('active'),
        s(this).parent().parent().parent().addClass('active'),
        s(this).parent().parent().parent().parent().addClass('active'),
        s(this).parent().parent().parent().parent().parent().addClass('active'),
        s(this)
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .addClass('active'))
    }),
    s('[data-bs-toggle="fullscreen"]').on('click', function (e) {
      e.preventDefault(),
        s('body').toggleClass('fullscreen-enable'),
        document.fullscreenElement ||
        document.mozFullScreenElement ||
        document.webkitFullscreenElement
          ? document.cancelFullScreen
            ? document.cancelFullScreen()
            : document.mozCancelFullScreen
            ? document.mozCancelFullScreen()
            : document.webkitCancelFullScreen &&
              document.webkitCancelFullScreen()
          : document.documentElement.requestFullscreen
          ? document.documentElement.requestFullscreen()
          : document.documentElement.mozRequestFullScreen
          ? document.documentElement.mozRequestFullScreen()
          : document.documentElement.webkitRequestFullscreen &&
            document.documentElement.webkitRequestFullscreen(
              Element.ALLOW_KEYBOARD_INPUT,
            )
    }),
    document.addEventListener('fullscreenchange', l),
    document.addEventListener('webkitfullscreenchange', l),
    document.addEventListener('mozfullscreenchange', l),
    s('.right-bar-toggle').on('click', function (e) {
      s('body').toggleClass('right-bar-enabled')
    }),
    s(document).on('click', 'body', function (e) {
      0 < s(e.target).closest('.right-bar-toggle, .right-bar').length ||
        s('body').removeClass('right-bar-enabled')
    }),
    (function () {
      if (document.getElementById('topnav-menu-content')) {
        for (
          var e = document
              .getElementById('topnav-menu-content')
              .getElementsByTagName('a'),
            t = 0,
            s = e.length;
          t < s;
          t++
        )
          e[t].onclick = function (e) {
            '#' === e.target.getAttribute('href') &&
              (e.target.parentElement.classList.toggle('active'),
              e.target.nextElementSibling.classList.toggle('show'))
          }
        window.addEventListener('resize', c)
      }
    })(),
    [].slice
      .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      .map(function (e) {
        return new bootstrap.Tooltip(e)
      }),
    [].slice
      .call(document.querySelectorAll('[data-bs-toggle="popover"]'))
      .map(function (e) {
        return new bootstrap.Popover(e)
      }),
    [].slice.call(document.querySelectorAll('.offcanvas')).map(function (e) {
      return new bootstrap.Offcanvas(e)
    }),
    window.sessionStorage &&
      ((e = sessionStorage.getItem('is_visited'))
        ? (s('.right-bar input:checkbox').prop('checked', !1),
          s('#' + e).prop('checked', !0),
          r(e))
        : sessionStorage.setItem('is_visited', 'light-mode-switch')),
    s(
      '#light-mode-switch, #dark-mode-switch, #rtl-mode-switch, #dark-rtl-mode-switch',
    ).on('change', function (e) {
      r(e.target.id)
    }),
    s('#password-addon').on('click', function () {
      0 < s(this).siblings('input').length &&
        ('password' == s(this).siblings('input').attr('type')
          ? s(this).siblings('input').attr('type', 'input')
          : s(this).siblings('input').attr('type', 'password'))
    }),
    null != t && t !== n && a(t),
    s('.language').on('click', function (e) {
      a(s(this).attr('data-lang'))
    }),
    s(window).on('load', function () {
      s('#status').fadeOut(), s('#preloader').delay(350).fadeOut('slow')
    }),
    Waves.init(),
    s('#checkAll').on('change', function () {
      s('.table-check .form-check-input').prop(
        'checked',
        s(this).prop('checked'),
      )
    }),
    s('.table-check .form-check-input').change(function () {
      s('.table-check .form-check-input:checked').length ==
      s('.table-check .form-check-input').length
        ? s('#checkAll').prop('checked', !0)
        : s('#checkAll').prop('checked', !1)
    })
})(jQuery)

function initTiny() {
  tinymce.init({
    selector: 'textarea#postContent',
    setup: function (editor) {
      editor.on('change', function () {
        getData()
        tinymce.triggerSave();
      });
    },
    // external_plugins: {
    //   FileManager:
    //     'http://192.168.0.113/drugBackend/assets/js/vendor/tiny/plugins/FileManager/plugin.min.js',
    // },
    plugins:
      'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons FileManager',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar:
      'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
   
    // Flmngr: {
    //   urlFileManager: 'flmngr.php',
    //   urlFiles: 'images',
    // },
    height: 400,
    templates: [
      {
        title: 'Select Template',
        description: 'creates a new table',
        content: ``,
      },
      {
        title: 'Reference',
        description: 'Add Reference',
        content:`<div class="acrd_2 custom_accordian_section">
        <div id="accordionFlushExample" class="accordion accordion-flush">
            <div class="accordion-item"><span id="flush-headingOne" class="accordion-header" style="font-weight: 600; font-size: 18px;"> <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne"> References </button> </span>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                    <div class="accordion-body">
                        Paste here
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
      `,
      },
            {
        title: 'Add Post Link',
        description: 'Add Post',
        content:`<div class="highlight-section">
        <div class="container highlight">
            <div class="highlight-col">
                <img src="https://druggist.b-cdn.net/images/LOGO.svg" alt="Logo" style="width:110px">
                <p>Do you study while taking modafinil?</p>
                <a target="_blank"><button>Read Here</button></a>
            </div>
        </div>
    </div>
      `,
      },
      {
        title: 'FAQ',
        description: 'creates a new table',
        content: `<div class="custom_accordian_section">
      <h4>FAQ's</h4>
      <div class="accordion" id="accordionExample">
      
        <div class="accordion-item">
          <span class="accordion-header" id="headingOne" style="font-weight:600;font-size:18px;">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              <span class="me-3">01</span>
              Compare to other vaccines
            </button>
          </span>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
            <div class="accordion-body">
              <strong>This is the first item's accordion body.</strong>
              It is shown by default, until the collapse plugin adds the
              appropriate classes that we use to style each element.
              These classes control the overall appearance, as well as
              the showing and hiding via CSS transitions. You can modify
              any of this with custom CSS or overriding our default
              variables. It's also worth noting that just about any HTML
              can go within the <code>.accordion-body</code>, though the
              transition does limit overflow.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <span class="accordion-header" id="headingTwo" style="font-size:18px;font-weight:600;">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <span class="me-3">02</span>
              Compare to other vaccines
            </button>
          </span>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong>
              It is hidden by default, until the collapse plugin adds
              the appropriate classes that we use to style each element.
              These classes control the overall appearance, as well as
              the showing and hiding via CSS transitions. You can modify
              any of this with custom CSS or overriding our default
              variables. It's also worth noting that just about any HTML
              can go within the <code>.accordion-body</code>, though the
              transition does limit overflow.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <span class="accordion-header" id="headingThree" style="font-weight:600;font-size:18px;">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <span class="me-3">03</span>
              Compare to other vaccines
            </button>
          </span>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong>
              It is hidden by default, until the collapse plugin adds
              the appropriate classes that we use to style each element.
              These classes control the overall appearance, as well as
              the showing and hiding via CSS transitions. You can modify
              any of this with custom CSS or overriding our default
              variables. It's also worth noting that just about any HTML
              can go within the <code>.accordion-body</code>, though the
              transition does limit overflow.
            </div>
          </div>
        </div>
       

      </div>
    </div>
    <hr>
    <p></p>`,
      },

      {
        title: 'Quote',
        description: 'creates a new table',
        content: `
    <div class="highlighted_section mx-1 my-4">
    <p class="" id="h1">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
      eligendi numquam vero vel itaque quae.
    </p>
  </div>
    `,
      },
      {
        title: 'Two Column Image',
        description: 'creates a new table',
        content: `
    <div class="img_with_para my-4 row d-block d-md-flex">
              <div class="col mb-4 mb-md-0">
                <img src="https://web-static.wrike.com/blog/content/uploads/2016/11/iStock-492785970.jpg?av=f9b41860b73b93b38b906a96accd10e2" alt="">
              </div>
              <div class="col">
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet
                  natus facere, ratione ut non, maxime voluptates id pariatur
                  dolorem officia, repellendus illum libero modi nisi
                  reprehenderit asperiores sint ullam necessitatibus.
                </p>
              </div>
            </div>
            <hr>
            <p></p>
    `,
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
    skin: useDarkMode ? 'oxide-dark' : 'oxide',
    content_css: useDarkMode ? 'dark' : 'default',
    content_style:
      'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
  })
}

// Tiny mce All board Member JS : Start -- Shoyeb

var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches

tinymce.init({
  selector: 'textarea#text-area-1010',
  setup: function (editor) {
    editor.on('change', function () {
      tinymce.triggerSave()
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
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' })
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', {
        alt: 'My alt text',
      })
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', {
        source2: 'alt.ogg',
        poster: 'https://www.google.com/logos/google.jpg',
      })
    }
  },
  templates: [
    {
      title: 'New Table',
      description: 'creates a new table',
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: 'Starting my story',
      description: 'A cure for writers block',
      content: 'Once upon a time...',
    },
    {
      title: 'New list with dates',
      description: 'New List with dates',
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
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
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style:
    'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
})

var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches

tinymce.init({
  selector: 'textarea#text-area-1011',
  setup: function (editor) {
    editor.on('change', function () {
      tinymce.triggerSave()
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
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' })
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', {
        alt: 'My alt text',
      })
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', {
        source2: 'alt.ogg',
        poster: 'https://www.google.com/logos/google.jpg',
      })
    }
  },
  templates: [
    {
      title: 'New Table',
      description: 'creates a new table',
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: 'Starting my story',
      description: 'A cure for writers block',
      content: 'Once upon a time...',
    },
    {
      title: 'New list with dates',
      description: 'New List with dates',
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
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
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style:
    'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
})

var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches

tinymce.init({
  selector: 'textarea#text-area-1012',
  setup: function (editor) {
    editor.on('change', function () {
      tinymce.triggerSave()
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
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' })
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', {
        alt: 'My alt text',
      })
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', {
        source2: 'alt.ogg',
        poster: 'https://www.google.com/logos/google.jpg',
      })
    }
  },
  templates: [
    {
      title: 'New Table',
      description: 'creates a new table',
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: 'Starting my story',
      description: 'A cure for writers block',
      content: 'Once upon a time...',
    },
    {
      title: 'New list with dates',
      description: 'New List with dates',
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
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
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style:
    'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
})

var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches

tinymce.init({
  selector: 'textarea#text-area-1013',
  setup: function (editor) {
    editor.on('change', function () {
      tinymce.triggerSave()
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
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' })
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', {
        alt: 'My alt text',
      })
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', {
        source2: 'alt.ogg',
        poster: 'https://www.google.com/logos/google.jpg',
      })
    }
  },
  templates: [
    {
      title: 'New Table',
      description: 'creates a new table',
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: 'Starting my story',
      description: 'A cure for writers block',
      content: 'Once upon a time...',
    },
    {
      title: 'New list with dates',
      description: 'New List with dates',
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
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
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style:
    'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
})

var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches

tinymce.init({
  selector: 'textarea#text-area-1014',
  setup: function (editor) {
    editor.on('change', function () {
      tinymce.triggerSave()
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
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' })
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', {
        alt: 'My alt text',
      })
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', {
        source2: 'alt.ogg',
        poster: 'https://www.google.com/logos/google.jpg',
      })
    }
  },
  templates: [
    {
      title: 'New Table',
      description: 'creates a new table',
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: 'Starting my story',
      description: 'A cure for writers block',
      content: 'Once upon a time...',
    },
    {
      title: 'New list with dates',
      description: 'New List with dates',
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
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
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style:
    'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
})

var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches

tinymce.init({
  selector: 'textarea#text-area-1015',
  setup: function (editor) {
    editor.on('change', function () {
      tinymce.triggerSave()
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
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' })
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', {
        alt: 'My alt text',
      })
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', {
        source2: 'alt.ogg',
        poster: 'https://www.google.com/logos/google.jpg',
      })
    }
  },
  templates: [
    {
      title: 'New Table',
      description: 'creates a new table',
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: 'Starting my story',
      description: 'A cure for writers block',
      content: 'Once upon a time...',
    },
    {
      title: 'New list with dates',
      description: 'New List with dates',
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
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
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style:
    'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
})

// Tiny mce All board Member JS : End -- Shoyeb
// Tiny mce Add Product JS : Start -- Shoyeb

var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches

tinymce.init({
  selector: 'textarea#text-area-1016',
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
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' })
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', {
        alt: 'My alt text',
      })
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', {
        source2: 'alt.ogg',
        poster: 'https://www.google.com/logos/google.jpg',
      })
    }
  },
  templates: [
    {
      title: 'New Table',
      description: 'creates a new table',
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: 'Starting my story',
      description: 'A cure for writers block',
      content: 'Once upon a time...',
    },
    {
      title: 'New list with dates',
      description: 'New List with dates',
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
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
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style:
    'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
})

var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches

tinymce.init({
  selector: 'textarea#text-area-1017',
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
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' },
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' })
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', {
        alt: 'My alt text',
      })
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', {
        source2: 'alt.ogg',
        poster: 'https://www.google.com/logos/google.jpg',
      })
    }
  },
  templates: [
    {
      title: 'New Table',
      description: 'creates a new table',
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: 'Starting my story',
      description: 'A cure for writers block',
      content: 'Once upon a time...',
    },
    {
      title: 'New list with dates',
      description: 'New List with dates',
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
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
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style:
    'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
})

// Tiny mce Add product JS : End -- Shoyeb

!(function (s) {
  'use strict'
  var e,
    t = localStorage.getItem('language'),
    n = 'en'
  function a(e) {
    document.getElementById('header-lang-img') &&
      ('en' == e
        ? (document.getElementById('header-lang-img').src =
            'assets/images/flags/us.jpg')
        : 'sp' == e
        ? (document.getElementById('header-lang-img').src =
            'assets/images/flags/spain.jpg')
        : 'gr' == e
        ? (document.getElementById('header-lang-img').src =
            'assets/images/flags/germany.jpg')
        : 'it' == e
        ? (document.getElementById('header-lang-img').src =
            'assets/images/flags/italy.jpg')
        : 'ru' == e &&
          (document.getElementById('header-lang-img').src =
            'assets/images/flags/russia.jpg'),
      localStorage.setItem('language', e),
      null == (t = localStorage.getItem('language')) && a(n),
      s.getJSON('assets/lang/' + t + '.json', function (e) {
        s('html').attr('lang', t),
          s.each(e, function (e, t) {
            'head' === e && s(document).attr('title', t.title),
              s("[key='" + e + "']").text(t)
          })
      }))
  }
  function c() {
    for (
      var e = document
          .getElementById('topnav-menu-content')
          .getElementsByTagName('a'),
        t = 0,
        s = e.length;
      t < s;
      t++
    )
      'nav-item dropdown active' === e[t].parentElement.getAttribute('class') &&
        (e[t].parentElement.classList.remove('active'),
        null !== e[t].nextElementSibling &&
          e[t].nextElementSibling.classList.remove('show'))
  }
  function r(e) {
    1 == s('#light-mode-switch').prop('checked') && 'light-mode-switch' === e
      ? (s('html').removeAttr('dir'),
        s('#dark-mode-switch').prop('checked', !1),
        s('#rtl-mode-switch').prop('checked', !1),
        s('#dark-rtl-mode-switch').prop('checked', !1),
        s('#bootstrap-style').attr('href', 'assets/css/bootstrap.min.css'),
        s('#app-style').attr('href', 'assets/css/app.min.css'),
        sessionStorage.setItem('is_visited', 'light-mode-switch'))
      : 1 == s('#dark-mode-switch').prop('checked') && 'dark-mode-switch' === e
      ? (s('html').removeAttr('dir'),
        s('#light-mode-switch').prop('checked', !1),
        s('#rtl-mode-switch').prop('checked', !1),
        s('#dark-rtl-mode-switch').prop('checked', !1),
        s('#bootstrap-style').attr('href', 'assets/css/bootstrap-dark.min.css'),
        s('#app-style').attr('href', 'assets/css/app-dark.min.css'),
        sessionStorage.setItem('is_visited', 'dark-mode-switch'))
      : 1 == s('#rtl-mode-switch').prop('checked') && 'rtl-mode-switch' === e
      ? (s('#light-mode-switch').prop('checked', !1),
        s('#dark-mode-switch').prop('checked', !1),
        s('#dark-rtl-mode-switch').prop('checked', !1),
        s('#bootstrap-style').attr('href', 'assets/css/bootstrap-rtl.min.css'),
        s('#app-style').attr('href', 'assets/css/app-rtl.min.css'),
        s('html').attr('dir', 'rtl'),
        sessionStorage.setItem('is_visited', 'rtl-mode-switch'))
      : 1 == s('#dark-rtl-mode-switch').prop('checked') &&
        'dark-rtl-mode-switch' === e &&
        (s('#light-mode-switch').prop('checked', !1),
        s('#rtl-mode-switch').prop('checked', !1),
        s('#dark-mode-switch').prop('checked', !1),
        s('#bootstrap-style').attr(
          'href',
          'assets/css/bootstrap-dark-rtl.min.css',
        ),
        s('#app-style').attr('href', 'assets/css/app-dark-rtl.min.css'),
        s('html').attr('dir', 'rtl'),
        sessionStorage.setItem('is_visited', 'dark-rtl-mode-switch'))
  }
  function l() {
    document.webkitIsFullScreen ||
      document.mozFullScreen ||
      document.msFullscreenElement ||
      (console.log('pressed'), s('body').removeClass('fullscreen-enable'))
  }
  s('#side-menu').metisMenu(),
    s('#vertical-menu-btn').on('click', function (e) {
      e.preventDefault(),
        s('body').toggleClass('sidebar-enable'),
        992 <= s(window).width()
          ? s('body').toggleClass('vertical-collpsed')
          : s('body').removeClass('vertical-collpsed')
    }),
    s('#sidebar-menu a').each(function () {
      var e = window.location.href.split(/[?#]/)[0]
      this.href == e &&
        (s(this).addClass('active'),
        s(this).parent().addClass('mm-active'),
        s(this).parent().parent().addClass('mm-show'),
        s(this).parent().parent().prev().addClass('mm-active'),
        s(this).parent().parent().parent().addClass('mm-active'),
        s(this).parent().parent().parent().parent().addClass('mm-show'),
        s(this)
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .addClass('mm-active'))
    }),
    s(document).ready(function () {
      var e
      0 < s('#sidebar-menu').length &&
        0 < s('#sidebar-menu .mm-active .active').length &&
        300 < (e = s('#sidebar-menu .mm-active .active').offset().top) &&
        ((e -= 300),
        s('.vertical-menu .simplebar-content-wrapper').animate(
          { scrollTop: e },
          'slow',
        ))
    }),
    s('.navbar-nav a').each(function () {
      var e = window.location.href.split(/[?#]/)[0]
      this.href == e &&
        (s(this).addClass('active'),
        s(this).parent().addClass('active'),
        s(this).parent().parent().addClass('active'),
        s(this).parent().parent().parent().addClass('active'),
        s(this).parent().parent().parent().parent().addClass('active'),
        s(this).parent().parent().parent().parent().parent().addClass('active'),
        s(this)
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .addClass('active'))
    }),
    s('[data-bs-toggle="fullscreen"]').on('click', function (e) {
      e.preventDefault(),
        s('body').toggleClass('fullscreen-enable'),
        document.fullscreenElement ||
        document.mozFullScreenElement ||
        document.webkitFullscreenElement
          ? document.cancelFullScreen
            ? document.cancelFullScreen()
            : document.mozCancelFullScreen
            ? document.mozCancelFullScreen()
            : document.webkitCancelFullScreen &&
              document.webkitCancelFullScreen()
          : document.documentElement.requestFullscreen
          ? document.documentElement.requestFullscreen()
          : document.documentElement.mozRequestFullScreen
          ? document.documentElement.mozRequestFullScreen()
          : document.documentElement.webkitRequestFullscreen &&
            document.documentElement.webkitRequestFullscreen(
              Element.ALLOW_KEYBOARD_INPUT,
            )
    }),
    document.addEventListener('fullscreenchange', l),
    document.addEventListener('webkitfullscreenchange', l),
    document.addEventListener('mozfullscreenchange', l),
    s('.right-bar-toggle').on('click', function (e) {
      s('body').toggleClass('right-bar-enabled')
    }),
    s(document).on('click', 'body', function (e) {
      0 < s(e.target).closest('.right-bar-toggle, .right-bar').length ||
        s('body').removeClass('right-bar-enabled')
    }),
    (function () {
      if (document.getElementById('topnav-menu-content')) {
        for (
          var e = document
              .getElementById('topnav-menu-content')
              .getElementsByTagName('a'),
            t = 0,
            s = e.length;
          t < s;
          t++
        )
          e[t].onclick = function (e) {
            '#' === e.target.getAttribute('href') &&
              (e.target.parentElement.classList.toggle('active'),
              e.target.nextElementSibling.classList.toggle('show'))
          }
        window.addEventListener('resize', c)
      }
    })(),
    [].slice
      .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      .map(function (e) {
        return new bootstrap.Tooltip(e)
      }),
    [].slice
      .call(document.querySelectorAll('[data-bs-toggle="popover"]'))
      .map(function (e) {
        return new bootstrap.Popover(e)
      }),
    [].slice.call(document.querySelectorAll('.offcanvas')).map(function (e) {
      return new bootstrap.Offcanvas(e)
    }),
    window.sessionStorage &&
      ((e = sessionStorage.getItem('is_visited'))
        ? (s('.right-bar input:checkbox').prop('checked', !1),
          s('#' + e).prop('checked', !0),
          r(e))
        : sessionStorage.setItem('is_visited', 'light-mode-switch')),
    s(
      '#light-mode-switch, #dark-mode-switch, #rtl-mode-switch, #dark-rtl-mode-switch',
    ).on('change', function (e) {
      r(e.target.id)
    }),
    s('#password-addon').on('click', function () {
      0 < s(this).siblings('input').length &&
        ('password' == s(this).siblings('input').attr('type')
          ? s(this).siblings('input').attr('type', 'input')
          : s(this).siblings('input').attr('type', 'password'))
    }),
    null != t && t !== n && a(t),
    s('.language').on('click', function (e) {
      a(s(this).attr('data-lang'))
    }),
    s(window).on('load', function () {
      s('#status').fadeOut(), s('#preloader').delay(350).fadeOut('slow')
    }),
    Waves.init(),
    s('#checkAll').on('change', function () {
      s('.table-check .form-check-input').prop(
        'checked',
        s(this).prop('checked'),
      )
    }),
    s('.table-check .form-check-input').change(function () {
      s('.table-check .form-check-input:checked').length ==
      s('.table-check .form-check-input').length
        ? s('#checkAll').prop('checked', !0)
        : s('#checkAll').prop('checked', !1)
    })
})(jQuery)



