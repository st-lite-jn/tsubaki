<?php if(function_exists("get_field")):?>
<?php
	$home_crsls = get_field("home-crsl");
?>
	<?php if($home_crsls):?>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php foreach($home_crsls as $home_crsl):?>
				<?php
					$home_crsl_img = $home_crsl["images"];
					$home_img_large = $home_crsl_img["img-large"];
					$home_img_medium = $home_crsl_img["img-medium"] ? $home_crsl_img["img-medium"] : $home_crsl_img["img-large"];
				?>
				<figure class="swiper-slide home-slide" role="group">
					<picture>
						<source srcset="<?php echo $home_img_large["sizes"]["large"];?>" media="(min-width: 768px)"/>
						<source srcset="<?php echo $home_img_medium["sizes"]["medium"];?>" media="(max-width: 767px)"/>
						<img src="<?php echo $home_img_large["sizes"]["large"];?>" width="<?php echo $home_img_large["sizes"]["large-width"];?>" height="<?php echo $home_img_large["sizes"]["large-height"];?>" alt="<?php echo $home_img_large["alt"];?>">
					</picture>
						<?php if($home_crsl["text"] || $home_crsl["link"] ):?>
						<div class="home-slide__content">
							<?php if($home_crsl["text"]):?>
							<p><?php echo $home_crsl["text"];?></p>
							<?php endif;?>
							<?php if($home_crsl["link"]):?>
							<?php
								$home_crsl_title = $home_crsl["link"]["title"] ? $home_crsl["link"]["title"] :"詳細はこちら";
							?>
							<a href="<?php echo $home_crsl["link"]["url"];?>" target="<?php echo $home_crsl["link"]["target"];?>" rel="noopener"><?php echo $home_crsl_title;?></a>
							<?php endif;?>
						</div>
						<?php endif;?>
				</figure>
			<?php endforeach; ?>
		</div>
		<div class="swiper-pagination" aria-label="ページネーション"></div>
	</div>
	<?php endif; ?>
<?php endif; ?>
