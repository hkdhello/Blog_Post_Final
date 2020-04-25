<?php
if (isset($_SESSION["username"])) { ?>
<a href="/blog/editpost/<?php echo($slug); ?>" />Editing</a>
<br/><br/>
<a href="/blog/" />ALL POSTS</a>
<?php
}
?>
<main>
<?php echo($content); ?>
</main>
