<?php require_once('inc/header.php'); ?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col bordered-col island">
			<h1>Styleguide</h1>
			<p class="intro">This styleguide is a visual description of the elements that make up the interface &amp; design of Gateway.</p>
			<h2>Headings, paragraphs and lists</h2>
			<p>Lorem ipsum dolor sit amet, <strong>consectetur adipisicing</strong> elit. Porro repellendus enim rerum voluptatem aperiam beatae <em>ipsam minus iure quia</em> vitae blanditiis eveniet voluptate unde ullam ipsa nisi architecto vero doloribus!</p>
			<ul>
				<li>List item one</li>
				<li>List item two</li>
				<li>List item three</li>
				<li>List item four</li>
			</ul>
			<h3>Third level heading</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque consequatur eius non molestias sunt dolorem quis quibusdam minima accusamus ratione beatae ad exercitationem neque at illum hic reiciendis sapiente assumenda.</p>
			<ol>
				<li>List item one</li>
				<li>List item two</li>
				<li>List item three</li>
				<li>List item four</li>
			</ol>
			<hr>
			<h2>Forms</h2>
			<div class="helper sidebar-helper">
				<pre><code class="language-markup">&lt;form action="form.php" method="put"&gt;
    &lt;div class="grid"&gt;
        &lt;div class="unit one-of-two"&gt;
            &lt;label form="first-name"&gt;First Name&lt;/label&gt;
            &lt;input type="text" class="input" name="first-name" id="first-name"&gt;
            &lt;p class="helper message-error"&gt;This is a generated error message&lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="unit one-of-two"&gt;
            &lt;label form="last-name"&gt;Last Name&lt;/label&gt;
            &lt;input type="text" class="input" name="last-name" id="last-name"&gt;
        &lt;/div&gt;
        &lt;div class="unit span-grid"&gt;
            &lt;input type="submit" value="Submit" class="butt butt-primary alignright" name="submit" id="submit"&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/form&gt;</code></pre>
			</div>
			<form class="">
				<div class="grid">
					<div class="unit one-of-two">
						<label for="first-name">First Name</label>
						<input type="text" class="input" name="first-name" id="first-name">
						<p class="helper message-error">This is a generated error message</p>
					</div>
					<div class="unit one-of-two">
						<label for="last-name">Last Name</label>
						<input type="text" class="input" name="last-name" id="last-name">
					</div>
					<div class="unit one-of-two">
						<label for="password">Password</label>
						<input type="password" class="input" name="password" id="password">
					</div>
					<div class="unit one-of-two">
						<label for="confirm-password">Confirm Password</label>
						<input type="password" class="input" name="confirm-password" id="confirm-password">
					</div>
					<p class="helper unit span-grid">Your password must be at least 8 characters long, with at least one digit.</p>
					<div class="unit span-grid">
						<input class="alignright butt butt-primary submit" type="submit" value="Sign Up">
					</div>
				</div>
			</form>
			<hr>
			<h2>Buttons</h2>
			<div class="helper sidebar-helper">
				<pre><code class="language-markup">&lt;button class="butt butt-primary"&gt;Primary&lt;/button&gt;</code></pre>
			</div>
			<p>
				<button class="butt butt-primary">Primary</button>&nbsp;<button class="butt">Normal</button>&nbsp;<button class="butt butt-disabled" disabled>Disabled</button>&nbsp;<button class="butt butt-danger">Danger</button>
			</p>
			<hr>
			<h2>Grids</h2>
			<div class="helper sidebar-helper">
				<pre><code class="language-markup">&lt;div class="grid"&gt;
    &lt;div class="unit one-of-two"&gt;
        Content
    &lt;/div&gt;
    &lt;div class="unit one-of-two"&gt;
        Content
    &lt;/div&gt;
    &lt;div class="unit span-grid"&gt;
        Content
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
			</div>
			<div class="grid">
				<div class="unit demo one-of-two"></div>
				<div class="unit demo one-of-two"></div>

				<div class="unit demo one-of-three"></div>
				<div class="unit demo one-of-three"></div>
				<div class="unit demo one-of-three"></div>

				<div class="unit demo one-of-four"></div>
				<div class="unit demo one-of-two"></div>
				<div class="unit demo one-of-four"></div>

				<div class="unit demo one-of-four"></div>
				<div class="unit demo one-of-four"></div>
				<div class="unit demo one-of-four"></div>
				<div class="unit demo one-of-four"></div>

				<div class="unit demo span-grid"></div>

				<div class="unit demo one-of-five"></div>
				<div class="unit demo one-of-five"></div>
				<div class="unit demo one-of-five"></div>
				<div class="unit demo one-of-five"></div>
				<div class="unit demo one-of-five"></div>
			</div>
		</div>
		<div class="sidebar secondary-col island">
			<h2>Sidebar</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa impedit amet doloribus quas eius labore veniam dicta delectus ipsum tenetur. Rem ex nemo facere quo voluptates harum excepturi possimus maxime.</p>
		</div>
	</div>
</div>
<script type="text/javascript" src="/assets/js/prism.min.js"></script>
<?php require_once('inc/footer.php'); ?>