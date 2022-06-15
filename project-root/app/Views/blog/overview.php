<h2><?= esc($title) ?></h2>

<?php if (!empty($blogs) && is_array($blogs)): ?>

    <?php foreach ($blogs as $blog): ?>

        <h3><?= esc($blog['title']) ?></h3>

        <div class="main">
            <?= esc($blog['body']) ?>
        </div>
        <p><a href="/blog/<?= esc($blog['slug'], 'url') ?>">View article</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>