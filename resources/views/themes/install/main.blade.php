<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	@include('themes.install.head')
    @yield('custom_css')
	<!--end::Head-->
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_app_body" class="app-blank app-blank">
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Logo-->
				<a href="javascript:void(0);" class="d-block d-lg-none mx-auto py-20">
					<img alt="Logo" src="{{asset('img/icon.png')}}" class="theme-light-show h-25px" />
					<img alt="Logo" src="{{asset('img/icon.png')}}" class="theme-dark-show h-25px" />
				</a>	<!--end::Logo-->
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
					<!--begin::Wrapper-->
					<div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
						<div id="main-content">
						</div>
						<!--begin::Footer-->
						@include('themes.install.footer')
						<!--end::Footer-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Aside-->
				<!--begin::Body-->
				<div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url({{asset('keenthemes/media/auth/bg11.png')}})"></div>
				<!--begin::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		@include('themes.install.js')
        @yield('custom_js')
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>