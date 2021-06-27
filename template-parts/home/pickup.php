<?php if(function_exists("get_field")):?>
<?php
	$home_pcups = get_field("home-pickup");
?>
<?php if($home_pcups):?>
<section class="l-section l-section--bg">
		<div class="l-container">
			<h1 class="p-home-heading">ピックアップ</h1>
			<div class="p-archive">
			<?php foreach($home_pcups as $home_pcup):?>
				<article class="p-archive-article">
					<a href="<?php echo $home_pcup["link"]["url"];?>"target="<?php echo $home_pcup["link"]["target"];?>" rel="noopener">
					<figure class="p-archive-article__thumb">
						<img src="<?php echo $home_pcup["image"]["url"];?>" alt="<?php echo $home_pcup["image"]["alt"];?>">
					</figure>
					<?php if($home_pcup["link"]["title"]):?>
					<p class="p-archive-article__title"><?php echo $home_pcup["link"]['title'];?></p>
					<?php endif; ?>
					<?php if($home_pcup["description"]):?>
					<p class="p-archive-article__description"><?php echo $home_pcup["description"];?></p>
					<?php endif; ?>
					</a>
					</article>
			<?php endforeach; ?>
			</div>
		</div>
</section>
	<?php endif; ?>
<?php endif; ?>