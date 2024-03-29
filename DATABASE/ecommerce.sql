
CREATE TABLE order_management
(
  order_id         INT(11)       NOT NULL AUTO_INCREMENT,
  order_quantity   INT(30)       NOT NULL,
  date             TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  status           VARCHAR(255)  NOT NULL DEFAULT 'to pack',
  shipping_address VARCHAR(255)  NOT NULL,
  payment_method   VARCHAR(255)  NOT NULL DEFAULT 'cash on delivery',
  total_payment    DECIMAL(10,2) NOT NULL,
  product_id       INT(11)       NOT NULL,
  user_id          INT(11)       NOT NULL,
  PRIMARY KEY (order_id)
);

CREATE TABLE product_management
(
  product_id    INT(11)       NOT NULL AUTO_INCREMENT,
  product_name  VARCHAR(255)  NOT NULL,
  description   LONGTEXT      NULL    ,
  product_price DECIMAL(10,2) NOT NULL,
  product_qnty  INT(11)       NOT NULL,
  PRIMARY KEY (product_id)
);

CREATE TABLE shopping_cart
(
  product_id INT(11) NOT NULL,
  user_id    INT(11) NOT NULL,
  quantity   INT(30) NOT NULL
);

CREATE TABLE user_details
(
  user_details_id INT(11)      NOT NULL AUTO_INCREMENT,
  first_name      VARCHAR(255) NOT NULL,
  middle_name     VARCHAR(255) NULL    ,
  last_name       VARCHAR(255) NOT NULL,
  profile_picture VARCHAR(255) NULL    ,
  user_id         INT(11)      NOT NULL,
  PRIMARY KEY (user_details_id)
);

CREATE TABLE users
(
  user_id  INT(11)      NOT NULL AUTO_INCREMENT,
  email    VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  otp      VARCHAR(255) NULL    ,
  role     VARCHAR(255) NOT NULL DEFAULT 'customer',
  PRIMARY KEY (user_id)
);

ALTER TABLE order_management
  ADD CONSTRAINT FK_product_management_TO_order_management
    FOREIGN KEY (product_id)
    REFERENCES product_management (product_id);

ALTER TABLE order_management
  ADD CONSTRAINT FK_users_TO_order_management
    FOREIGN KEY (user_id)
    REFERENCES users (user_id);

ALTER TABLE shopping_cart
  ADD CONSTRAINT FK_product_management_TO_shopping_cart
    FOREIGN KEY (product_id)
    REFERENCES product_management (product_id);

ALTER TABLE shopping_cart
  ADD CONSTRAINT FK_users_TO_shopping_cart
    FOREIGN KEY (user_id)
    REFERENCES users (user_id);

ALTER TABLE user_details
  ADD CONSTRAINT FK_users_TO_user_details
    FOREIGN KEY (user_id)
    REFERENCES users (user_id);
