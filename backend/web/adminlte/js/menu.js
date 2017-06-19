

var a = $('a.leftmenu[href="' + window.location.pathname + '"]');

    var url = $(a).attr('href');
    if(url !== undefined)
        if(url.length > 1)
            if(url == window.location.pathname) {
                // console.log("URL: " + url);
                $(a).parent().addClass("active"); // целевое, продукт на пример
                $(a).parent().parent().parent().addClass("active");
                $(a).parent().parent().parent().parent().addClass("active");
                $(a).parent().parent().parent().parent().parent().addClass("active");
                $(a).parent().parent().parent().parent().parent().parent().addClass("active");
                $(a).parent().parent().parent().parent().parent().parent().parent().addClass("active");
                $(a).parent().parent().parent().parent().parent().parent().parent().parent().addClass("active");
                $(a).parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("active");
                $(a).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("active");
                $(a).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("active");
            }
