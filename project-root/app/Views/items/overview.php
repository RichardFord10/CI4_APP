<main>
    <hr>
    <div class="container-fluid">
        <h3>Items Overview:</h2>
            <div class="text-center">
                <a href="create" class="btn btn-success btn-sm">Create New</a>
            </div>

            <hr>
            <?php if (!empty($items) && is_array($items)) : ?>
                <div class="container-fluid px-4">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Color</th>
                                <th>Category</th>
                                <th>Row</th>
                                <th>Shelf</th>
                                <th>Slot</th>
                                <th>Edit </th>
                                <th>Delete </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Color</th>
                                <th>Category</th>
                                <th>Row</th>
                                <th>Shelf</th>
                                <th>Slot</th>
                                <th>Edit </th>
                                <th>Delete </th>
                            </tr>
                        </tfoot>
                        <tbody>
                
                            <?php foreach ($items as $item) : ?>
                                <tr>
                                    <td>
                                        <?php echo ($item['id']); ?>
                                    </td>
                                    <td>
                                        <?php echo (ucfirst($item['name'])); ?>
                                    </td>
                                    <td>
                                        <?php echo ($item['qty']); ?>
                                    </td>
                                    <td>
                                        <?php echo ("$" . $item['cost'] / 100); ?>
                                    </td>
                                    <td>
                                        <?php echo ("$" . $item['price'] / 100); ?>
                                    </td>
                                    <td>
                                        <?php echo (!empty($item['color'])) ?  ucfirst($item['color']) : $item['color']; ?>
                                    </td>
                                    <td>
                                        <?php echo (ucfirst($item['category'])); ?>
                                    </td>
                                    <td>
                                        <?php echo (ucfirst($item['row'])); ?>
                                    </td>
                                    <td>
                                        <?php echo (ucfirst($item['shelf'])); ?>
                                    </td>
                                    <td>
                                        <?php echo (ucfirst($item['slot'])); ?>
                                    </td>
                                    <td>
                                        <a class="text-center" href="/items/edit?id=<?php echo ($item['id']); ?>"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a class="text-center" href="/items/delete?id=<?php echo ($item['id']); ?>"><i style="color:red;" class="fas fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                            </div>

</main>

<?php else : ?>

<h3>No items</h3>

<p>Unable to find any items for you.</p>

<?php endif ?>
