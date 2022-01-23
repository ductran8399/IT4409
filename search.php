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
    <link rel="stylesheet" href="asset/css/search.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    />
    <!-- Bootstrap CSS -->
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
			  <form id="search-category" action="search.php" method="get"></form>
              <button form="search-category" id="category-headphone" name="category" value="headphone">Tai Nghe</button>
              <button form="search-category" id="category-keyboard" name="category" value="keyboard">Bàn Phím</button>
              <button form="search-category" id="category-mouse" name="category" value="mouse">Chuột</button>
			  <button form="search-category" id="category-mouse" name="category" value=""> * Tất cả</button>
            </div>
          </div>
          <div class="col l-10 m-12 c-12">
            <div class="home-filter row">
              <div class="home-filter-click col l-9 m-9 c-9">
                <span>Sắp xếp theo</span>
                <button>Mới Nhất</button>
                <div class="home-filter-select">
                  <span>Giá</span>
                  <i class="fas fa-angle-down"></i>
                  <ul class="home-filter-option">
                    <li>
                      <a href="<?php echo '?page=1&category=' . (isset($_GET['category'])?$_GET['category']:"") . '&keyword=' . (isset($_GET['keyword'])?$_GET['keyword']:"") . '&sortby=asc' ?>">Giá: Thấp đến Cao</a>
                    </li>
                    <li>
                      <a href="<?php echo '?page=1&category=' . (isset($_GET['category'])?$_GET['category']:"") . '&keyword=' . (isset($_GET['keyword'])?$_GET['keyword']:"") . '&sortby=desc' ?>">Giá: Cao đến Thấp</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="home-product row">
			  <?php
			  // Search page
			  
			  if(isset($_GET['page'])){
				$current_page=$_GET['page'];
			  }
			  else {
				$current_page=1;
			  }
			  
			  // Search category
			  if(isset($_GET['category'])){
				switch($_GET['category']){
					case 'keyboard':
						$product_category='Ban phim';
						break;
					case 'mouse':
						$product_category='Chuot';
						break;
					case 'headphone':
						$product_category='Tai nghe';
						break;
					default:
						$product_category='';
						break;
				}
			  }
			  else {
				$product_category='';
			  }
			  // Search keyword
			  if(isset($_GET['keyword'])){
				$search_keyword=$_GET['keyword'];
			  }
			  else{
				$search_keyword='';
			  }
			  // Sort by price
			  if(isset($_GET['sortby'])){
			    $sort_by=$_GET['sortby'];
			  }
			  else{
			    $sort_by="";
			  }
			  
			  
			  $first_index=($current_page-1)*12;
			  //Lay danh sach tu database, limit=12
			  if (!empty($sort_by)){
				$query='select * from tbl_product where tbl_product.category like "%' . $product_category . '%" and tbl_product.name like "%' . $search_keyword . '%" order by tbl_product.price ' . $sort_by . ' LIMIT ' . $first_index . ', 12';
			    
			  }
			  else{
				$query='select * from tbl_product where tbl_product.category like "%' . $product_category . '%" and tbl_product.name like "%' . $search_keyword . '%" LIMIT ' . $first_index . ', 12';  
			  }
			  $product_list=executeResult($query);
			  
			  $product_count=executeSingleResult('select count(*) from tbl_product where tbl_product.category like "%' . $product_category . '%" and tbl_product.name like "%' . $search_keyword . '%"')[0];
			  $number_of_pages=floor($product_count/12)+1;
			  
			  foreach($product_list as $product) {
				$img_query="select path from tbl_image where tbl_image.product_id = {$product["id"]}";
				$img_path=executeSingleResult($img_query);
				
				echo'
				<div class="col l-3 m-4 c-6">
                <a class="home-product-item" href="details.php?item_id=' . $product["id"] . '">
                  <div
                    class="home-product-img"
                    style="background-image: url(asset'.$img_path[0].')"
                  ></div>
                  <div class="home-product-intro">
                    <span>'.$product["name"].'</span>
                  </div>
                  <div class="home-product-price">
                    <!--
					<div class="home-product-price-old">
                      <del>2.000.000đ</del>
                    </div>
					-->
                    <div class="home-product-price-new">
                      <span>'.number_format($product["price"],0,".",",").'</span>
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
                      <span>Thanh Hóa</span>
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
              </div>
				';
			  }
			  ?>
            </div>
            <div class="home-pagination">
              <ul class="list-items-container">
				<?php
				
				//Left arrow
				echo ('
				<li class="list-items">');
                if ($current_page==1) {
					echo  '<a href="" class="list-link">';
				}
				else {
					echo '<a href="?page=' . $current_page-1 . '&category=' . (isset($_GET['category'])?$_GET['category']:"") . '&keyword=' . (isset($_GET['keyword'])?$_GET['keyword']:"") . '&sortby=' . (isset($_GET["sortby"])?$_GET["sortby"]:"") . '" class="list-link">';
				}
				echo('
                    <i class="fas fa-chevron-left"></i>
                  </a>
                </li>
				');
				
				//Pages
				
				for ($i=0;$i<$number_of_pages;$i+=1){
					
					if(isset($_GET["page"])) {
						if($_GET["page"]==$i+1){
							echo '<li class="list-items list-items-action">';
						}
						else {
							echo '<li class="list-items">';
						}
					}
					else {
						if($i==0) {
							echo '<li class="list-items list-items-action">';
						}
						else {
							echo '<li class="list-items">';
						}
					};
					echo '  <a href="?page=' . $i+1 . '&category=' . (isset($_GET['category'])?$_GET['category']:"") . '&keyword=' . (isset($_GET['keyword'])?$_GET['keyword']:"") . '&sortby=' . (isset($_GET["sortby"])?$_GET["sortby"]:"") . '" class="list-link">';
					echo "	  <span>". $i+1 ."</span>";
					echo '  </a>';
					echo '</li>';
					
				}
				
				//Right arrow
				echo('
				<li class="list-items">');
				if($current_page>=$number_of_pages){
					echo '<a href="" class="list-link">';
				}
				else{
					echo '<a href="?page=' . $current_page+1 . '&category=' . (isset($_GET['category'])?$_GET['category']:"") . '&keyword=' . (isset($_GET['keyword'])?$_GET['keyword']:"") . '&sortby=' . (isset($_GET["sortby"])?$_GET["sortby"]:"") . '" class="list-link">';
				}
                echo('    <i class="fas fa-chevron-right"></i>
                  </a>
                </li>
				');
				?>
                
              </ul>
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
  </body>
</html>
