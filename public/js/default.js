document.addEventListener("DOMContentLoaded", function() {
    var hash = window.location.hash;
    if (hash) {
        var someTabTriggerEl = document.querySelector(
            `button[data-bs-target="${hash}"]`,
        );
        if (someTabTriggerEl) {
            var tab = new bootstrap.Tab(someTabTriggerEl);
            tab.show();
        }
    }

    var tabTriggers = document.querySelectorAll('button[data-bs-toggle="tab"]');
    tabTriggers.forEach(function(tabTrigger) {
        tabTrigger.addEventListener("shown.bs.tab", function(event) {
            history.replaceState(
                null,
                null,
                event.target.getAttribute("data-bs-target"),
            );
        });
    });

    console.log(activeTab);

    var hospitalTabTriggerEl = document.querySelector(`button[data-bs-target="#${activeTab}"]`);
    var tab = new bootstrap.Tab(hospitalTabTriggerEl);
    tab.show();
});
