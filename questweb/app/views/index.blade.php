<html>
	<head>
		<title>Apply to QUEST</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="/js/jquery.min.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="/css/skel.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<style>
			.video-container {
			    position: relative;
			    padding-bottom: 56.25%;
			    padding-top: 30px; height: 0; overflow: hidden;
			}
			 
			.video-container iframe,
			.video-container object,
			.video-container embed {
			    position: absolute;
			    top: 0;
			    left: 0;
			    width: 100%;
			    height: 100%;
			}
		</style>

		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<div id="header">

				<img src="/questLogoBanner.png" width="70%" height="auto"/>
				<br/>
				{{ Form::open([
		            'action' => 'UserController@preLoginAction',
		            'class' => 'form-signin'
		        ]) }}
		        <div class="12u">
					<ul class="actions">
						<h5><li>{{ Form::submit("Start Your Application Today >>",['name' => 'umdlogin']) }}</li></h5>
					</ul>
				</div>

		        {{ Form::close() }}
				<p style="color:black; font-size:1em">Due by 11:59 pm on Friday, February 13, 2015.</p>
			</div>

		<!-- Main -->
			<div id="main">
			
				<header class="major container 75%">
					<h2>QUEST</h2> 
					
					<p>is comprised of students from
					<br/>
					<span style="color:rgb(131,23,27)">The Robert H. Smith School of Business</span>, 
					<br/>
					<span style="color:rgb(0,0,0)">The A. James Clark School of Engineering</span>, 
					<br/>
					and 
					<br/>
					<span style="color:rgb(131,23,27)">The College of Computer, Mathematical, and Natural Sciences</span>.</p>
					

					<br/>
					<p>is a multidisciplinary, reality-centered, honors program for University of Maryland undergraduates.</p>
					

					<br/>
					<p>challenges students in a course of study that focuses on quality management, process improvement, and system design through teamwork and co-curricular programming.</p>
					<!--
					<p>Tellus erat mauris ipsum fermentum<br />
					etiam vivamus nunc nibh morbi.</p>
					-->
				</header>
				
				<div class="box container">
					<header>
						<h2>Hear From QUEST students!</h2>
						<p>We recorded testimonals about QUEST, done by QUEST students</p>
					</header>
					<section>
						<div class="video-container">
							<iframe style="" width="560" height="315" src="//www.youtube.com/embed/htgQHAgd_78" frameborder="0" allowfullscreen></iframe>
						</div>
					</section>
				</div>				
				
				<div class="box container">
					<header>
						<h2>Get Started On Your Application Today!</h2>
						{{ Form::open([
				            'action' => 'UserController@preLoginAction',
				            'class' => 'form-signin'
				        ]) }}
				        <div class="12u">
							<ul class="actions">
								<li>{{ Form::submit("Click To Get Started >>",['name' => 'umdlogin']) }}</li>
							</ul>
						</div>

				        {{ Form::close() }}
					</header>
					<section>
						<header>
							<h3><span style="color:rgb(131,23,27)">Due by 11:59 pm on Friday, February 13, 2015.</span></h3>
							<p>For Cohorts 25 and 26</p>
						</header>
						<p>Applications will be reviewed by a selections committee comprised of students, alumni, faculty, and staff. Upon review of the applications, selected students will be invited for an in-person interview in March. Applicants will be notified of their final status in April, prior to spring registration.</p>
					</section>
				</div>
			</div>
			
		<!-- Footer -->
			<div id="footer">
				<div class="container 75%">

					<header class="major last">
						<h2>Connect with us!</h2>
					</header>

					<p>More information about the QUEST program can be found <a href="http://www.rhsmith.umd.edu/programs/undergraduate-programs/academics/fellows-special-programs/quest">here</a>. Please direct any questions to Jessica Macklin at jmacklin@rhsmith.umd.edu</p>
				
					<ul class="icons">
						<li><a href="http://www.twitter.com/QUESTumd" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="http://www.facebook.com/QUESTumd" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="http://www.instagram.com/QUESTumd" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					</ul>			
				</div>
			</div>
	</body>
</html>