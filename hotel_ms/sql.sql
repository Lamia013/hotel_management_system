CREATE TABLE double_ac (
    room_no INT AUTO_INCREMENT PRIMARY KEY,
    holder_name VARCHAR(100),
    holder_id INT,
    holder_email VARCHAR(100),
    holder_mobile VARCHAR(100),
    holder_address VARCHAR(250),
    in_date VARCHAR(100),
    out_date VARCHAR(100),
    status INT,
    price int(100)
);

-- Dumping data for table 'double_ac'
INSERT INTO double_ac (room_no, holder_name, holder_id, holder_email, holder_mobile, holder_address, in_date, out_date, status, price) 
VALUES 
    ('251', 'beth', '545', 'beth@ny.com', '5454', 'dhaka',  '25-06-2024', '29-06-2024', '1', '500'),
    ('252', '', '', '', '', '', '', '', '0', '500'),
    ('253', '', '', '', '', '', '', '', '0', '500'),
    ('254', '', '', '', '', '', '', '', '0', '500');
-- --------------------------------------------------------

-- Table structure for table `double_non_ac`
CREATE TABLE double_non_ac (
    room_no INT AUTO_INCREMENT PRIMARY KEY,
    holder_name VARCHAR(100),
    holder_id INT,
    holder_email VARCHAR(100),
    holder_mobile VARCHAR(100),
    holder_address VARCHAR(250),
    in_date VARCHAR(100),
    out_date VARCHAR(100),
    status INT,
    price int(100)
);

-- Dumping data for table `double_non_ac`
INSERT INTO double_non_ac (room_no, holder_name, holder_id, holder_email, holder_mobile, holder_address, in_date, out_date, status, price) 
VALUES 
    ('201', '', '0', '', '', '', '', '', '0', '350'),
    ('202', '', '0', '', '', '', '', '', '0', '350'),
    ('203', 'Taylor', '74125', 'ts13@autumn.com', '85245698', 'Cornelia Street', '25-05-2023', '30-05-2023', '1', '350'),
    ('204', '', '0', '', '', '', '', '', '0', '350');

-- --------------------------------------------------------

-- Table structure for table `single_ac`
CREATE TABLE single_ac (
    room_no INT AUTO_INCREMENT PRIMARY KEY,
    holder_name VARCHAR(100),
    holder_id INT,
    holder_email VARCHAR(100),
    holder_mobile VARCHAR(100),
    holder_address VARCHAR(250),
    in_date VARCHAR(100),
    out_date VARCHAR(100),
    status INT,
    price int(100)
);

-- Dumping data for table `single_ac`
INSERT INTO single_ac (room_no, holder_name, holder_id, holder_email, holder_mobile, holder_address, in_date, out_date, status, price) 
VALUES 
    ('101', '', '', '', '', '', '', '', '', '250'),
    ('102', 'Justin', '1010', 'j@c.com', '9878451245', 'uttara', '29-09-2024', '30-09-2024', '1', '250'),
    ('103', '', '', '', '', '', '', '', '', '250'),
    ('104', '', '', '', '', '', '', '', '', '250');

-- --------------------------------------------------------
CREATE TABLE single_non_ac (
    room_no INT AUTO_INCREMENT PRIMARY KEY,
    holder_name VARCHAR(100),
    holder_id INT,
    holder_email VARCHAR(100),
    holder_mobile VARCHAR(100),
    holder_address VARCHAR(250),
    in_date VARCHAR(100),
    out_date VARCHAR(100),
    status INT,
    price int(100)
);

INSERT INTO single_non_ac (room_no, holder_name, holder_id, holder_email, holder_mobile, holder_address, in_date, out_date, status, price) 
VALUES 
    ('151', '', '', '', '', '', '', '', '0', '150'),
    ('152', '', '', '', '', '', '', '', '0', '150'),
    ('153', '', '', '', '', '', '', '', '0', '150'),
    ('154', '', '', '', '', '', '', '', '0', '150');

CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT, 
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    gender VARCHAR(10),
    phone VARCHAR(20),
    email VARCHAR(50),
    password varchar(50), 
    sign_in_date timestamp
);
INSERT INTO users (user_id, first_name,last_name,gender,phone,email,password)
VALUES
('22', 'Ms.', 'Faith', 'Female', '013', 'ts@autumn.com', '13'),
('13', 'Talor.', 'Swift', 'Female', '013', 'ts@13.com', '13');

   
CREATE TABLE admin (
  id int(10),
  name varchar(100),
  email varchar(100),
  password varchar(100),
  mobile int(20)
);

INSERT INTO admin (id, name, email, password, mobile) 
VALUES
(1, 'admin', 'admin13@gmail.com', '1234', 77874512);

