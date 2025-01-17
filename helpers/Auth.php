<?php

class Auth
{

    public $redireccion;
    public $sessionName;
    public $mensaje;

    public function __construct($sessionName, $redireccion = '../index.php', $ifExistSession = false, $mensaje = 'Debe iniciar sesion, ve que ute es palomo')
    {

        session_start();

        if ($ifExistSession == false) {
            if (isset($_SESSION[$sessionName])) {

                if ($_SESSION[$sessionName] == null) {

                    $_SESSION['messageAuth'] = $mensaje;
                    header('Location: ' . $redireccion);
                    exit();

                }

            } else {

                $_SESSION['messageAuth'] = $mensaje;
                header('Location: ' . $redireccion);
                exit();
            }

        } else {

            if (isset($_SESSION[$sessionName]) || empty($sessionName)) {

                $_SESSION['messageAuth'] = $mensaje;
                header('Location: ' . $redireccion);
                exit();
            }

        }

    }
}
