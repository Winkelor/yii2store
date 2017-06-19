function rec(a) {
    // if(a is li or a is ui)

    a.addClass("active");
    a = a.parent();
    console.log(a);

    rec(a);
}

var a = $('a.leftmenu[href="' + window.location.pathname + '"]');

    var url = $(a).attr('href');
    if(url !== undefined)
        if(url.length > 1)
            if(url == window.location.pathname) {
                // console.log("URL: " + url);
                rec(a);

                // $(a).parent().addClass("active"); // целевое, продукт на пример
                // $(a).parent().parent().parent().addClass("active");
                // $(a).parent().parent().parent().parent().addClass("active");
                // $(a).parent().parent().parent().parent().parent().addClass("active");
                // $(a).parent().parent().parent().parent().parent().parent().addClass("active");
                // $(a).parent().parent().parent().parent().parent().parent().parent().addClass("active");
                // $(a).parent().parent().parent().parent().parent().parent().parent().parent().addClass("active");
                // $(a).parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("active");
                // $(a).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("active");
                // $(a).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("active");
            }
