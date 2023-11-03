<?php
// Подключаем WordPress
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем, был ли отмечен чекбокс
    if (isset($_POST['policy']) && $_POST['policy'] === 'on') {
        // Получаем введенный email
        $email = sanitize_email($_POST['email']);

        // Проверяем, что email не пустой и соответствует формату
        if (!empty($email) && is_email($email)) {
            // Добавляем email в базу данных
            global $wpdb;
            $table_name = $wpdb->prefix . 'custom_emails'; // Замените 'custom_emails' на имя вашей таблицы
            $data = array('email' => $email);
            $format = array('%s');
            $wpdb->insert($table_name, $data, $format);

            // Выводим сообщение об успешной регистрации
            echo 'Email успешно зарегистрирован.';
        } else {
            echo 'Пожалуйста, введите корректный email.';
        }
    } else {
        echo 'Пожалуйста, примите политику.';
    }
}
?>
