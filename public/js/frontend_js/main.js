/*price range*/
$("#sl2").slider();

var RGBChange = function() {
    $("#RGB").css(
        "background",
        "rgb(" + r.getValue() + "," + g.getValue() + "," + b.getValue() + ")"
    );
};

/*scroll to top*/

$(document).ready(function() {
    // alert("test");
    $(function() {
        $.scrollUp({
            scrollName: "scrollUp", // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: "top", // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: "linear", // Scroll to top easing (see http://easings.net/)
            animation: "fade", // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});

// Change the price depending on size
$(document).ready(function() {
    $("#selSize").change(function() {
        // alert("test");
        var idSize = $(this).val();
        // alert(idSize);
        if (idSize == "") {
            return false;
        }
        $.ajax({
            type: "get",
            url: "/get-product-price",
            data: {
                idSize: idSize
            },
            success: function(resp) {
                // alert(resp);
                // return false;
                var dataArray = resp.split("#"); // Get two data and split with #
                $("#getPrice").html("EUR €" + dataArray[0]);
                $("#price").val(dataArray[0]);
            },
            error: function() {
                alert("Select an available size");
            }
        });
    });
});
