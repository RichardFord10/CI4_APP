<h2><?= esc($title) ?></h2>

<?php if (empty($blog) && is_array($blog)): ?>

    <?php foreach ($blog as $b): ?>

        <h3><?= esc($blog['title']) ?></h3>

        <div class="main">
            <?= esc($blog['body']) ?>
        </div>
        <p><a href="/blog<?= esc($blog['slug']) ?>">Viewe</a></p>

    <?php endforeach ?>

<?php else: ?>
 <?php //nothing to show ?>

<?php endif ?>