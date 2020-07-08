<?php
	/* Process contact form */

	if (isset($_POST['submit-form'])) {
		$name = NULL;
		$email = NULL;
		$message = NULL;
		$error = FALSE;
		$email_err = NULL;
		$message_err = NULL;
		
		/* Get the form fields and check for errors */
		if (!empty($_POST['name'])) {
			$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		}
		
		if (!empty($_POST['email'])) {
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		} else {
			$error = TRUE;
			$email_err = 'Please enter a valid email address.';
		}
		
		if (!empty($_POST['message'])) {
			$message =  filter_var($_POST['message'], FILTER_SANITIZE_STRING);
		} else {
			$error = TRUE;
			$message_err = 'Please enter a message.';
		}
		
		/* Only process the message if there were no errors */
		if (!$error) {
			$to = "me@jamesjohnson.net";
  			$headers       = "From: no-reply@jamesjohnson.net \r\n";
  			$headers      .= "Reply-To: $email \r\n";
			$email_subject = "Contact Form Submission From $name";
			$message = "From: $name\n\nMessage:\n" . $message;
  			mail($to, $email_subject, $message, $headers);
			$sent = TRUE;
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>James Johnson Creative Director</title>
<script src="https://use.typekit.net/xkv6gpw.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/style.css">
<link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link type="text/plain" rel="author" href="/humans.txt" />
</head>

<body>
<div id="branding">
	<a href="javascript:void(0)" class="home-btn"><div class="logo"></div></a>
</div><!-- #branding -->
<nav id="menu">
	<a href="javascript:void(0)" id="menu-btn"><span id="menu-open-icon" class="fa fa-bars fa-lg"></span></a>
	<ul id="menu-items">
		<li><a href="javascript:void(0)" class="work-btn nav-btn">work</a></li>
		<li><a href="javascript:void(0)" class="about-btn nav-btn">about</a></li>
		<li><a href="javascript:void(0)" class="contact-btn nav-btn">contact</a></li>
	</ul>
</nav><!-- #menu -->
<div id="main">
	<script>document.querySelector('#main').classList.add('faded');</script>
	<section id="home" class="fullscreen">
		<h1>James Johnson</h1>
		<h2>Design Technologist</h2>
		<p><strong>New work:</strong> <a class="red-link" href="work/galerie/index.php">Galerie</a></p>
	</section><!-- #home -->
	<section id="work" class="fullscreen">
		<header id="work-title" class="title">
			<h2>Work</h2>
		</header><!-- .title -->
		<div class="content">
			<div class="piece">
				<a href="work/pioneer/" class="work-link"><img src="images/pioneer-th.png" class="thumb" width="360" height="200" alt=""></a>
				<a href="work/pioneer/" class="title"><h3>Pioneer Intelligence</h3></a>
				<p>The Pioneer index</p>
			</div><!-- .piece -->
			<div class="piece">
				<a href="work/weather/" class="work-link"><img src="images/weather-th.jpg"  class="thumb" width="360" height="200" alt=""></a>
				<a href="work/weather/" class="title"><h3>Today&rsquo;s Weather</h3></a>
				<p>Responsive Web App</p>
			</div><!-- .piece -->
			<div class="piece">
				<a href="work/galerie/" class="work-link"><img src="images/galerie-th.jpg"  class="thumb" width="360" height="200" alt=""></a>
				<a href="work/galerie/" class="title"><h3>Galerie</h3></a>
				<p>E-Commerce Website</p>
			</div><!-- .piece -->
			<div class="piece">
				<a href="work/interbike/" class="work-link"><img src="images/interbike-th.jpg"  class="thumb" width="360" height="200" alt=""></a>
				<a href="work/interbike/" class="title"><h3>Interbike</h3></a>
				<p>Tradeshow Website</p>
			</div><!-- .piece -->
			<div class="piece">
				<a href="work/pdn/" class="work-link"><img src="images/pdn-th.jpg"  class="thumb" width="360" height="200" alt=""></a>
				<a href="work/pdn/" class="title"><h3>Photo District News</h3></a>
				<p>Photography News Website</p>
			</div><!-- .piece -->
			<div class="piece">
				<a href="work/design/" class="work-link"><img src="images/design-th.jpg"  class="thumb" width="360" height="200" alt=""></a>
				<a href="work/design/" class="title"><h3>Design:Retail</h3></a>
				<p>Commercial Interior Design Magazine</p>
			</div><!-- .piece -->
		</div>
	</section><!-- #work -->
	<section id="about" class="fullscreen">
		<header id="about-title" class="title">
			<h2>About</h2>
		</header><!-- .title -->
		<div class="content">
			<div class="bio-left">
				<img src="images/headshot.jpg" width="360" height="200" alt="">
				<ul class="social-icons">
					<li class="linkedin-icon"><a href="https://www.linkedin.com/in/jamesjohnson280" target="_blank"><span class="fa fa-lg fa-linkedin"></span></a></li>
					<li class="behance-icon"><a href="https://www.behance.net/user/?username=jamesjohnson280" target="_blank"><span class="fa fa-lg fa-behance"></span></a></li>
				</ul>
				<h3 class="bio-hed">Hi, I&rsquo;m James.</h3>
				<p>I am an award winning design technologist specializing in the web and mobile. My strengths include 
				branding, UX, visual design, and managing designers. I utilize these skills to build effective 
				design teams which deliver cutting edge work that fulfills its business goals on time and 
				on budget. I love working on new challeges.</p>
				<p>An artist by education. (Computer Animation, 1997, Art Institute of Pittsburgh.) I've 
				been making websites and apps in NYC since the &lsquo;00s and I&rsquo;ve helped a lot of brands along the 
				way. Brands like Citibank, Time Warner, Harper Collins and Nielsen. I am currently looking for new opportunities</p>
				<p><strong><a href="#contact">Get in touch</a> if you have an opportunity you think I&rsquo;d be 
				interested in.</strong></p>
			</div><!-- .bio-left -->
			<div class="bio-right">
				<h3>Skills</h3>
				<ul>
					<li>Art &amp; Design Management</li>
					<li>Creative &amp; Art Direction</li>
					<li>Design</li>
					<li>UX/UI</li>
					<li>Front-end Development</li>
				</ul>
				<h3>Technical Skils</h3>
				<ul>
					<li>Adobe Creative Suite</li>
					<li>Sketch</li>
					<li>Javascript, Node, NPM</li>
					<li>HTML, CSS, SASS</li>
					<li>Angular</li>
					<li>Python</li>
				</ul>
				
			</div><!-- bio-right -->
		</div><!-- .content -->
	</section><!-- #about -->
	<section id="contact" class="fullscreen">
		<header id="contact-title" class="title">
			<h2>Contact</h2>
		</header><!-- .title -->
		<div class="content">
			<p>
			<?php if ($sent) { 
				      echo '<b class="confirmation">Thanks for contacting me. I usually reply within 24 hrs.</b>';
				  } else {
					  echo 'Drop me a line. I&rsquo;d love to hear from you.';
				  };
			?>
			</p>
			<form action="/#contact" method="post">
				<ul>
					<li>
						<label for="name">Name </label>
						<input type="text" id="name" name="name" placeholder="Name">
					</li>
					<li>
						<label for="email">Email </label>
						<?php if ($email_err) { 
							echo '<p class="form-error">' . $email_err . '</p>'; 
						} ?>
						<input type="email" id="email" name="email" placeholder="Email (required)" value="<?php if ($error && !$email_err) { echo $email; } ?>" required>
					</li>
					<li>
						<?php if ($message_err) { 
							echo '<p class="form-error">' . $message_err . '</p>'; 
						} ?>
						<label for="message">Message </label>
						<textarea id="message" name="message" placeholder="Message (required)" required><?php if ($error && !$message_err) { echo $message; } ?></textarea>
					</li>
					<li>
						<input id="submit-form" name="submit-form" type="hidden" value="true">
						<input type="submit" value="Say Hi">
					</li>
				</ul>
			</form>
			<p>Or, if you prefer, feel free to email me.<br><a href="mailto:me@jamesjohnson.net">me@jamesjohnson.net</a></p>
		</div><!-- .content -->
	</section><!-- #contact -->
</div><!-- #main -->
<footer>
	<p>&copy; <?php echo date('Y'); ?> James Johnson.</p>
</footer>
<script src="js/modernizr.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/main.js"></script>
</body>
</html>
