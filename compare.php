<?php
include 'inc/header.php';
?>

<!-- <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];
    $update_quantity_cart = $ct->update_quantity_cart($cartId, $quantity);
	if($quantity <= 0){
		$delcart = $ct->del_product_cart($cartId);
	}
}
?> -->

<!-- <?php 
if (isset($_GET['cartId'])) {
	$cartId = $_GET['cartId'];
	$delcart = $ct->del_product_cart($cartId);
}
?> -->

<!-- <?php 
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?> -->

<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Compare Product</h2>
				<?php
				if(isset($update_quantity_cart)){
					echo $update_quantity_cart;
				}
				?>
				<?php
				if(isset($delcart)){
					echo $delcart;
				}
				?>
				<table class="tblone">
					<tr>
					    <th width="10%">ID</th>
						<th width="20%">Product Name</th>
						<th width="20%">Image</th>
						<th width="15%">Price</th>
						<th width="10%">Action</th>
					</tr>
					<tr>

						<?php
						$customer_id = Session::get('customer_id');
						$get_compare = $product->get_compare($customer_id);
						if ($get_compare) {
							$i = 0;
							while ($result = $get_compare->fetch_assoc()) {
							 	$i++;

						?>
								<td><?php echo $i?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
								<td><?php echo $result['price']?></td>
								<td><a href="preview.php?proid=<?php echo $result['productId'] ?>">View</a></td>
					</tr>
						<?php
								}
							}
						?>
				</table>
				
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
include 'inc/footer.php';
?>