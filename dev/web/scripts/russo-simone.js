$(document).ready(function () {

    $('#foliage-foreground-ul').addClass( "foliage-foreground-ul-loaded" );
    $('#foliage-foreground-ur').addClass( "foliage-foreground-ur-loaded" );

    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#presentation']").on('click', function (event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            var $setPG = $('.pG');
            $setPG.splice($setPG.index($(hash)), $setPG.length);
            var $topOffset = 0;
            $setPG.each(function () {
                $topOffset += $(this).height();
            });
            $topOffset += $('#TMH').height() + $('#russo-nav').height();
            // console.log('offset from top: ' + $topOffset);
            $('.p').animate({
                scrollTop: $topOffset
            }, 900, function () {
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });

    $(window).scroll(function () {
        $(".slideanim").each(function () {
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
                $(this).addClass("slide");
            }
        });
    });

/*
    $('.pG').click(function () {
        var $setPG = $('.pG');
        $setPG.splice($setPG.index($(this)), $setPG.length);
        var $topOffset = 0;
        $setPG.each(function () {
            $topOffset += $(this).height();
        });
        console.log($topOffset);
    });
*/


    // Supports WebM Alpha Checker

    var supportsWebMAlpha = function(callback)
    {
        var vid = document.createElement('video');
        vid.autoplay = false;
        vid.loop = false;
        vid.style.display = "none";
        vid.addEventListener("loadeddata", function()
        {
            document.body.removeChild(vid);
            // Create a canvas element, this is what user sees.
            var canvas = document.createElement("canvas");

            //If we don't support the canvas, we definitely don't support webm alpha video.
            if (!(canvas.getContext && canvas.getContext('2d')))
            {
                callback(false);
                return;
            }

            // Get the drawing context for canvas.
            var ctx = canvas.getContext("2d");

            // Draw the current frame of video onto canvas.
            ctx.drawImage(vid, 0, 0);
            if (ctx.getImageData(0, 0, 1, 1).data[3] === 0)
            {
                callback(true);
            }
            else
            {
                callback(false);
            }

        }, false);
        vid.addEventListener("error", function()
        {
            document.body.removeChild(vid);
            callback(false);
        });

        vid.addEventListener("stalled", function()
        {
            document.body.removeChild(vid);
            callback(false);
        });

        //Just in case
        vid.addEventListener("abort", function()
        {
            document.body.removeChild(vid);
            callback(false);
        });

        var source = document.createElement("source");
        source.src="data:video/webm;base64,GkXfowEAAAAAAAAfQoaBAUL3gQFC8oEEQvOBCEKChHdlYm1Ch4ECQoWBAhhTgGcBAAAAAAACBRFNm3RALE27i1OrhBVJqWZTrIHlTbuMU6uEFlSua1OsggEjTbuMU6uEHFO7a1OsggHo7AEAAAAAAACqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAVSalmAQAAAAAAADIq17GDD0JATYCNTGF2ZjU3LjU3LjEwMFdBjUxhdmY1Ny41Ny4xMDBEiYhARAAAAAAAABZUrmsBAAAAAAAARq4BAAAAAAAAPdeBAXPFgQGcgQAitZyDdW5khoVWX1ZQOYOBASPjg4QCYloA4AEAAAAAAAARsIFAuoFAmoECU8CBAVSygQQfQ7Z1AQAAAAAAAGfngQCgAQAAAAAAAFuhooEAAACCSYNCAAPwA/YAOCQcGFQAADBgAABnP///NXgndmB1oQEAAAAAAAAtpgEAAAAAAAAk7oEBpZ+CSYNCAAPwA/YAOCQcGFQAADBgAABnP///Vttk7swAHFO7awEAAAAAAAARu4+zgQC3iveBAfGCAXXwgQM=";
        source.addEventListener("error", function()
        {
            document.body.removeChild(vid);
            callback(false);
        });
        vid.appendChild(source);

        //This is required for IE
        document.body.appendChild(vid);
    };

    supportsWebMAlpha(function(result)
    {
        if (!result)
        {
            $('#firelamp-intro-anim').replaceWith('<img class="embed-responsive-item-auto" src="https://bright.firelamp.it/dev/resources/images/png/firelamp_dark_background_logo.png" alt="firelamp_dark_background_logo">');
        }
    });

});


$.fn.extend({
    findParentByClassName: function (parentClassName) {
        var $parent = $(this).parent();
        if ($parent.hasClass(parentClassName)) {
            return $parent;
        }
        return $parent.findParentByClassName(parentClassName);
    },
});