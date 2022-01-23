<?php
	session_start();
	
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>LGP-Shop</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/product-slider.css">
    <link rel="stylesheet" href="asset/css/home-slider.css">
    <link rel="stylesheet" href="asset/css/upcoming.css">
    <link rel="stylesheet" href="asset/css/home.css">
	<link
      rel="shortcut icon"
      href="asset/image/LOGO.PNG"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="asset/css/grid.css" />
    <link rel="stylesheet" href="asset/css/base.css" />
	<link rel="stylesheet" href="asset/css/header.css"/>
    <link rel="stylesheet" href="asset/css/footer.css"/>
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    />
</head>

<body>
	<?php
	include("modules/header.php");
	?>
	
    <div class="slider">
        <div class="fa fa-angle-left slider-prev"></div>
        <div class="fa fa-angle-right slider-next"></div>
        <!-- <ul class="slider-dots">
            <li class="slider-dot-item active" data-index="0"></li>
            <li class="slider-dot-item" data-index="1"></li>
            <li class="slider-dot-item" data-index="2"></li>
            <li class="slider-dot-item" data-index="3"></li>
            <li class="slider-dot-item" data-index="4"></li>
        </ul> -->
        <div class="slider-wrapper">
            <div class="slider-main">
                <div class="slider-item animate__animated">
                    <img src="https://images.unsplash.com/photo-1475809913362-28a064062ccd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="" />
                </div>
                <div class="slider-item animate__animated">
                    <img src="https://images.unsplash.com/photo-1463501810073-6e31c827a9bc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="" />
                </div>
                <div class="slider-item animate__animated">
                    <img src="https://images.unsplash.com/photo-1497752531616-c3afd9760a11?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="" />
                </div>
                <div class="slider-item animate__animated">
                    <img src="https://images.unsplash.com/photo-1425082661705-1834bfd09dca?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1355&q=80" alt="" />
                </div>
                <div class="slider-item animate__animated">
                    <img src="https://images.unsplash.com/photo-1470093851219-69951fcbb533?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="" />
                </div>
            </div>
        </div>
    </div>

    <div class="upcoming">
        <p>ĐÓN CHỜ SẢN PHẨM MỚI RA MẮT</p>
        <p>Shop sẽ mang đến những sản phẩm mới ra mắt trong năm 2022</p>
        <div class="upcoming-timebox-wrapper">
            <div class="upcoming-timebox">
                <span id="timebox-hour">0</span>
                <span>HOURS</span>
            </div>
            <div class="upcoming-timebox">
                <span id="timebox-min">0</span>
                <span>MIN</span>
            </div>
            <div class="upcoming-timebox">
                <span id="timebox-sec">0</span>
                <span>SEC</span>
            </div>
        </div>
        <button>KHÁM PHÁ NGAY</button>
    </div>

   
    <div class="best-product">
        <div class="best-product-item">
            <img src="https://cdn.thewirecutter.com/wp-content/media/2021/05/mechanicalkeyboards-2048px-2x1-0036.jpeg?auto=webp&quality=75&crop=2:1&width=1024" alt="">
        </div>
        <div class="best-product-item">
            <img src="https://cdn.thewirecutter.com/wp-content/media/2021/05/mechanicalkeyboards-2048px-2x1-0036.jpeg?auto=webp&quality=75&crop=2:1&width=1024" alt="">
        </div>
    </div>

    <div class="shop-category-wrapper">
        <div class="shop-category" onclick="window.location='search.php?category=keyboard';">
            <img src="http://images.musicstore.de/images/1280/logickeyboard-premium-slim-line-pc-keyboard-de_1_PCM0016045-000.jpg" alt="">
            <p>KEYBOARD</p>
        </div>
        <div class="shop-category" onclick="window.location='search.php?category=mouse';">
            <img src="https://cc.cnetcontent.com/inlinecontent/mediaserver/all/8db/4a8/8db4a83e5c92fd30d8670e0b6385186a/original.png" alt="">
            <p>MOUSE</p>
        </div>
        <div class="shop-category" onclick="window.location='search.php?category=headphone';">
            <img src="http://cdn.shopify.com/s/files/1/0112/1203/0016/products/ONIKUMA-X8-Gaming-Headset-35mm-Wired-Bass-Stereo-Noise-canceling-Earphone-with-RGB-LED-Lights-Microphone-for-PS4-PC-Gamer_1200x1200.png?v=1636191957" alt="">
            <p>HEADSET</p>
        </div>
    </div>

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
    <script src="scripts/home-slider.js"></script>
    <script src="scripts/countdown-timer.js"></script>
    <script src="scripts/product-slider.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	
	<?php
	include("modules/footer.php");
	?>
</body>

</html>