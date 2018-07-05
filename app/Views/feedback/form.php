
<?php if (isset($errors) && !empty($errors)) : ?>
    <div style="background: indianred;">
        <?php foreach ($errors as $error) : ?>
            <div><?=$error?></div>
        <?php endforeach;?>
    </div>
<?php endif; ?>

<form action="/feedback" method="POST">
    <label for="name">Имя</label>
    <input name="name" required />
    <br />
    <label for="email">Email</label>
    <input name="email" required />
    <br />
    <label for="text">Текст сообщения</label>
    <textarea name="text" required></textarea>
    <br />
    <input type="submit" />
</form>
