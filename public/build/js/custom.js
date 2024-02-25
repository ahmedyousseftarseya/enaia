
function initMetisMenu() {
    // MetisMenu js
    document.addEventListener("DOMContentLoaded", function (event) {
        if (document.getElementById("side-menu"))
            new MetisMenu('#side-menu');
    });
}


function initLeftMenuCollapse() {
    var currentSIdebarSize = document.body.getAttribute('data-sidebar-size');
    window.onload = function () {
        if (window.innerWidth >= 1024 && window.innerWidth <= 1366) {
            document.body.setAttribute('data-sidebar-size', 'sm');
            updateRadio('sidebar-size-small');
        }
    };
    var verticalButton = document.getElementsByClassName("vertical-menu-btn");
    for (var i = 0; i < verticalButton.length; i++) {
        (function (index) {
            verticalButton[index] && verticalButton[index].addEventListener('click', function (event) {
                event.preventDefault();
                document.body.classList.toggle('sidebar-enable');
                if (window.innerWidth >= 992) {
                    if (currentSIdebarSize == null) {
                        (document.body.getAttribute('data-sidebar-size') == null || document.body.getAttribute('data-sidebar-size') == "lg") ? document.body.setAttribute('data-sidebar-size', 'sm') : document.body.setAttribute('data-sidebar-size', 'lg');
                    } else if (currentSIdebarSize == "md") {
                        (document.body.getAttribute('data-sidebar-size') == "md") ? document.body.setAttribute('data-sidebar-size', 'sm') : document.body.setAttribute('data-sidebar-size', 'md');
                    } else {
                        (document.body.getAttribute('data-sidebar-size') == "sm") ? document.body.setAttribute('data-sidebar-size', 'lg') : document.body.setAttribute('data-sidebar-size', 'sm');
                    }
                } else {
                    initMenuItemScroll();
                }
            });
        })(i);
    }
}

function initActiveMenu() {

    setTimeout(function () {
        // === following js will activate the menu in left side bar based on url ====
        var menuItems = document.querySelectorAll("#sidebar-menu a");
        menuItems && menuItems.forEach(function (item) {
            var pageUrl = window.location.href.split(/[?#]/)[0];

            if (item.href == pageUrl) {
                item.classList.add("active");
                var parent = item.parentElement;
                if (parent && parent.id !== "side-menu") {
                    parent.classList.add("mm-active");
                    var parent2 = parent.parentElement; // ul .
                    if (parent2 && parent2.id !== "side-menu") {
                        parent2.classList.add("mm-show"); // ul tag
                        if (parent2.classList.contains('mm-collapsing')) {
                            console.log('has mm-collapsing');
                        }
                        var parent3 = parent2.parentElement; // li tag
                        if (parent3 && parent3.id !== "side-menu") {
                            parent3.classList.add("mm-active"); // li
                            var parent4 = parent3.parentElement; // ul
                            if (parent4 && parent4.id !== "side-menu") {
                                parent4.classList.add("mm-show"); // ul
                                var parent5 = parent4.parentElement;
                                if (parent5 && parent5.id !== "side-menu") {
                                    parent5.classList.add("mm-active"); // li
                                }
                            }
                        }
                    }
                }
            }
        });
    }, 0);
}


initMetisMenu();
initLeftMenuCollapse();
initActiveMenu();
