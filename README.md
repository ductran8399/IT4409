# IT4409
## Bài tập lớn Công nghệ web và dịch vụ trực tuyến

### Nhóm 15:
### Đề tài: Xây dựng website bán hàng trực tuyến sử dụng PHP

#### Phân công công việc
Trần Đình Đức - 20173022    : Thực hiện viết logic PHP, quản lý session và các phương thức request, truy vấn Database. 
Nguyễn Văn Phúc - 20173306  : Thực hiện design FE màn hình đăng ký, đăng nhập, browse sản phẩm và chi tiết sản phẩm. 
Trịnh Minh Tuấn - 20183658  : Thực hiện design FE màn hình chính (index.html), viết script phía FE (slider, ajax).
Trịnh Xuân Tùng - 20183663  : Thực hiện crawl dữ liệu, xây dựng database, làm slide thuyết trình.

#### Môi trường:  
XAMPP là chương trình máy chủ Web có tích hợp sẵn Apache (máy chủ HTTP) và MySQL (Hệ quản trị cơ sở dữ liệu)  
![image](https://user-images.githubusercontent.com/67249422/150682267-8423a711-35c3-4df0-928d-e0e9bc08430e.png)

#### Cài đặt:
https://www.apachefriends.org/download.html
Máy thực hiện demo có hệ điều hành Windows 10, cài đặt phiên bản XAMPP 8.1.1
![image](https://user-images.githubusercontent.com/67249422/150682686-37355b8b-6668-4802-b02d-e6f99636a327.png)  

Sau khi cài đặt, ta bật được màn hình XAMPP Control Panel như sau. Phạm vi đề tài chỉ sử dụng service của Apache và MySQL.
![image](https://user-images.githubusercontent.com/67249422/150682806-d9199ac2-748b-4cfc-845e-7abd250967a3.png)  
  
Bật màn hình quản trị MySQL ở Admin, hoặc đường dẫn localhost/phpmyadmin trên browser
![image](https://user-images.githubusercontent.com/67249422/150683172-2a68df00-fdd5-498a-87f8-7e94e56c20c0.png)

Tạo một CSDL tên IT4409 (có thể đổi khác, đây là tên mặc định trong dbconfig)  
Trong CSDL này, chạy file "create_database_query.sql" trong thư mục draft. Query gồm cả 2 phần CREATE TABLE và INSERT. Có thể chạy riêng lẻ để tránh gặp lỗi constraint.
![image](https://user-images.githubusercontent.com/67249422/150683349-b4c2339d-3d1a-4bce-a80f-49a6b5eabbdb.png)
  
Trong thư mục cài đặt XAMPP (mặc định trên Windows là C://xampp), có thư mục htdocs là thư mục webroot của XAMPP. Copy các thành phần trong repository này (trừ folder Draft chứa các script hỗ trợ việc xây dựng CSDL demo) vào htdocs/IT4409/ (IT4409 là tên project này, có thể được đổi).
![image](https://user-images.githubusercontent.com/67249422/150683722-39dd3a3d-d4e6-4b3a-b9a3-ee0c2d3f9f92.png)

Từ đây trang web có thể được truy cập theo đường dẫn localhost/IT4409 (entry point là index.php).
![image](https://user-images.githubusercontent.com/67249422/150683745-091881ea-e690-4d1e-9f9f-6650659d6925.png)

#### Các công việc đã thực hiện được:
- Các màn hình: màn hình chính, màn hình đăng nhập đăng xuất, màn hình tìm kiếm sản phẩm, màn hình thông tin chi tiết sản phẩm, màn hình quản trị viên
- Thực hiện các công việc logic: tìm kiếm, sắp xếp sản phẩm, xem thông tin chi tiết từng sản phẩm, quản lý đăng nhập đăng xuất, phân quyền quản trị viên, thành viên đăng kí và khách, bình luận của thành viên bằng AJAX
- Các công việc cần thực hiện: quyền C.R.U.D dữ liệu của admin, đăng ký thành viên mới, xử lý bình luận xấu; các chức năng như giỏ hàng, đặt hàng, ...
- Cây tổ chức thư mục của Project:![image](https://user-images.githubusercontent.com/67249422/150684146-f6d01fde-8410-4e5e-a0b1-2f3cb3925547.png)


  

