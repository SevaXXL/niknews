<?
/**
 * Проверка логина и пароля и создание куки
 */

if ($_POST) {
    if ($GLOBALS['_CONFIG']['ADMIN']['USER'] === $_POST['username'] && $GLOBALS['_CONFIG']['ADMIN']['PASS'] === $_POST['password']) {
        if ($_POST['remember']) {
            // Cookie для длительного пользования
            setcookie('adminExpire', md5($_POST['username'].$GLOBALS['_CONFIG']['ADMIN']['SALT'].$_POST['password']), time() + $GLOBALS['_CONFIG']['ADMIN']['SESSION_EXPIRE'], '/');
        } else {
            // Cookie для разового входа
            setcookie('adminExpire', md5($GLOBALS['_CONFIG']['ADMIN']['SALT']), time() + $GLOBALS['_CONFIG']['ADMIN']['SESSION_EXPIRE'], '/');
            session_start();
            $_SESSION['admin'] = true;
            session_write_close();
        }
        header('Location: http://'.$_SERVER['HTTP_HOST']);
    } else {
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/login/#error');
    }
    exit;
}