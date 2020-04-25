<h1>BLOG POSTS</h1>
<br/><br/>
<a href="/user/logout/" />LOGOUT</a>
<br/><br/>
<a href="/blog/createmyblogpost/" />CREATE</a>
<ul>
<?php
foreach($posts as $post){
echo("<li><a href=\"\\blog\\read\\" . $post["slug"] . "\">" . $post["title"]."</a> - <time>" . $post["post_date"] . " </time>");
}
?>
</ul>