$(function () {
    var x = $(document.querySelectorAll('.pr_info'));
    var tabs = $(document.querySelectorAll('#more'));
    for (let n = 0; n < tabs.length; n++) {
        $(tabs[n]).click(function (e) {
            e.preventDefault();
            if ($(x[n]).is(":hidden")) {
                $(x[n]).slideUp();
            }
            $(x[n]).slideToggle();
        });
    }
});

