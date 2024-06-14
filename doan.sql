--  Cơ sở dữ liệu PBS KIDS ---
-- 1.Tài khoản người dùng
CREATE TABLE nguoi_dung (
    ten_dang_nhap VARCHAR(50) PRIMARY KEY,
    mat_khau VARCHAR(70) NOT NULL,
    avatar VARCHAR(50) NOT NULL DEFAULT 'avatar.png',
    ngay_tao DATE DEFAULT CURRENT_TIMESTAMP,
    chuc_vu INT DEFAULT 0 CHECK(chuc_vu IN (0,1,2))
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE TABLE thong_tin_ca_nhan (
    ten_dang_nhap VARCHAR(50) PRIMARY KEY,
    ho_va_ten VARCHAR(50) NOT NULL,
    gioi_tinh VARCHAR(5),
    ngay_sinh DATE ,
    so_dien_thoai VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL,
    truong VARCHAR(100) ,
    FOREIGN KEY (ten_dang_nhap) REFERENCES nguoi_dung(ten_dang_nhap)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- 2. Nhóm/ Lớp học
CREATE TABLE nhom (
    ma_nhom INT PRIMARY KEY,
    ten_nhom VARCHAR(150) NOT NULL,
    nguoi_tao VARCHAR(50) NOT NULL,
    avatar VARCHAR(50) NOT NULL,
    ngay_tao DATE DEFAULT CURRENT_TIMESTAMP,
    che_do VARCHAR(50) NOT NULL ,
    loai_hinh VARCHAR(50) NOT NULL ,
    mo_ta text,
    FOREIGN KEY (nguoi_tao) REFERENCES nguoi_dung(ten_dang_nhap)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE TABLE thanh_vien_nhom (
    ma_nhom INT NOT NULL,
    ten_dang_nhap VARCHAR(50) NOT NULL,
    ngay_vao DATE DEFAULT CURRENT_TIMESTAMP,
    chuc_vu INT DEFAULT 0 CHECK(chuc_vu IN (0,1,2)),
    PRIMARY KEY(ma_nhom, ten_dang_nhap),
    FOREIGN KEY (ten_dang_nhap) REFERENCES nguoi_dung(ten_dang_nhap),
    FOREIGN KEY (ma_nhom) REFERENCES nhom(ma_nhom)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- 3- Bài đăng trên nhóm
CREATE TABLE post (
    id_post  INT PRIMARY KEY,
    ma_nhom INT NOT NULL,
    nguoi_dang VARCHAR(50) NOT NULL,
    gio_dang TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (nguoi_dang) REFERENCES nguoi_dung(ten_dang_nhap),
    FOREIGN KEY (ma_nhom) REFERENCES nhom(ma_nhom)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE content (
    id_content INT AUTO_INCREMENT PRIMARY KEY,
    id_post  INT  NOT NULL,
    loai_hinh VARCHAR(30) NOT NULL,  --  tiêu đề, nội dung, hình ảnh, tệp
    content TEXT NOT NULL,
    FOREIGN KEY (id_post) REFERENCES post(id_post)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
 

