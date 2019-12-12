<?php
include_once "./pages/header.php";

if(!isset($_GET['page']))
	header("Location: ./index.php?page=1");

$imgamm = 5;
?>
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<link rel="shortcut icon" href="#">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <head>
	<title>Camagru</title>
	<link rel="stylesheet" href="./style/index.css">
  </head>
  <body>
	<!-- Hero Banner-->
	<div class="Level has-background-grey-dark has-text-centered">
		<div style = "display: inline;">
<?php
if (isset($_SESSION["username"])){
	echo '
			<div class="dropdown is-hoverable hbutton">
				<div class="dropdown-trigger">
					<button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
						<span>' . $_SESSION["username"] . '</span>
						<span class="icon is-small">
							<i class="fa fa-angle-down" aria-hidden="true"></i>
						</span>
					</button>
				</div>
				<div class="dropdown-menu" id="dropdown-menu4" role="menu">
					<div class="dropdown-content">
						<div class="dropdown-item">
							<aside class="menu">
								<ul class="menu-list">
									<li><a class = "inactivelink">Home</a></li>
									<li><a href = "./pages/viewProfile.php">Profile</a></li>
									<li><a href = "./pages/editor.php">Editor</a></li>
									<li><a href = "./log/logout.php">Logout</a></li>
								</ul>
							</aside>
						</div>
					</div>
				</div>
			</div>';
}
else
{
	echo '<a href = "./pages/login.php" class = "button is-outlined hbutton">Login</a>';
}
?>
			<h1 class="title is-1 has-text-light">CAMAGRU</h1>
		</div>
			 <p class="subtitle has-text-light">A social media app!</p>
	</div>
	<!-- Main Content -->
	<section class="section">
		<div class="columns">
			<!-- Left column -->
			<div class="column">
			</div>
			<!-- Left column end -->
			<!-- Middle column -->
			<div class="column">
				<div class="box has-text-centered has-background-grey-dark" id = "prof_box">
					<div class="block">
					<h1 class = "title is-3 has-text-white ">ALL OF THIS IS GOING TO CHANGE</h1>
						<img src="./images/illidan1.jpeg" alt="test" class="image">
						<article class="media">
							<figure class="media-left">
								<p class="image is-64x64">
							</p>
							</figure>
							<div class = "media-content">
							<div class="content has-text-light">
								<p>
									<strong class="has-text-light is-4">USERNAME</strong>
									<br>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
								</p>
							</div>
							<nav class="level is-mobile">
								<div class="level-left">
									<a class="level-item">
										<span class="icon is-small"><i class="fa fa-comment"></i></span>
									</a>
									<a class="level-item">
										<span class="icon is-small"><i class="fa fa-heart"></i></span>
									</a>
								</div>
							</nav>
						</div>		
							<div class="media-right">
							  <button class="delete"></button>
							</div>
						  </article>
					</div>
				</div>
			</div>
			<!-- Middle column end -->
			<!-- Right column -->
			<div class="column">
			</div>
			<!-- Right column end -->
		</div>
	</section>
	<nav>
		<div class="container">
			<div class="pagination is-centered" role="navigation" aria-label="pagination"><a class="pagination-previous">Previous</a><a class="pagination-next">Next page</a>
				<ul class="pagination-list">
					<li><a class="pagination-link" aria-label="Goto page 1" onclick="page_p()">Prev</a></li>
					<li><span class="pagination-ellipsis">…</span></li>
					<li><a class="pagination-link has-text-white-ter has-background-black" aria-label="Page 46" aria-current="page"><?PHP echo $_GET['page']?></a></li>
					<li><span class="pagination-ellipsis">…</span></li>
					<li><a class="pagination-link" aria-label="Goto page 86" onclick="page_n()">Next</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Credits -->
	<footer class="footer credits has-background-grey">
			<div class="content has-text-centered has-text-light">
				<p>Camagru by <a class ="has-text-light is-italic" href="https://github.com/cameronglanville">Cameron Glanville</a>,
				 <a class ="has-text-light is-italic" href="https://github.com/hbarnardWTC">Heinrich Barnard</a>,
				 <a class ="has-text-light is-italic" href="https://github.com/CaptainRedBear">Timothy Webb</a>.</p>
			</div>
	</footer>
<script>

<?PHP java_comment($imgamm, $_GET['page']);?>
function page_p()
{
	window.location.href = "<?PHP pager(-1, $imgamm);?>";
}

function page_n()
{
	window.location.href = "<?PHP pager(1, $imgamm);?>";
}

</script>
  </body>
</html>
