<!--begin::Theme mode setup on page load-->
<script>
if ( document.documentElement ) {
    const defaultThemeMode = "system";
    const name = document.body.getAttribute("data-kt-name");
    let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value");
    if ( themeMode === null ) {
        if ( defaultThemeMode === "system" ) {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        } else {
            themeMode = defaultThemeMode;
        }
    }
    document.documentElement.setAttribute("data-theme", themeMode);
}
localStorage.setItem("route_memo", "{{route('office.employee-memo.index')}}");
localStorage.setItem("route_counter_notif", "{{route('office.communication.counter_notification')}}");
localStorage.setItem("route_notification", "{{route('office.communication.notification')}}");
localStorage.setItem("route_notification_log", "{{route('office.communication.notification_log')}}");
</script>
<!--end::Theme mode setup on page load-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('keenthemes/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('keenthemes/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used by this page)-->
<script>
    var today = new Date();
    var curHr = today.getHours();
    if (curHr < 11) {
        $("#title_greet").html("{{__('custom.morning')}},");
    } else if (curHr >= 11 && curHr <= 15) {
        $("#title_greet").html("{{__('custom.afternoon')}},");
    }else if (curHr >= 15 && curHr <= 19) {
        $("#title_greet").html("{{__('custom.afternoons')}},");
    } else {
        $("#title_greet").html("{{__('custom.evening')}},");
    }
</script>
<script src="{{asset('keenthemes/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('keenthemes/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used by this page)-->
<script src="{{asset('js/cleave.min.js')}}"></script>
<script src="{{asset('js/toastify.js')}}"></script>
<script src="{{asset('js/language-office.js')}}"></script>
<script src="{{asset('js/notification.js')}}"></script>
<script src="{{asset('js/plugins-office.js')}}"></script>
<script src="{{asset('js/methods-office.js')}}"></script>
<!--end::Custom Javascript-->