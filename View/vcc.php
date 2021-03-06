<?php
session_start() ;
require "Controller/UserController.php" ;
require "Controller/ProductController.php" ;
require "Controller/CustomerController.php" ;
require "Controller/ProviderController.php" ;
require_once 'Model/entities/Product.php';
require_once 'Model/entities/Customer.php';
require_once 'Model/entities/Provider.php';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//------------------------------USERS-----------------------------------------------------------------------//
function login($username, $password)
{
	$user = UserController::login($username, $password) ;
	if($user == -1)
	{
		return -1 ;
	}
	else
	{
		$_SESSION['username'] = $user->username ;
		$_SESSION['email'] = $user->email ;
		$roles = $user->roles ;
		$i = 0 ;
		foreach($roles as $role)
		{
			$_SESSION['roles'][$i] = $role->type ;
			$i ++ ;
		}
		header("Location: ./index.php") ;
	}
}

function get_users()
{
	return UserController::viewAll() ;
}

function get_user($username)
{
	return UserController::viewByUsername($username) ;
}

function add_user($username, $password, $email, $role)
{
	$user = new User($username, $password, $email, Null) ;
	$roles = UserController::viewRoles() ;
	foreach($roles as $r)
	{
		if($r->type == $role)
		{
			$user->roles = array($r) ;
		}
	}
	UserController::create($user) ;
}

function edit_user($username, $password, $email, $role)
{
	$user = UserController::viewByUsername($username) ;
	$id = $user->idUser ;
	$user = new User($username, $password, $email, Null, $id) ;
	$roles = UserController::viewRoles() ;
	foreach($roles as $r)
	{
		if($r->type == $role)
		{
			$user->roles = array($r) ;
		}
	}
	UserController::update($user) ;
}

function delete_user($id)
{
	UserController::delete($id) ;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//------------------------------------PRODUCTS------------------------------------------------------------------------//

function get_products()
{
	return ProductController::viewAll() ;
}

function create_product($sku, $description, $priceSupply, $priceSale, $criticalSum)
{
	$prod = new Product($sku, $description, $priceSale, $priceSupply, 0, 0, 0, $criticalSum, NULL) ;
	ProductController::create($prod) ;
}

function edit_product($sku, $description, $priceSale, $priceSupply, $availableSum, $criticalSum)
{
	$product = ProductController::viewBySku($sku) ;
	$product->description = $description ;
	$product->priceSale = $priceSale ;
	$product->priceSupply = $priceSupply ;
	$product->availableSum = $availableSum ;
	$product->criticalSum = $criticalSum ;
	ProductController::update($product) ;
}

function delete_product($id)
{
	ProductController::delete($id) ;
}

function search_products($key)
{
	$products = ProductController::viewAll() ;
	$i = 0 ;
	foreach($products as $prod)
	{
		if(stripos(strtoupper($prod->sku), strtoupper($key)) !== false || stripos(strtoupper($prod->description), strtoupper($key)) !== false)
		{
			$my_products[$i] = $prod ;
			$i++ ;
		}
	}
	return $my_products ;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//-----------------------------Customers----------------------------------------------------------------------------//

function create_customer($name, $surname, $ssn, $phone, $cellphone, $email, $address, $city, $zipCode)
{
	$c = new Customer($name, $surname, $ssn, $phone, $cellphone, $email, $address, $zipCode, $city) ;
	CustomerController::create($c) ;
}

function get_customers()
{
	return CustomerController::viewAll() ;
}

function delete_customer($id)
{
	CustomerController::delete($id) ;
}

function edit_customer($id, $name, $surname, $ssn, $phone, $cellphone, $email, $address, $city, $zipCode)
{
	$c = CustomerController::viewById($id) ;
	$c->name = $name ;
	$c->surname = $surname ;
	$c->ssn = $ssn ;
	$c->phone = $phone ;
	$c->cellphone = $cellphone ;
	$c->email = $email ;
	$c->address = $address ;
	$c->city = $city ;
	$c->zipCode = $zipCode ;
	CustomerController::update($c) ;
}

function search_customers($key)
{
	$customers = CustomerController::viewAll() ;
	$i = 0 ;
	foreach($customers as $c)
	{
		if(stripos(strtoupper($c->name), strtoupper($key)) !== false || stripos(strtoupper($c->surname), strtoupper($key)) !== false || stripos(strtoupper($c->ssn), strtoupper($key)) !== false)
		{
			$my_customers[$i] = $c ;
			$i ++ ;
		}
	}
	return $my_customers ;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//----------------------Providers--------------------------------------------------------------------------------------------------//

function create_provider($name, $surname, $ssn, $phone, $cellphone, $email, $address, $city, $zipCode)
{
	$c = new Provider($name, $surname, $ssn, $phone, $cellphone, $email, $address, $zipCode, $city) ;
	ProviderController::create($c) ;
}

function get_providers()
{
	return ProviderController::viewAll() ;
}

function delete_provider($id)
{
	ProviderController::delete($id) ;
}

function edit_provider($id, $name, $surname, $ssn, $phone, $cellphone, $email, $address, $city, $zipCode)
{
	$c = ProviderController::viewById($id) ;
	$c->name = $name ;
	$c->surname = $surname ;
	$c->ssn = $ssn ;
	$c->phone = $phone ;
	$c->cellphone = $cellphone ;
	$c->email = $email ;
	$c->address = $address ;
	$c->city = $city ;
	$c->zipCode = $zipCode ;
	ProviderController::update($c) ;
}

function search_providers($key)
{
	$providers = ProviderController::viewAll() ;
	$i = 0 ;
	foreach($providers as $c)
	{
		if(stripos(strtoupper($c->name), strtoupper($key)) !== false || stripos($c->surname, strtoupper($key)) !== false || stripos($c->ssn, strtoupper($key)) !== false)
		{
			$my_providers[$i] = $c ;
			$i ++ ;
		}
	}
	return $my_providers ;
}












?>
