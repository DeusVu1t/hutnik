<?php
/**
 * Template Name: Admin page, on page szablon
 * Template Post Type: page
 */

get_header();

// Проверяем, является ли текущий пользователь администратором
if (current_user_can('administrator')) :
?>

    <h2>Delete Email</h2>

 
    <form id="delete-email-form">
    <label for="email-id">Email ID to Delete:</label>
    <input type="text" id="email-id" name="email_id">
    <button type="button" id="delete-email-button">Delete Email</button>
    <a href="<?php echo esc_url(admin_url('admin-post.php?action=download_custom_emails')); ?>" class="download-link">Pobierz plik z e-mail</a>
    <div id="delete-email-result"></div>
</form>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteEmailButton = document.getElementById('delete-email-button');
            const emailIdInput = document.getElementById('email-id');
            const deleteEmailResult = document.getElementById('delete-email-result');

            deleteEmailButton.addEventListener('click', function () {
                const emailId = emailIdInput.value;

                // Отправляем AJAX-запрос для удаления email
                fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=delete_email&email_id=${emailId}`,
                })
                    .then(response => response.text())
                    .then(data => {
                        deleteEmailResult.innerHTML = data;
                        emailIdInput.value = ''; // Очищаем поле ввода
                    });
            });
        });
    </script>

<?php
endif;

get_footer();
?>
