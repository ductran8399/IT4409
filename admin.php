<?php
	session_start();
	
	if(!isset($_SESSION["user"])){
		$_SESSION["user"]=0;
		$_SESSION["username"]="Guest";
		header("Location: index.php");
		exit;
	}
	else{
		if ($_SESSION["user"]!=1){
			header("Location: index.php");
			exit;
		}
	}
	
	// TODO Profile and Settings
	if(isset($_POST["account-action"])){
		if($_POST["account-action"]=="logout"){
			$_SESSION["user"]=0;
			$_SESSION["username"]="Guest";
			header("Location: index.php");
			exit;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="asset/css/headeradmin.css" />
    <link rel="stylesheet" href="asset/css/main.css" />
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    />
    <title>header</title>
  </head>
  <body>
    <header>
      <nav>
          <div class="nav-box">
            <div class="nav-contain">
              <div class="logo">
                <img
                  src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                  alt="Workflow"
                />
              </div>
              <div class="nav-heading">
                <div class="nav-heading-box ">
                  <a
                  class="active"
                    href="#"
                    >Thêm sản phẩm</a
                  >

                  <a
                    href="#"
                    >Thêm nhà cung cấp</a
                  >
                  <a
                    href="#"
                    >Thêm dòng sản phẩm</a
                  >
                </div>
              </div>
            </div>
            <div class="user">
                <div class="avatar">
                    <img
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                    />
                    <span class="name">Phúc Nguyễn</span>
                </div>
                <div
                    class="box-info"
                    >
					<!-- TODO -->
                    <a
                        href="#"
                        role="menuitem"
                        tabindex="-1"
                        id="user-menu-item-0"
                        >Your Profile</a
                    >

                    <a 
                        href="#"
                        role="menuitem"
                        tabindex="-1"
                        id="user-menu-item-1"
                        >Settings</a
                    >
					<!-- TODO -->	
					
					<form id="form-account-logout" method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>
                    <a
                        href="javascript:;"
						onclick="document.getElementById('form-account-logout').submit();"
                        role="menuitem"
                        tabindex="-1"
                        id="user-menu-item-2"
                        >Sign out</a
                    >
					<input type="hidden" name="account-action" value="logout" form="form-account-logout"></input>
					</form>
                </div>
            </div>
            <div class="hamberger">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  aria-hidden="true"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                  />
                </svg>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  aria-hidden="true"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
            </div>
          </div>
        </div>

        <!-- bật lên khi click vào hamberger icon -->
        <div class="menu-mobile">
          <div class="hamberger-list">
            <a
              href="#"
              class="active"
              aria-current="page"
              >Thêm sản phẩm</a
            >

            <a
              href="#"
              >Thêm nhà cung cấp</a
            >
            <a
              href="#"
              >Thêm dòng sản phẩm</a
            >
          </div>
          <div class="mobile-user">
            <div class="mobile-avatar">
                <img
                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                  alt=""
                />
                <span class="mobile-name">Phúc Nguyễn</span>
            </div>
            <div class="mobile-box-info">
              <a
                href="#"
                >Your Profile</a
              >

              <a
                href="#"
                >Settings</a
              >

              <a
                href="#"
                >Sign out</a
              >
            </div>
          </div>
      </nav>
      <div class="header-main">
        <div class="main-box">
          <h1>Thêm sản phẩm</h1>
        </div>
      </div>
    </header>
    <main>
      <div class="main-box">
        <h2>Thêm sản phẩm mới</h2>
        <div class="insert-product">
            <div class="input-box">
                <label for="name">Tên sản phẩm :</label>
                <input type="text" name="name">
            </div>
            <div class="input-box">
                <label for="type_product">Loại sản phẩm :</label>
                <div name="type_product" class="select-box">
                  <div class="select">
                    <span>Bàn phím</span>
                    <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="option-box">
                    <div class="option">Bàn phím</div>
                    <div class="option" value="">Tai nghe</div>
                    <div class="option" value="">Chuột</div>
                  </div>
                </div>
            </div>
            <div class="input-box">
                <label for="line_product">Tên dòng sản phẩm :</label>
                <!-- line_product lấy từ db phụ thuộc vào type_product-->
                <div name="type_product" class="select-box">
                  <div class="select">
                    <span>Bàn phím abc</span>
                    <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="option-box">
                    <div class="option">Bàn phím abc</div>
                    <div class="option" value="">Bàn phím xyz</div>
                    <div class="option" value="">Bàn phím lgp</div>
                  </div>
                </div>
            </div>
            <div class="input-box">
                <label for="price">Đơn giá</label>
                <input type="number" name="price" min="0">
            </div>
            <div class="input-box">
                <label for="status">Trạng thái</label>
                <div name="type_product" class="select-box">
                  <div class="select">
                    <span>Hết hàng</span>
                    <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="option-box">
                    <div class="option">Hết hàng</div>
                    <div class="option" value="">Còn hàng</div>
                  </div>
                </div>
            </div>
            <div class="input-box upload">
              <div class="input-file-container">  
                <input class="input-file" id="my-file" type="file">
                <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
              </div>
            </div>
            <div class="button-box">
                <button>Thêm sản phẩm</button>
            </div>
        </div>
      </div>
      
      <div class="main-box">
        <div class="filter">
          <label for="type_product">Loại sản phẩm :</label>
          <div name="type_product" class="select-box">
            <div class="select">
              <span>Bàn phím</span>
              <i class="fas fa-angle-down"></i>
            </div>
            <div class="option-box">
              <div class="option">Bàn phím</div>
              <div class="option" value="">Tai nghe</div>
              <div class="option" value="">Chuột</div>
            </div>
          </div>
        </div>
        <div class="titles">
          <div class="title">
            <span>Tên</span>
          </div>
          <div class="title">
            <span>Dòng sản phẩm</span>
          </div>
          <div class="title">
            <span>Đơn giá</span>
          </div>
          <div class="title">
            <span>Trạng thái</span>
          </div>
        </div>
        <ul class="products">
          <li>
            <div class="product">
              <div class="info">
                <span>Bàn phím cơ A1</span>
              </div>
              <div class="info">
                <span>Dòng sản phẩm</span>
              </div>
              <div class="info">
                <span>1.000.000đ</span>
              </div>
              <div class="info">
                <span>Hết hàng</span>
              </div>
            </div>
            <div class="action">
              <button>Xóa</button>
            </div>
          </li>
          <li>
            <div class="product">
              <div class="info">
                <span>Bàn phím cơ A1</span>
              </div>
              <div class="info">
                <span>Dòng sản phẩm</span>
              </div>
              <div class="info">
                <span>1.000.000đ</span>
              </div>
              <div class="info">
                <span>Hết hàng</span>
              </div>
            </div>
            <div class="action">
              <button>Xóa</button>
            </div>
          </li>
          <li>
            <div class="product">
              <div class="info">
                <span>Bàn phím cơ A1</span>
              </div>
              <div class="info">
                <span>Dòng sản phẩm</span>
              </div>
              <div class="info">
                <span>1.000.000đ</span>
              </div>
              <div class="info">
                <span>Hết hàng</span>
              </div>
            </div>
            <div class="action">
              <button>Xóa</button>
            </div>
          </li>
        </ul>
      </div>
    </main>
  </body>
</html>
