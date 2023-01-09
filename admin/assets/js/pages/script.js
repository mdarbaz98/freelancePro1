// SEO Title KeyUp Function
function copytext(e) {
  let ctrC = document.getElementById("i1").value;
  str = ctrC.replace(/\s+/g, "-").toLowerCase();
  document.getElementById("i2").value = ctrC;
  document.getElementById("i3").value = str;
}
// let ctrC = document.getElementById("i1").value;
// str = ctrC.replace(/\s+/g, "-").toLowerCase();


//--------------------   Fareen Quotes Page Start ------------------- //

//textarae wysiwyg//

var useDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;

// tinyMCE.init({
//   selector: "textarea#open-source-plugins-Quote-page",
//   plugins : "paste",
//   paste_text_sticky : true,
//   setup : function(ed) {
//       ed.onInit.add(function(ed) {
//         ed.pasteAsPlainText = true;
//       });
//     }

//   });


tinymce.init({
  selector: "textarea#open-source-plugins-Quote-page",
  plugins:
    "print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
  imagetools_cors_hosts: ["picsum.photos"],
  paste_text_sticky : true,
  paste_as_text: true,
  menubar: "file edit view insert format tools table help",
  toolbar:
    "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  link_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_class_list: [
    { title: "None", value: "" },
    { title: "Some class", value: "class-name" },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    / Provide file and text for the link dialog /;
    if (meta.filetype === "file") {
      callback("https://www.google.com/logos/google.jpg", { text: "My text" });
    }

    / Provide image and alt text for the image dialog /;
    if (meta.filetype === "image") {
      callback("https://www.google.com/logos/google.jpg", {
        alt: "My alt text",
      });
    }

    / Provide alternative source and posted for the media dialog /;
    if (meta.filetype === "media") {
      callback("movie.mp4", {
        source2: "alt.ogg",
        poster: "https://www.google.com/logos/google.jpg",
      });
    }
  },
  templates: [
    {
      title: "New Table",
      description: "creates a new table",
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: "Starting my story",
      description: "A cure for writers block",
      content: "Once upon a time...",
    },
    {
      title: "New list with dates",
      description: "New List with dates",
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
    },
  ],
  template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
  template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar:
    "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: "sliding",
  contextmenu: "link image imagetools table",
  skin: useDarkMode ? "oxide-dark" : "oxide",
  content_css: useDarkMode ? "dark" : "default",
  content_style:
    "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
});

//______________________________________________________//

//SELECT category

$(".select2").select2({
  tags: true,
  maximumSelectionLength: 10,
  tokenSeparators: [",", " "],
  placeholder: "Select or type keywords",
  //minimumInputLength: 1,
  //ajax: {
  //   url: "you url to data",
  //   dataType: 'json',
  //  quietMillis: 250,
  //  data: function (term, page) {
  //     return {
  //         q: term, // search term
  //    };
  //  },
  //  results: function (data, page) {
  //  return { results: data.items };
  //   },
  //   cache: true
  // }
});

//--------------------------------------------//
$(".select3").select2({
  tags: true,
  maximumSelectionLength: 10,
  tokenSeparators: [",", " "],
  placeholder: "Select or type keywords",
  //minimumInputLength: 1,
  //ajax: {
  //   url: "you url to data",
  //   dataType: 'json',
  //  quietMillis: 250,
  //  data: function (term, page) {
  //     return {
  //         q: term, // search term
  //    };
  //  },
  //  results: function (data, page) {
  //  return { results: data.items };
  //   },
  //   cache: true
  // }
});






//form validation with jquery//


// neha-js-start

// blolisting


//   aboutus

/*1-textarea*/

var useDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;

tinymce.init({
  selector: "textarea#open-source-plugins-blogform11",
  plugins:
    "print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
  imagetools_cors_hosts: ["picsum.photos"],
  menubar: "file edit view insert format tools table help",
  toolbar:
    "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  link_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_class_list: [
    { title: "None", value: "" },
    { title: "Some class", value: "class-name" },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    / Provide file and text for the link dialog /;
    if (meta.filetype === "file") {
      callback("https://www.google.com/logos/google.jpg", { text: "My text" });
    }

    / Provide image and alt text for the image dialog /;
    if (meta.filetype === "image") {
      callback("https://www.google.com/logos/google.jpg", {
        alt: "My alt text",
      });
    }

    / Provide alternative source and posted for the media dialog /;
    if (meta.filetype === "media") {
      callback("movie.mp4", {
        source2: "alt.ogg",
        poster: "https://www.google.com/logos/google.jpg",
      });
    }
  },
  templates: [
    {
      title: "New Table",
      description: "creates a new table",
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: "Starting my story",
      description: "A cure for writers block",
      content: "Once upon a time...",
    },
    {
      title: "New list with dates",
      description: "New List with dates",
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
    },
  ],
  template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
  template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar:
    "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: "sliding",
  contextmenu: "link image imagetools table",
  skin: useDarkMode ? "oxide-dark" : "oxide",
  content_css: useDarkMode ? "dark" : "default",
  content_style:
    "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
});

/*2-textarea*/
var useDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;

tinymce.init({
  selector: "textarea#open-source-plugins-blogform22",
  plugins:
    "print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
  imagetools_cors_hosts: ["picsum.photos"],
  menubar: "file edit view insert format tools table help",
  toolbar:
    "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  link_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_class_list: [
    { title: "None", value: "" },
    { title: "Some class", value: "class-name" },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    / Provide file and text for the link dialog /;
    if (meta.filetype === "file") {
      callback("https://www.google.com/logos/google.jpg", { text: "My text" });
    }

    / Provide image and alt text for the image dialog /;
    if (meta.filetype === "image") {
      callback("https://www.google.com/logos/google.jpg", {
        alt: "My alt text",
      });
    }

    / Provide alternative source and posted for the media dialog /;
    if (meta.filetype === "media") {
      callback("movie.mp4", {
        source2: "alt.ogg",
        poster: "https://www.google.com/logos/google.jpg",
      });
    }
  },
  templates: [
    {
      title: "New Table",
      description: "creates a new table",
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: "Starting my story",
      description: "A cure for writers block",
      content: "Once upon a time...",
    },
    {
      title: "New list with dates",
      description: "New List with dates",
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
    },
  ],
  template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
  template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar:
    "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: "sliding",
  contextmenu: "link image imagetools table",
  skin: useDarkMode ? "oxide-dark" : "oxide",
  content_css: useDarkMode ? "dark" : "default",
  content_style:
    "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
});

var useDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;

// tinymce.init({
//   selector: 'textarea#authorHighlights',  // change this value according to your HTML
//   plugin: 'a_tinymce_plugin print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
//   a_plugin_option: true,
//   a_configuration_option: 400,
//   height:200,
//   paste_as_text: true,
// });
// tinymce.init({
//   selector: 'textarea#authorExperience',  // change this value according to your HTML
//   plugin: 'a_tinymce_plugin print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
//   a_plugin_option: true,
//   a_configuration_option: 400,
//   height:200,
//   paste_as_text: true,
// });



tinymce.init({
  selector: "textarea#authorHighlights",
  plugins:"print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
  imagetools_cors_hosts: ["picsum.photos"],
  menubar: "file edit view insert format tools table help",
  toolbar:
    "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  link_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_class_list: [
    { title: "None", value: "" },
    { title: "Some class", value: "class-name" },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    / Provide file and text for the link dialog /;
    if (meta.filetype === "file") {
      callback("https://www.google.com/logos/google.jpg", { text: "My text" });
    }

    / Provide image and alt text for the image dialog /;
    if (meta.filetype === "image") {
      callback("https://www.google.com/logos/google.jpg", {
        alt: "My alt text",
      });
    }

    / Provide alternative source and posted for the media dialog /;
    if (meta.filetype === "media") {
      callback("movie.mp4", {
        source2: "alt.ogg",
        poster: "https://www.google.com/logos/google.jpg",
      });
    }
  },
  templates: [
    {
      title: "New Table",
      description: "creates a new table",
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: "Starting my story",
      description: "A cure for writers block",
      content: "Once upon a time...",
    },
    {
      title: "New list with dates",
      description: "New List with dates",
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
    },
  ],
  template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
  template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
  height: 300,
  image_caption: true,
  quickbars_selection_toolbar:
    "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: "sliding",
  contextmenu: "link image imagetools table",
  skin: useDarkMode ? "oxide-dark" : "oxide",
  content_css: useDarkMode ? "dark" : "default",
  content_style:
    "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
});

tinymce.init({
  selector: "textarea#authorExperience",
  plugins:"print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
  imagetools_cors_hosts: ["picsum.photos"],
  menubar: "file edit view insert format tools table help",
  toolbar:
    "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  link_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_class_list: [
    { title: "None", value: "" },
    { title: "Some class", value: "class-name" },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    / Provide file and text for the link dialog /;
    if (meta.filetype === "file") {
      callback("https://www.google.com/logos/google.jpg", { text: "My text" });
    }

    / Provide image and alt text for the image dialog /;
    if (meta.filetype === "image") {
      callback("https://www.google.com/logos/google.jpg", {
        alt: "My alt text",
      });
    }

    / Provide alternative source and posted for the media dialog /;
    if (meta.filetype === "media") {
      callback("movie.mp4", {
        source2: "alt.ogg",
        poster: "https://www.google.com/logos/google.jpg",
      });
    }
  },
  templates: [
    {
      title: "New Table",
      description: "creates a new table",
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: "Starting my story",
      description: "A cure for writers block",
      content: "Once upon a time...",
    },
    {
      title: "New list with dates",
      description: "New List with dates",
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
    },
  ],
  template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
  template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
  height: 300,
  image_caption: true,
  quickbars_selection_toolbar:
    "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: "sliding",
  contextmenu: "link image imagetools table",
  skin: useDarkMode ? "oxide-dark" : "oxide",
  content_css: useDarkMode ? "dark" : "default",
  content_style:
    "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
});

tinymce.init({
  selector: "textarea#open-source-plugins-querypage",
  plugins:"print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
  imagetools_cors_hosts: ["picsum.photos"],
  menubar: "file edit view insert format tools table help",
  toolbar:
    "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  link_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_class_list: [
    { title: "None", value: "" },
    { title: "Some class", value: "class-name" },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    / Provide file and text for the link dialog /;
    if (meta.filetype === "file") {
      callback("https://www.google.com/logos/google.jpg", { text: "My text" });
    }

    / Provide image and alt text for the image dialog /;
    if (meta.filetype === "image") {
      callback("https://www.google.com/logos/google.jpg", {
        alt: "My alt text",
      });
    }

    / Provide alternative source and posted for the media dialog /;
    if (meta.filetype === "media") {
      callback("movie.mp4", {
        source2: "alt.ogg",
        poster: "https://www.google.com/logos/google.jpg",
      });
    }
  },
  templates: [
    {
      title: "New Table",
      description: "creates a new table",
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: "Starting my story",
      description: "A cure for writers block",
      content: "Once upon a time...",
    },
    {
      title: "New list with dates",
      description: "New List with dates",
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
    },
  ],
  template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
  template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
  height: 800,
  image_caption: true,
  quickbars_selection_toolbar:
    "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: "sliding",
  contextmenu: "link image imagetools table",
  skin: useDarkMode ? "oxide-dark" : "oxide",
  content_css: useDarkMode ? "dark" : "default",
  content_style:
    "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
});

tinymce.init({
  selector: "textarea#quotes_content_data",
  plugins:"print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
  imagetools_cors_hosts: ["picsum.photos"],
  menubar: "file edit view insert format tools table help",
  toolbar:
    "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  link_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_list: [
    { title: "My page 1", value: "https://www.tiny.cloud" },
    { title: "My page 2", value: "http://www.moxiecode.com" },
  ],
  image_class_list: [
    { title: "None", value: "" },
    { title: "Some class", value: "class-name" },
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    / Provide file and text for the link dialog /;
    if (meta.filetype === "file") {
      callback("https://www.google.com/logos/google.jpg", { text: "My text" });
    }

    / Provide image and alt text for the image dialog /;
    if (meta.filetype === "image") {
      callback("https://www.google.com/logos/google.jpg", {
        alt: "My alt text",
      });
    }

    / Provide alternative source and posted for the media dialog /;
    if (meta.filetype === "media") {
      callback("movie.mp4", {
        source2: "alt.ogg",
        poster: "https://www.google.com/logos/google.jpg",
      });
    }
  },
  templates: [
    {
      title: "New Table",
      description: "creates a new table",
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
    },
    {
      title: "Starting my story",
      description: "A cure for writers block",
      content: "Once upon a time...",
    },
    {
      title: "New list with dates",
      description: "New List with dates",
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
    },
  ],
  template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
  template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
  height: 350,
  image_caption: true,
  quickbars_selection_toolbar:
    "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: "sliding",
  contextmenu: "link image imagetools table",
  skin: useDarkMode ? "oxide-dark" : "oxide",
  content_css: useDarkMode ? "dark" : "default",
  content_style:
    "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
});

// form js
document.getElementById("otp-f").style.display = "none";

function emailform() {
  var letters2 =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var email = document.getElementById("formemail").value;
  if (email.length == 0) {
    document.getElementById("EM").style.display = "block";
    document.getElementById("EM").innerHTML = "Email Required";
  } else if (email.match(letters2)) {
    document.getElementById("EM").style.display = "none";
  } else {
    document.getElementById("EM").style.display = "block";
    document.getElementById("EM").innerHTML = "Please Enter Valid Email";
  }
}
function passwordform() {
  var pw = document.getElementById("formpassword").value;
  if (pw.length < 8) {
    document.getElementById("message1").style.display = "block";
  } else {
    document.getElementById("message1").style.display = "none";
  }
  if (pw.length > 15) {
    document.getElementById("message2").style.display = "block";
  } else {
    document.getElementById("message2").style.display = "none";
  }
}

$("#form").submit(function (e) {
  e.preventDefault();
  var letters1 =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var email = document.getElementById("formemail").value;
  var password = document.getElementById("formpassword").value;

  if (email.length > 0 && email.match(letters1)) {
    if (password.length >= 8 && password.length < 15) {
      document.getElementById("otp-f").style.display = "block";
      document.getElementById("lg-f").style.display = "none";
    } else {
      document.getElementById("message1").style.display = "block";
      document.getElementById("message2").style.display = "none";
    }
  } else {
    document.getElementById("EM").style.display = "block";
    document.getElementById("EM").innerHTML = "Please Enter Valid email";
  }
});

// neha-js-end
