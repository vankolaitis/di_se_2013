<?php

require_once 'Controller.php';
require_once 'Model/UserModel.php';
require_once 'Model/RoleModel.php';
/**
 * Controller for users
 */
 class UserController extends Controller
 {
 	public function __construct()
 	{
 		# code...
 	}

 	public function login($username='', $password='')
 	{
 		$user = UserController::viewByUsername($username);

 		if (!is_null($user))
 		{
 			if ($user->password == $password)
 			{
 				return $user;
 			}
 		}
 		return -1;
 	}

 	public function logout($username='')
 	{
 		return 0;
 	}

 	public function create($user='')
 	{
 		try 
 		{
 			return UserModel::create($user);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function update($newUser='')
 	{
 		try 
 		{
	 		return UserModel::update($newUser);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function delete($idUser='')
 	{
 		try 
 		{
	 		return UserModel::delete($idUser);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public static function viewAll()
 	{
 		return UserModel::getUsers();
 	}

 	public static function viewById($idUser='')
 	{
 		$users = UserModel::getUsers();

 		if (is_array($users)) 
 		{
 			foreach ($users as &$value) 
 			{
 				if ($value->idUser == $idUser)
 				{
 					return $value;
 				}
 			}
 		}
 		return null;
 	}

 	public static function viewByUsername($username='')
 	{
 		$users = UserModel::getUsers();

 		if (is_array($users)) 
 		{
 			foreach ($users as &$value) 
 			{
 				if ($value->username == $username)
 				{
 					return $value;
 				}
 			}
 		}
 		return null;
 	} 	

 	public static function viewRoles()
 	{
 		return RoleModel::getRoles();
 	}
 }
