<?
/**
 * Выход из режима администратора
 */

session_start();
$_SESSION['admin'] = false; 
setcookie('adminExpire', '', time() - 1, '/');
session_write_close();

if (!empty($_SERVER['HTTP_REFERER'])) {
    header('Location: '.$_SERVER['HTTP_REFERER']);
} else {
    header('Location: http://'.$_SERVER['HTTP_HOST']);
}
exit;

?>