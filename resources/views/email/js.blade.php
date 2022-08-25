<script>
var defaultThemeMode = "light";
var themeMode;
if ( document.documentElement ){
    if ( document.documentElement.hasAttribute("data-theme-mode")){
        themeMode = document.documentElement.getAttribute("data-theme-mode");
    } else {
        if ( localStorage.getItem("data-theme") !== null ) {
            themeMode = localStorage.getItem("data-theme");
        } else {
            themeMode = defaultThemeMode;
        }
    }
    if (themeMode === "system") {
        themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
    }
    document.documentElement.setAttribute("data-theme", themeMode);
}
</script>
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('keenthemes/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('keenthemes/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->