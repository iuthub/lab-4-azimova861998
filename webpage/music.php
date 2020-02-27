<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>


		<div id="listarea">
			<ul id="musiclist">
				<?php If (!isset($_REQUEST["playlist"])) { ?>

				<?php foreach(glob('songs/*.mp3') as $song) { ?>
					<?php $s = filesize($song);
						if($s<1024){
							$s=$s . "B";
						}
						elseif($s>1024 && $s<10486575){
							$s=round($s/100000, 0, PHP_ROUND_HALF_EVEN) . "Kb";
						}
						elseif($s>=10486575){
							$s=$s . "Mb";
						}
						?>

<li class="mp3item">
	<a href="<?=$song?>">
		<?= basename($song)?>
	</a>
	<span> <?= $s ?></span>
</li>
                 <?php } ?>


<?php foreach(glob('songs/*.txt') as $text) { ?>
	<li class="playlistitem">
		<a href=" music.php?playlist=<?= $text ?>">
			<?= basename($text) ?>
		</a>
	</li>
<?php } ?>
<?php } ?>
<?php if(isset($_REQUEST["playlist"])) { ?>
<?php foreach(file('songs/mypicks.txt') as $song) { ?>
<li class="mp3item">
	<a href="<?=$song?>"> <?=basename($song) ?> </a>
</li>
<?php } ?>
<?php } ?>
		</ul>

		</div>
	</body>
</html>
