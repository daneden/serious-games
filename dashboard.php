<?php require_once('inc/header.php'); ?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col island">
			<h1>Hi, Dan!</h1>
			<p class="helper">Welcome to your dashboard! From here, you can view available challenges, retake challenges you&rsquo;ve previously completed, and a load of other junk.</p>
			<ul class="challenges">
				<li class="completed island">
					<h2 class="standalone">Vocational Language</h2>
					<p class="desc">Introduction to vocational English language, common phrases, and more.</p>
					<ol class="sub-challenges">
						<li class="challenge-complete"><a href="#">Introduction</a></li>
						<li class="challenge-complete"><a href="#">Your First Interview</a></li>
						<li class="challenge-complete"><a href="#">Safety Training</a></li>
					</ol>
				</li>
				<li class="island">
					<h2 class="standalone">Safety in The Workplace</h2>
					<p class="desc">More in-depth coverage of safety training and things to be aware of.</p>
					<ol class="sub-challenges">
						<li class="challenge-complete"><a href="#">Introduction</a></li>
						<li><a href="#">Spot The Dangers</a></li>
						<li><a href="#">Overview</a></li>
					</ol>
				</li>
				<li class="unavailable island">
					<div class="modal island">
						<h3>Challenges Unavailable</h3>
						<p>Unlock these challenges by scoring more than <strong>90%</strong> in <em class="challenge-title">&ldquo;Safety in The Workplace.&rdquo;</em></p>
					</div>
					<h2 class="standalone">Advanced Safety in The Workplace</h2>
					<p class="desc">Advanced challenges for real bookworms!</p>
					<ol class="sub-challenges">
						<li><a href="#">Safety Legislation</a></li>
						<li><a href="#">Spot The Dangers</a></li>
						<li><a href="#">Overview</a></li>
					</ol>
				</li>
			</ul>
		</div>
		<div class="sidebar secondary-col island">
			<h2>Profile Overview</h2>
			<p>Blah, blah, blah</p>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>