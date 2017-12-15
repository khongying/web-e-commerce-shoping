		<div class="container">
			<div class="row">
				<hr>
				<div class="col-lg-12">
					<div class="col-md-12">
						<p class="muted pull-right">© 2018 Company Shop Doraemon. All rights reserved</p>
					</div>
				</div>
			</div>
		</div>


		<script type="text/javascript">

			$('#cart').click(function(event) {
				$("#cart_data").load("<?= base_url(); ?>index.php/main/cart");
			});


			function openNav() {
			    document.getElementById("mySidenav").style.width = "250px";
			}

			function closeNav() {
			    document.getElementById("mySidenav").style.width = "0";
			}
		</script>

		</div>
    </body>
</html>