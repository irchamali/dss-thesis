// event pada saat link di klik
// $('.page-scroll').on('click', function(){
//     // console.log('ok');
    
//     //ambil isi href
//     var href = $(this).attr('href');
//     // tangkap elemen ybs
//     var elemenHref = $(href);

    
//     //pindahkan scroll
//     $('body').animate({
//         scrollTop: elemenHref.offset().top
//          -50}, 1250, 'swing');

//     e.preventDefault();

// });

$(function(){
    $('a[href*="#"]').on('click',function(e){$target = $(this.hash);});

    $jarak = 45;
    $('html, body').stop().animate(
        {
            'scrollTop': $target.offset().top-$jarak},
            500, 'swing', function(){
                window.location.hash = target;
        }
    );

});