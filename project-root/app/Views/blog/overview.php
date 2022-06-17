<?php if (!empty($blogs) && is_array($blogs)) : ?>
    <?php foreach ($blogs as $blog) : ?>
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-3"><?= esc($blog['title']) ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    <li class="breadcrumb-item active"><?= esc($blog['title']) ?></li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="mb-0">
                            <?= esc($blog['body']) ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        </main>



    <?php else : ?>

        <h3>No News</h3>

        <p>Unable to find any news for you.</p>

    <?php endif ?>