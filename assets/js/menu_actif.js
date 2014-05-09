$(function () {
    setNavigation();
});

function setNavigation() {
    var path = window.location.pathname;
    path = path.replace( /\/$/, "" );
    path = decodeURIComponent( path );

    // les menus 
    var index = true;
    $( "nav ul li a" ).each( function () {
        var href = $( this ).attr( 'href' );

        if( path.substring( 0, href.length ) === href) {
            $( this ).closest( 'li' ).addClass( 'active' );
            index = false;
            console.log( index );
        }
    });

    // pour le logo qui sert d'acceuil
    $( '.title-area li' ).removeClass( 'active' );
    if( index ) {
            var tmp = $( 'title-area .name li h1 a' );
            console.log( tmp );
            $( '.title-area li' ).addClass( 'active' );
    }
}
