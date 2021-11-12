<?php
/**
 * @file
 * Example view file
 */

/** @var WGR_ExamplePageModel $pageModel */
/** @var WGR_ExamplePageView $this */

?>
<html>
	<body>
		<?php

		if ($pageModel->members) {
			// Loop names of members
			foreach ($pageModel->members as $member) {
                echo $member->name;
                if ( isset($member->parent) ) {
                    echo $member->parent ? '('.join($member->parent,', ').')' : '';
                } else {
				    echo '(',$member->parentID,')';
                }
                ?>
                <br />
                <?php
			}
		}

        elseif ($pageModel->breeds) {
            // Loop names of breeds
            foreach ($pageModel->breeds as $breed) {
                echo '<li>',$breed,'</li>';
            }
        }

        else {
			?>
			<a class="btn" href="?action=members">Members</a><br />
            <button type="button" class="btn">Members-ajax</button><br />
            <a href="?action=members-parents">Members-Parents</a><br />
            <a href="?action=breeds">Dog-Breeds</a><br />
			<?php
		}

		?>
		<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="js/scripts.js"></script>
		<script>
		WGR.example();
		</script>
	</body>
</html>
