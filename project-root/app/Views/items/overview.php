<main>
    <br>
    <div class="text-center"><a href="create" class="btn btn-success btn-sm">Create New</a></div>
    <br>
    <?php if (!empty($items) && is_array($items)) : ?>
        <div class="container-fluid px-4">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Category</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($items as $item) : ?>
                        <tr>
                            <td>
                                <?php echo ($item['id']); ?>
                            </td>
                            <td>
                                <?php echo ($item['name']); ?>
                            </td>
                            <td>
                                <?php echo ($item['qty']); ?>
                            </td>
                            <td>
                                <?php echo ($item['cost']); ?>
                            </td>
                            <td>
                                <?php echo ($item['price']); ?>
                            </td>
                            <td>
                                <?php echo ($item['category']); ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

</main>



<?php else : ?>

    <h3>No items</h3>

    <p>Unable to find any items for you.</p>

<?php endif ?>