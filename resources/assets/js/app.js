window.App = (function () {
    "use strict";



    function init() {

    }

    return {
        init: init
    };
})();

$(document).on("page:change", function () {
    "use strict";

    return window.App.init();
});