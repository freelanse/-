<?php
// Устанавливаем время жизни сессии (например, 30 минут)
function auto_logout_after_inactivity() {
    $timeout = 1800; // 1800 секунд = 30 минут
    $t = time();
    
    if (isset($_SESSION['last_action'])) {
        $duration = $t - $_SESSION['last_action'];
        if ($duration > $timeout) {
            wp_logout(); // Выход из системы
            wp_redirect(home_url()); // Перенаправление на главную страницу
            exit;
        }
    }

    $_SESSION['last_action'] = $t; // Обновляем время последней активности
}
add_action('init', 'auto_logout_after_inactivity');
?>
