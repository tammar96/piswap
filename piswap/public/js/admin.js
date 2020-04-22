var admin = admin || {};

admin.registerRouteHandlers = function(className, tagName){
    $("." + className).unbind("click");        
    $("." + className).click(function(e){
        e.preventDefault();
        var url = $(this).data(tagName);
        var title = $(this).data("title");
        admin.loadContents(url, title != undefined ? title : $(this).text()); // if no title set, use link value
    });
}

admin.registerFormHandlers = function(className, tagName){
    $("." + className).submit(function(e){
        if ($(this).attr("id") != "form2val"){ // prevent double submit
            e.preventDefault();
            var url = $(this).data(tagName);
            var formData = $(this).serialize();
            admin.sendForm(url, formData);
        }
    });
}

admin.registerHandlers = function(){
    admin.registerRouteHandlers("ajax-route", "url");
    admin.registerFormHandlers("ajax-form", "url");
    admin.loadValidator();
}

admin.loadContents = function(url, title)
{   
    admin.changeURL("/admin" + url, title);    
    $.ajax({
        type:'GET',
        url: url,
        dataType: "html",
        success: function(response)
        {
            $('#contents').html(response);
            admin.registerHandlers();
        }
    });
    return true;
}

admin.sendForm = function(url, formData)
{
    $.ajax({
        type: "POST",
        url: url + "/",
        dataType: "html",
        data: formData,
        success: function (response) {
            $('#contents').html(response);
            admin.registerHandlers();
        },
        error: function (error) {
            console.log(error);
            $('#contents').html("Error occured, please try again.");

        },
    });

    return true;
}

admin.changeURL = function (url, title) {
   if (history.pushState){
       window.history.pushState("", title, url);
   } else {
       window.location.href = url;
   }

   document.title = title;
}

admin.loadFromDocumentUrl = function(){
    var url = window.location.pathname;
    if (url.includes("/admin/")) {
        admin.loadContents(url.replace("/admin", ""), "");
    }
    if (url == "/admin" || url == "/admin/"){
        admin.loadContents("/profile", "");
    }
}

admin.loadValidator = function(){
    $('#form2val').bootstrapValidator()
    .on('success.form.bv',function(e){
        e.preventDefault(); 
        var url = $(this).data("url");
        var formData = $(this).serialize();
        admin.sendForm(url, formData);
    });
}

$(document).ready(function() {
    admin.loadFromDocumentUrl();
    admin.registerHandlers();
});

admin.filter = function(table, first, second) {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementsByClassName("search_".concat(table));
    filter = input[0].value.toUpperCase();
    table = document.getElementsByClassName("results_".concat(table));
    tr = table[0].getElementsByTagName("tr");
  
    console.log("Searching", filter);
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td_shortcut = tr[i].getElementsByTagName("td")[first];
      td_name = tr[i].getElementsByTagName("td")[second]
      if (td_shortcut || td_name) {
        if ((td_shortcut.innerHTML.toUpperCase().indexOf(filter) > -1)||(td_name.innerHTML.toUpperCase().indexOf(filter) > -1)){
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }