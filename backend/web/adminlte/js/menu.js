// function rec(a) {
//     if(a.is('li') || a.is('ui') || a.is('a')) {
//         if(a.is('li'))
//         {
//             a.addClass("active");
//             console.log( a + 'ACTIVE');
//         }
//         rec(a.parent());
//     }
//     return a;
// }
//
// console.log( window.location.pathname );
// // rec($('a.leftmenu[href="' + window.location.pathname + '"]'));

var a = $('a.leftmenu[href="' + window.location.pathname + '"]');


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
