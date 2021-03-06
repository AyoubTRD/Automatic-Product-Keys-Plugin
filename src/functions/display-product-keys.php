<?php
function trd_display_product_keys($keys) { ?>

	<section style="margin: 30px 0">

		<h2><?php _e('Product key', 'trdpk'); ?></h2>
		<table>
			<thead>
				<tr>
					<th><?php _e('Product name', 'trdpk') ?></th>
					<th><?php _e('Product key', 'trdpk') ?></th>
					<th><?php _e('Download link', 'trdpk') ?></th>
					<th><?php _e('How to activate', 'trdpk') ?></th>
				</tr>	
			</thead>
			<tbody>
				<?php foreach ($keys as $item_id => $v): 
					$item = $v['item'];
					$keys = $v['keys'];
					$product = $item->get_product();
				?>
					<tr>
						<td><a href="<?php echo get_permalink($product->get_id()); ?>"><?php echo $product->get_name() ?></a></td>
						<td>
							<?php if (count($keys) == 1): 
								foreach ($keys as $key) {
									echo $key['key'];
								}
							else: ?>

								<ul style="margin: 0">
								<?php foreach ($keys as $key): ?> 
									<li><?php echo $key['key'] ?></li>
								<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</td>
						<td>
							<?php if (count($keys) == 1): 
								foreach ($keys as $key) {
									echo sprintf('<a href="%s" target="_blank">Download</a>', $key['download_link']);
								}
							else: ?>
							<ul style="margin: 0"> 
								<?php foreach ($keys as $key): ?> 
									<li><?php echo sprintf('<a href="%s" target="_blank">%s</a>', $key['download_link'], __('Download', 'trdpk')); ?></li> 
								<?php endforeach; ?> 
								</ul> 
							<?php endif; ?>
						</td>
						<td>
							<?php 
								echo get_field('trd_how_to_activate', $item->get_product()->get_id());
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>	
		</table>
	</section>
<?php }