<header>
      <div class="header">
        <div class="header-nav-pc-tablet">
          <div class="grid wide full-height">
            <div class="row full-height">
              <div class="col l-6 m-6 c-6">
                <div class="justify-start">
                  <div class="header-nav-click header-nav-qr">
                    <span>Vào cửa hàng trên ứng dụng LGP-Shop</span>
                    <div class="header-nav-qr-main">
                      <img src="asset/image/qr.png" alt="" />
                      <div class="header-nav-app">
                        <div class="header-nav-app-ch">
                          <img src="asset/image/ch.png" alt="" />
                        </div>
                        <div class="header-nav-app-st">
                          <img src="asset/image/st.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="header-nav-click">
                    <a href="tel:0961653104">
                      <i class="fas fa-phone-alt"></i>
                      <span>0961653104</span>
                    </a>
                  </div>
                  <div class="line"></div>
                  <div class="header-nav-click">
                    <a href="mailto:oanhphuc9699@gmail.com">
                      <i class="fas fa-envelope"></i>
                      <span>oanhphuc9699@gmail.com</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col l-6 m-6 c-6">
                <div class="justify-end">
                  <?php 
				  require_once("database/dbhelper.php");
				  if(isset($_POST["account-action"])){
					if($_POST["account-action"]=="logout"){
					  $_SESSION["user"]=0;
					  $_SESSION["username"]="Guest";
					  header("Location: index.php");
					  exit;
					}
				  }
				  
				  if($_SESSION["user"]==0){
				  echo '
				  <div class="header-nav-click header-nav-click-right">
                    <a href="register.php">
                      <span>Đăng Ký</span>
                    </a>
                  </div>
                  <div class="line"></div>
                  <div class="header-nav-click header-nav-click-right">
                    <a href="login.php">
                      <span>Đăng Nhập</span>
                    </a>
                  </div>
				  ';
				  }
				  else{
					$username=executeSingleResult('select tbl_user.username from tbl_user where tbl_user.id=' . $_SESSION["user"] . '')["username"];
					echo '
					<div class="header-nav-click header-nav-click-right">
					  <p style="color:white; font-size:12px">Xin chào: ';
					echo '<span id="logout" class="profile-name-logout-button" onclick="document.getElementById(';
					echo "'form-account-logout'";
					echo ').submit();">' . $username . '</span>';
					echo'  </p>
					</div>
					';
					echo '
					<form id="form-account-logout" method="post" action=';
					echo htmlspecialchars($_SERVER['PHP_SELF']);
					echo '>
					<input type="hidden" name="account-action" value="logout" form="form-account-logout"></input>
					</form>
					';
				  }
				  ?>
				  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-nav-mobile">
          <i class="fas fa-bars hamberger"></i>
          <div class="header-modal-box">
            <div class="header-modal">
              <div class="header-nav-click">
                <span> Đăng kí/ Đăng nhập </span>
              </div>
              <div class="header-nav-click">
                <a href="mailto:oanhphuc9699@gmail.com">
                  <i class="fas fa-envelope"></i>
                  <span>oanhphuc9699@gmail.com</span>
                </a>
              </div>
              <div class="header-nav-click">
                <a href="tel:0961653104">
                  <i class="fas fa-phone-alt"></i>
                  <span>0961653104</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="header-main grid wide">
          <div class="row full-height">
            <div class="header-main-logo col l-2 m-0 c-0">
			<a href="index.php">
              <img src="asset/image/LOGO.PNG" alt="" />
			</a>  
            </div>
            <div class="header-main-select col l-8 m-10 c-10">
              <div class="header-main-select-box">
				<div class="header-main-input">
				  <form id="search-box-form" action="search.php" method="get">
				    <input type="text" form="search-box-form" placeholder="Tìm Kiếm" name="keyword" id="search-box-text" />
				  </form>
					</div>
				  <button id="search-button" form="search-box-form" type="submit">
					<i class="fas fa-search"></i>
				  </button>
				</div>
            </div>
            <!--
			<div class="header-main-cart col l-2 m-2 c-2">
              <div class="header-main-cart-hover">
                <i class="fas fa-cart-arrow-down"></i>
                <div class="header-main-cart-number">
                  <span>3</span>
                </div>
                <div class="header-main-cart-mini header-main-cart--has-cart">
                  <img
                    class="no-cart"
                    src="asset/images/no-cart.png"
                    alt=""
                  />
                  <p>Mua đi chứ xem chùa thế à</p>
                  <div class="header-main-cart-header">
                    <h3>Sản phẩm đã thêm</h3>
                  </div>
                  <ul class="list-category">
                    <li>
                      <img src="asset/image/product1.jpg" alt="" />
                      <div class="list-category-text">
                        <div class="list-category-text-info">
                          <div class="list-category-text-name">
                            <span
                              >Giầy Thể Thao Nữ Viền Trắng GERRARD1999 chính
                              hàng do LGP-Shop sản xuất</span
                            >
                          </div>
                          <div class="list-category-text-number">
                            <span>2.070.000đ</span>
                            <span>x</span>
                            <span>1</span>
                          </div>
                        </div>
                        <div class="list-category-text-del">
                          <button>Xóa</button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <img src="asset/image/product6.jpg" alt="" />
                      <div class="list-category-text">
                        <div class="list-category-text-info">
                          <div class="list-category-text-name">
                            <span>Sản phẩm trị lão hóa</span>
                          </div>
                          <div class="list-category-text-number">
                            <span>5.470.000đ</span>
                            <span>x</span>
                            <span>1</span>
                          </div>
                        </div>
                        <div class="list-category-text-del">
                          <button>Xóa</button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <img src="asset/image/product6.jpg" alt="" />
                      <div class="list-category-text">
                        <div class="list-category-text-info">
                          <div class="list-category-text-name">
                            <span>Sản phẩm trị lão hóa</span>
                          </div>
                          <div class="list-category-text-number">
                            <span>5.470.000đ</span>
                            <span>x</span>
                            <span>1</span>
                          </div>
                        </div>
                        <div class="list-category-text-del">
                          <button>Xóa</button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <img src="asset/image/product6.jpg" alt="" />
                      <div class="list-category-text">
                        <div class="list-category-text-info">
                          <div class="list-category-text-name">
                            <span>Sản phẩm trị lão hóa</span>
                          </div>
                          <div class="list-category-text-number">
                            <span>5.470.000đ</span>
                            <span>x</span>
                            <span>1</span>
                          </div>
                        </div>
                        <div class="list-category-text-del">
                          <button>Xóa</button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <img src="asset/image/product6.jpg" alt="" />
                      <div class="list-category-text">
                        <div class="list-category-text-info">
                          <div class="list-category-text-name">
                            <span>Sản phẩm trị lão hóa</span>
                          </div>
                          <div class="list-category-text-number">
                            <span>5.470.000đ</span>
                            <span>x</span>
                            <span>1</span>
                          </div>
                        </div>
                        <div class="list-category-text-del">
                          <button>Xóa</button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <img src="asset/image/product6.jpg" alt="" />
                      <div class="list-category-text">
                        <div class="list-category-text-info">
                          <div class="list-category-text-name">
                            <span>Sản phẩm trị lão hóa</span>
                          </div>
                          <div class="list-category-text-number">
                            <span>5.470.000đ</span>
                            <span>x</span>
                            <span>1</span>
                          </div>
                        </div>
                        <div class="list-category-text-del">
                          <button>Xóa</button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <img src="asset/image/product6.jpg" alt="" />
                      <div class="list-category-text">
                        <div class="list-category-text-info">
                          <div class="list-category-text-name">
                            <span>Sản phẩm trị lão hóa</span>
                          </div>
                          <div class="list-category-text-number">
                            <span>5.470.000đ</span>
                            <span>x</span>
                            <span>1</span>
                          </div>
                        </div>
                        <div class="list-category-text-del">
                          <button>Xóa</button>
                        </div>
                      </div>
                    </li>
                    <li>
                      <img src="asset/image/product6.jpg" alt="" />
                      <div class="list-category-text">
                        <div class="list-category-text-info">
                          <div class="list-category-text-name">
                            <span>Sản phẩm trị lão hóa</span>
                          </div>
                          <div class="list-category-text-number">
                            <span>5.470.000đ</span>
                            <span>x</span>
                            <span>1</span>
                          </div>
                        </div>
                        <div class="list-category-text-del">
                          <button>Xóa</button>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <div class="list-category-sum">
                    <div class="sum-money">
                      <span>Tổng giá trị</span>
                      <span>7.540.000đ</span>
                    </div>
                    <div class="sum-point">
                      <span>Ví tích điểm</span>
                      <span>+2300 điểm</span>
                    </div>
                  </div>
                  <div class="list-category-but">
                    <button>Xem Giỏ Hàng</button>
                  </div>
                </div>
              </div>
            </div>
			-->
		  </div>
        </div>
      </div>
	  
	  <script>
		document.getElementById("search-button").value=document.getElementById("search-box-text").value;
	  </script>
    </header>
    