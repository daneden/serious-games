<?php
	$isAdmin = true;
	require_once('../inc/db/connect.php');
	require_once('../inc/globals/functions.php');
	verify_user();
	verify_admin();		
	require_once('../inc/header.php');	
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>New Question</h1>
			<p>Welcome to the Modules Page! From here, you view the current modules and edit existing ones, remove modules and more.</p>
			<form action="inc/php/add_question.php" method="post">
            	<label for="question-title">Question</label>
                <input type="text" name="question-title" class="input"/>
				<div class="grid">
                	<div class="unit one-of-five">
                        <label for="correct-answer">Correct Answer</label>
                    </div>
                    <div class="unit four-of-five">
                        	<label for="answer">Answer</label>
                    </div>
                	<div class="unit alignmiddle one-of-five">
                        <input type="radio" name="correct-answer" value="0"/>
                    </div>
                    <div class="unit four-of-five">
                        <input type="text" class="input" name="answer[]" />
                    </div>
                	<div class="unit alignmiddle one-of-five">
                        <input type="radio" name="correct-answer" value="1"/>
                    </div>
                    <div class="unit four-of-five">
                        <input type="text" class="input" name="answer[]" />
                    </div>
                	<div class="unit alignmiddle one-of-five">
                        <input type="radio" name="correct-answer" value="2"/>
                    </div>
                    <div class="unit four-of-five">
                        <input type="text" class="input" name="answer[]" />
                    </div>
                	<div class="unit alignmiddle one-of-five">
                        <input type="radio" name="correct-answer" value="3"/>
                    </div>
                    <div class="unit four-of-five">
                        <input type="text" class="input" name="answer[]" />
                    </div>
                </div>
                <label for="help-text">Helper Text</label>
                <textarea name="help-text" class="input"></textarea>
                <input type="submit" class="butt butt-primary alignright" value="Add Question"/>
                <input type="hidden" name="module-id" value="<?php echo $_GET['Mid'];?>" />
            </form>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>
