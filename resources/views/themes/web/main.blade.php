<!DOCTYPE html>
<html lang="en">
	@include('themes.web.head')
	<body>
		<div class="main-page-wrapper">
			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<section>
				<div id="preloader">
					<div id="ctn-preloader" class="ctn-preloader">
						<div class="animation-preloader">
							<div class="spinner"></div>
							<div class="txt-loading">
								<span data-text-preloader="Y" class="letters-loading">
									Y
								</span>
								<span data-text-preloader="A" class="letters-loading">
									A
								</span>
								<span data-text-preloader="D" class="letters-loading">
									D
								</span>
								<span data-text-preloader="A" class="letters-loading">
									A
								</span>
								<span data-text-preloader="&nbsp;" class="letters-loading">
									&nbsp;
								</span>
                                <span data-text-preloader="E" class="letters-loading">
									E
								</span>
                                <span data-text-preloader="K" class="letters-loading">
									K
								</span>
                                <span data-text-preloader="I" class="letters-loading">
									I
								</span>
                                <span data-text-preloader="D" class="letters-loading">
									D
								</span>
                                <span data-text-preloader="A" class="letters-loading">
									A
								</span>
                                <span data-text-preloader="N" class="letters-loading">
									N
								</span>
                                <span data-text-preloader="T" class="letters-loading">
									T
								</span>
                                <span data-text-preloader="A" class="letters-loading">
									A
								</span>
							</div>
						</div>	
					</div>
				</div>
			</section>
			<!-- 
			=============================================
				Theme Main Menu
			============================================== 
			-->
			@include('themes.web.header')
            <!-- /.theme-main-menu -->
			<!-- 
			=============================================
				Theme Hero Banner
			============================================== 
			-->
			{{$slot}}
			<!--
			=====================================================
				Footer
			=====================================================
			-->
            @include('themes.web.footer')
			<!-- Scroll Top Button -->
			<button class="scroll-top">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>
            <!-- Optional JavaScript _____________________________  -->

            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <!-- jQuery -->
            @include('themes.web.js')
		</div>
        <!-- /.main-page-wrapper -->
	</body>
</html>