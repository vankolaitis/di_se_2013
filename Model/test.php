<?php

require_once("UserModel.php");
require_once("RoleModel.php");
require_once("SaleOrderModel.php");
require_once("SupplyOrderModel.php");
require_once("ProductModel.php");
require_once("ProviderModel.php");
require_once("CustomerModel.php");
require_once("NotificationModel.php");
require_once("WishProductModel.php");

require_once("entities/User.php");
require_once("entities/Role.php");

/*
UserModel::create(new User("alkis1", "111111"));
UserModel::create(new User("alkis2", "222222"));
UserModel::create(new User("alkis3", "333333"));
UserModel::create(new User("alkis4", "444444"));
*/

/*
UserModel::delete('3'); //Work both
UserModel::delete(4);  //


UserModel::update(new User("alkis12", "222222", "alkis@gmail", null, 2));
$user = UserModel::getUsers("1");

echo "<pre>"; print_r($user); echo "</pre>";

$user[0]->password = "999999";

echo "<pre>"; print_r($user); echo "</pre>";
*/
/*
RoleModel::create(new Role("manager", "mpla mpla"));
RoleModel::create(new Role("scheduler", "mpli mpli"));
RoleModel::create(new Role("salesman", "mplo mplo"));
RoleModel::create(new Role("storage", "mple mple"));
*/

//RoleModel::update(new Role("manager", "trollll", 1));

$role = UserModel::getUserById(2);
echo "<pre>"; print_r($role); echo "</pre>";