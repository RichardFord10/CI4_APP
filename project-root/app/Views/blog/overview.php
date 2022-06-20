<?php if (!empty($blogs) && is_array($blogs)) : ?>
    <?php foreach ($blogs as $blog) : ?>
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-3"><?= esc($blog['title']) ?></h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/blog/edit?id=<?php echo($blog['id']);?>">Edit</a></li>
                    <li class="breadcrumb-item active"><strong>Author:</strong> <?= esc($blog['author'])?></li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="mb-0">
                            <?= esc($blog['body'])?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        </main>



    <?php else : ?>

        <h3>No Blogs</h3>

        <p>Unable to find any blogs for you.</p>

    <?php endif ?>