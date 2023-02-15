<?php $message = !empty($_SESSION['message']) ? $_SESSION['message'] : null; ?>

<?php
if ($message != null): ?>
    <div class="container-message">
    <div class="messages">
    <?php if ($message["type"] == "success") : ?>
    <div class="message bg-msg-success">
    <?php elseif ($message["type"] == "danger") : ?>
    <div class="message bg-msg-error">
    <?php elseif ($message["type"] == "warning") : ?>
    <div class="message bg-msg-warning">
<?php endif; ?>
    <p><?php echo $message["message"]; ?></p>
    <button class="btn-close-message"><i class="bi bi-x-lg"></i></button>
    </div>
    </div>
    </div>
    <?php
    unset($_SESSION['message']);
endif;
?>