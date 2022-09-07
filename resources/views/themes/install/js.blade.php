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
    </script>
    <!--end::Theme mode setup on page load-->
    <script>var hostUrl = "assets/";</script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{asset('keenthemes/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('keenthemes/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="{{asset('js/toastify.js')}}"></script>
    <script src="{{asset('js/install.js')}}"></script>
    <script src="{{asset('js/language-office.js')}}"></script>
    <!--end::Custom Javascript-->