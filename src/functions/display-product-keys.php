<?php
function trd_display_product_keys($keys) { ?>

	<section style="margin: 30px 0">

		<h2>Product key</h2>
		<table>
			<thead>
				<tr>
					<th>Product</th>
					<th>Product key</th>
					<th>Download Link</th>
					<th>How to activate</th>
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
									<li><?php echo sprintf('<a href="%s" target="_blank">Download</a>', $key['download_link']); ?></li> 
								<?php endforeach; ?> 
								</ul> 
							<?php endif; ?>
						</td>
						<td>
							<?php 
								foreach ($keys as $key) {
									echo $key['how_to_activate'];
									break;
								}
								$echoed = false;
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>	
		</table>
	</section>
<?php }