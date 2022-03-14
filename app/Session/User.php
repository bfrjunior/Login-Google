<?php

namespace app\Session;

class User{
    /*
    *mÉTODO RESPONSÁVEL POR INICIAR A SESSÃO DENTRO DA APLICAÇÃO
    *@return boolean
    */
    private static function init(){
        return session_status() !== PHP_SESSION_ACTIVE ? session_start() : true;
}
    /*
    *Método responsável por definir a sessão de login do usuário
    *@param string $nome
    *@param strin $email
    */
    public static function login($name,$email){
        //INICIA A SESSÃO DA APLICAÇÃO
        self::init();
        
        //DEFINE A SESSÃO DO USUÁRIO
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email
        ];
    }

    /*
    Método Responsável por Verificar se o usuário está logado
    *@return boolean
    */
    public static function isLogged(){
            //INICIA A SESSÃO DA APLICAÇÃO
            self::init();

            //retorna a existência do indice user na sessão
            return isset($_SESSION['user']);

    }

    /*
    *Método responsavel por retornar as informções guardadas na sessão do usuário
    *@return array
    */ 
    public static function getInfo()
{
      //INICIA A SESSÃO DA APLICAÇÃO
      self::init();

      //retorna os dados da sessão
      return $_SESSION['user'] ?? [];   
}

    public static function logout()
{
    //INICIA A SESSÃO DA APLICAÇÃO
    self::init();

    //remove a sessão do usuário
    unset($_SESSION['user']);

}



}