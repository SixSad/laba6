<?php

require_once 'dbconnect.php';
require_once 'Src\Session.php';

class Auth
{
    public static function login($login,$password,$sqlData): string
    {
        $query = "SELECT * FROM `users` WHERE `login` = '$login'";
        $res = mysqli_query($sqlData, $query);
        $zxc = mysqli_fetch_assoc($res);
        if($zxc['password']=$password){
            Session::set('id',$zxc['id']);
            return "Вы успешно авторизировались";
        }
        return "Проверьте логин и пароль";
    }

    static public function register($login,$password,$sqlData):string
    {
        if(!empty($password)&&!empty($login)){
            $query = "INSERT INTO `users`(`login`, `password`) VALUES ('$login','$password')";
            Query::sqlError($sqlData, $query);
        }
    }

    public static function user()
    {
        $id = Session::get('id') ?? 0;

    }

    public static function logout(): bool
    {
        Session::clear('id');
        return true;
    }


}