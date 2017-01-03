
function showOverlay() {

    var what = '#overlay';

    $(what).overlay({

        //fixed: false,

        top: '10%',
        left: 250,
        mask: {
            color: '#EEE',
            loadSpeed: 200,
            opacity: 0.7
        },
        onBeforeLoad: function () {
            // grab wrapper element inside content
            var wrap = this.getOverlay().find(".contentWrap");
            // load the page specified in the trigger

            wrap.html(content);
        },
        closeOnClick: false,
        onLoad: function () {
            $(".singleSelect").selectBox();
            $(".radioset").buttonset();
            if ($(".basePL").length) {

                $(".basePL").select2();

            }
            if ($(".functionSignedDeal").length) {

                $(".functionSignedDeal").select2();
            }
            initBinding();
            if (returnFunction) {
                eval(returnFunction + "()");
            }
        },
        onClose: function () {

            $(".simple_overlay").width(700);
        }
    });
    $(what).overlay().load();
}

function initBinding() {
    $(".dialogButton").hover(
        function () {
            $(this).toggleClass("ui-state-hover");
        }, function () {
            $(this).toggleClass("ui-state-hover");
        });


    $("#dialog_link").hover(
        function () {
            $(this).toggleClass("ui-state-hover");
        }, function () {
            $(this).toggleClass("ui-state-hover");
        });
}

var content;
var returnFunction;
var currentNode;

$(function () {

    var closeVar = '';

    // if the function argument is given to overlay,
    // it is assumed to be the onBeforeLoad event listener

});