<?php
	session_start();
	require_once ('database/dbhelper.php');
	
	if(!isset($_SESSION["user"])){
		$_SESSION["user"]=0;
		$_SESSION["username"]="Guest";
	}
	else{
		if ($_SESSION["user"]==1){
			header("Location: admin.php");
			exit;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LGP-Shop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="shortcut icon"
      href="asset/image/LOGO.PNG"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="asset/css/grid.css" />
    <link rel="stylesheet" href="asset/css/base.css" />
    <link rel="stylesheet" href="asset/css/header.css" />
    <link rel="stylesheet" href="asset/css/footer.css" />
    <link rel="stylesheet" href="asset/css/details.css" />
	<link rel="stylesheet" type="text/css" href="asset/css/slider.css">
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    />
    <!-- Bootstrap CSS -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
  </head>
  <body>
    <?php
	include("modules/header.php");
	?>
	<main>
      <div class="grid wide">
        <div class="row">
          <div class="col l-2 m-12 c-12 list-name">
            <div class="list-name-header">
              <i class="fas fa-list"></i>
              <span>Danh Mục</span>
            </div>
            <div class="list-name-action">
              <span>Sản Phẩm</span>
            </div>
            <div class="list-name-category">
              <button>Tai Nghe</button>
              <button>Bàn Phím</button>
              <button>Chuột</button>
            </div>
          </div>
          <div class="col l-10 m-12 c-12">
            <div class="product-details col l-12 m-12 c-12">
              <div class="row">
                <div class="product-details-img col l-6 m-12 c-12">
				  <?php
						if(isset($_GET["item_id"])){
							$product=executeSingleResult("select * from tbl_product where tbl_product.id={$_GET["item_id"]}");
						}
						else {
							$product=executeSingleResult("select * from tbl_product where tbl_product.id=0");
						}
						
						$product_images=executeResult('select * from tbl_image where tbl_image.product_id=' . $product["id"] . '');
					?>
					<img id=featured src="<?php echo "asset"; echo($product_images[0]["path"]); ?>">

					<div id="slide-wrapper" >
						<img id="slideLeft" class="arrow" src="asset/image/arrow-left.png">
						<div id="slider">
							<?php
							foreach($product_images as $ip){
								echo '<img class="thumbnail" src="asset ' . $ip["path"] . '">';
							}
							?>
						</div>
						<img id="slideRight" class="arrow" src="asset/image/arrow-right.png">
					</div>
                </div>
                <div class="product-details-info col l-6 m-12 c-12">
                  <div class="product-details-info-title">
                    <?php
					echo $product["name"];
					?>
                  </div>
                  <div class="product-details-info-price">
                    <!--<del>499.000₫</del>-->
                    <span>
					<?php
					echo '<bdi>';
					echo number_format($product["price"],0,",",".");
					echo '<span> đ</span>';
					echo '</bdi>';
					?>
					</span>
                  </div>
                  <ul class="product-details-info-reviews">
					<?php
					$description=executeResult("select * from tbl_description where tbl_description.product_id={$product["id"]}");
					foreach($description as $desc) {
						echo '<li class="product-details-info-review">';
						echo '<span>';
						echo $desc['content'];
						echo '</span>';
						echo '</li>';
					}
					?>
                  </ul>
                  
				  <div class="product-details-info-buy">
                    <input type="number" value="1" />
                    <button>Thêm vào giỏ hàng</button>
                  </div>
                  
				  <div class="type">
                    <span> Danh mục: 
					<?php
					switch ($product['category']){
						case 'Ban phim':
							echo "Bàn phím";
							break;
						case 'Chuot':
							echo "Chuột";
							break;
						case 'Tai nghe':
							echo "Tai nghe";
							break;
						default:
							break;
					};
					?>
					</span>
                    <!--<span> Từ khóa: LGP8 </span>-->
                  </div>
                </div>
                <div class="product-details-additional l-12 m-12 c-12">
                  <div class="product-details-buttons">
                    <div class="product-details-button">MÔ TẢ</div>
                    <div class="product-details-button action">
                      THÔNG TIN BỔ SUNG
                    </div>
                  </div>
                  <div class="product-details-description">
                    <h2 class="product-details-description-title">
                      Ut rhoncus vulputate tortor, a.
                    </h2>
                    <div class="product-details-description-blog">
                      <div class="product-details-description-block">
                        Mauris facilisis nec elit et rutrum. Etiam congue libero quis metus bibendum imperdiet. Morbi rutrum arcu at nulla pretium, nec ultricies enim finibus. Etiam posuere vestibulum tempus. Pellentesque mattis urna vel volutpat euismod. Ut tincidunt tempus nisl, ut molestie urna semper eu. Maecenas sit amet purus lobortis, maximus nunc sodales, tincidunt tortor. Maecenas dapibus a nisl vitae faucibus. Nam vitae dolor nibh.
                      </div>
                      <div class="product-details-description-block">
                        Nulla ac augue imperdiet, ultrices nisi placerat, bibendum nisi. Fusce id arcu vel orci feugiat sollicitudin. Vestibulum tristique, nunc eget dictum eleifend, elit augue efficitur dui, vel fermentum dui purus fermentum justo. Fusce dapibus rutrum ante, sit amet mollis ligula euismod at. Sed eu tincidunt nibh. Duis at sem a mauris pharetra semper. Nam quis risus turpis. Sed ut blandit diam. Praesent vel nulla ante. Nullam volutpat metus sit amet sem lacinia rhoncus. Nunc eros mi, fringilla molestie augue eget, lacinia aliquet orci. Quisque faucibus mauris nec felis porta, sed lobortis dolor venenatis.
                      </div>
                      <div class="product-details-description-block">
                        Aliquam at augue finibus ante euismod venenatis. Pellentesque lobortis tortor ac lacus blandit vulputate. Proin mi nulla, posuere in egestas vitae, mattis a ante. Nullam eu turpis faucibus, eleifend turpis at, varius velit. Vivamus tortor sapien, vehicula eu diam in, ultrices sollicitudin enim. Aliquam nec magna vitae libero fringilla consequat. Nulla vestibulum, elit malesuada malesuada accumsan, nulla urna commodo tellus, vitae convallis dolor nunc tempus sem. Nulla cursus metus in elit pharetra commodo. Suspendisse vulputate tellus augue, ut condimentum sem dignissim a. Proin nec nunc diam. Mauris tempus ex vitae erat pretium ultrices. Duis convallis iaculis laoreet. Aliquam ut nisi vel purus commodo rhoncus.
                      </div>                      
                    </div>
                  </div>
                  <ul class="product-details-description-additional action">
                    <li>
                      <div class="title">Property 1</div>
                      <div class="info">Description 1</div>
                    </li>
                    <li>
                      <div class="title">Property 2</div>
                      <div class="info">Description 2</div>
                    </li>
                    <li>
                      <div class="title">Property 3</div>
                      <div class="info">Description 3</div>
                    </li>
                    <li>
                      <div class="title">Property 4</div>
                      <div class="info">Description 4</div>
                    </li>
                    <li>
                      <div class="title">Property 5</div>
                      <div class="info">Description 5</div>
                    </li>
                    <li>
                      <div class="title">Property 6</div>
                      <div class="info">Description 6</div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
		  
		  <!--comments-->
		  <div class="comment col l-2 m-12 c-12"></div>
		  <div class="comment col l-10 m-12 c-12">
			<div class="comment-form-container">
				<form id="form-comment">
					<div class="input-row">
						<input type="hidden" name="item_id" id="item_id" value="<?php $_GET["item_id"] ?>"/> 
						<input type="hidden" name="comment_id" id="commentId"/>
						<input type="hidden" name="user_id" id="user_id"/>
						<input type="hidden" name="username" id="username"/>
						<!--<input class="input-field" type="text" name="name" id="name" placeholder="Name" />-->
						<div class="heading-product-last-seen">BÌNH LUẬN</div>
						<h4><?php echo($_SESSION["username"]); ?></h4>
					</div>
					<div class="input-row">
						<textarea class="input-field" type="text" name="comment" id="comment" placeholder="Add a Comment"> 
						</textarea>
					</div>
					<div>
						<input type="button" class="btn-submit" id="submitButton" value="Publish" />
						<div id="comment-message">Comments Added Successfully!</div>
					</div>
				</form>
			</div>
			<div id="output"></div>

		  </div>
		  <!---->
		  
          <div class="product-last-seen col l-12 m-12 c-12">
            <div class="heading-product-last-seen">CÁC SẢN PHẨM TƯƠNG TỰ</div>
            <div class="row">
			  <?php
			  $query='select * from tbl_product where tbl_product.category = "' . $product["category"] . '" order by rand() limit 6';
			  $similar_product=executeResult($query);
			  

			  foreach ($similar_product as $sp){
				$img_query="select path from tbl_image where tbl_image.product_id = {$sp["id"]}";
				$img_path=executeSingleResult($img_query);
				echo '
				<div class="product-last-seen-item col l-2 m-3 c-6">
                <a class="home-product-item" href="?item_id=' . $sp["id"] . '">
                  <div
                    class="home-product-img"
                    style="background-image: url(asset'.$img_path[0].')"
                  ></div>
                  <div class="home-product-intro">
                    <span
                      >
					  ' . $sp["name"] . '
					  </span
                    >
                  </div>
                  <div class="home-product-price">                    
                    <div class="home-product-price-new">
                      <span>'.number_format($sp["price"],0,".",",").'</span>
                    </div>
                  </div>
                  <div class="home-product-evaluate">
                    <div class="home-product-like home-product-liked">
                      <i class="home-product-like-no far fa-heart"></i>
                      <i class="home-product-like-yes fas fa-heart"></i>
                    </div>
                    <div class="home-product-box-ratting">
                      <div class="home-product-ratting">
                        <i class="home-product-ratting-gold fas fa-star"></i>
                        <i class="home-product-ratting-gold fas fa-star"></i>
                        <i class="home-product-ratting-gold fas fa-star"></i>
                        <i class="home-product-ratting-gold fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      <div class="home-product-sold">
                        <span>Đã bán 17</span>
                      </div>
                    </div>
                  </div>
                  <div class="home-product-infor">
                    <div class="home-product-trademark">
                      <span>LGP_Shop</span>
                    </div>
                    <div class="home-product-country">
                      <span></span>
                    </div>
                  </div>
                  <div class="home-product-favourite">
                    <i class="fas fa-check"></i>
                    <span>Yêu Thích</span>
                  </div>
                  <div class="home-product-sale-off">
                    <span>10%</span>
                    <span>GIẢM</span>
                  </div>
                </a>
              </div>';
			  }
			  ?>  
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php
	include("modules/footer.php");
	?>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
	
	<!-- Javascript for image slider -->
	<script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('mouseover', function(){
				console.log(activeImages)
				
				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}
				

				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})
	</script>
	
	<!-- Javascript for AJAX comment -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="scripts/ajax-comment.js"></script>
	
	
  </body>
</html>
