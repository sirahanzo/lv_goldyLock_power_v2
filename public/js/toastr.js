var UIToastr = function() {
    return {
        init: function() {
            var t, o = -1,
                e = 0,
                n = function() {
                    var t = ["Hello, some notification sample goes here", '<div><input class="form-control input-small" value="textbox"/>&nbsp;<a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank">Check this out</a></div><div><button type="button" id="okBtn" class="btn blue">Close me</button><button type="button" id="surpriseBtn" class="btn default" style="margin: 0 8px 0 8px">Surprise me</button></div>', "Did you like this one ? :)", "Totally Awesome!!!", "Yeah, this is the Metronic!", "Explore the power of App. Purchase it now!"];
                    return o++, o === t.length && (o = 0), t[o]
                };
            $("#showtoast").click(function() {
                var o = $("#toastTypeGroup input:checked").val(),
                    a = $("#message").val(),
                    i = $("#title").val() || "",
                    s = $("#showDuration"),
                    r = $("#hideDuration"),
                    l = $("#timeOut"),
                    c = $("#extendedTimeOut"),
                    u = $("#showEasing"),
                    h = $("#hideEasing"),
                    p = $("#showMethod"),
                    d = $("#hideMethod"),
                    v = e++;
                toastr.options = {
                    closeButton: $("#closeButton").prop("checked"),
                    debug: $("#debugInfo").prop("checked"),
                    positionClass: $("#positionGroup input:checked").val() || "toast-top-right",
                    onclick: null
                }, $("#addBehaviorOnToastClick").prop("checked") && (toastr.options.onclick = function() {
                    alert("You can perform some custom action after a toast goes away")
                }), s.val().length && (toastr.options.showDuration = s.val()), r.val().length && (toastr.options.hideDuration = r.val()), l.val().length && (toastr.options.timeOut = l.val()), c.val().length && (toastr.options.extendedTimeOut = c.val()), u.val().length && (toastr.options.showEasing = u.val()), h.val().length && (toastr.options.hideEasing = h.val()), p.val().length && (toastr.options.showMethod = p.val()), d.val().length && (toastr.options.hideMethod = d.val()), a || (a = n()), $("#toastrOptions").text("Command: toastr[" + o + ']("' + a + (i ? '", "' + i : "") + '")\n\ntoastr.options = ' + JSON.stringify(toastr.options, null, 2));
                var m = toastr[o](a, i);
                t = m, m.find("#okBtn").length && m.delegate("#okBtn", "click", function() {
                    alert("you clicked me. i was toast #" + v + ". goodbye!"), m.remove()
                }), m.find("#surpriseBtn").length && m.delegate("#surpriseBtn", "click", function() {
                    alert("Surprise! you clicked me. i was toast #" + v + ". You could perform an action here.")
                }), $("#clearlasttoast").click(function() {
                    toastr.clear(t)
                })
            }),
            $("#cleartoasts").click(function() {
                toastr.clear()
            })
        }
    }
}();
jQuery(document).ready(function() {
    UIToastr.init()
});