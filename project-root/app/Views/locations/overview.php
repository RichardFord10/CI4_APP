<main>
    <hr>
    <div class="container-fluid">
        <h3>Locations Overview:</h2>
            <div class="text-center">
                <a href="/locations/create" class="btn btn-success btn-sm">Create New</a>
            </div>
            <hr>
            <?php if (!empty($locations) && is_array($locations)) : ?>
                <div class="container-fluid px-4">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Row</th>
                                <th>Shelf</th>
                                <th>Slot</th>
                                <th><strong>Edit</strong></th>
                                <th><strong>Delete</strong></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Row</th>
                                <th>Shelf</th>
                                <th>Slot</th>
                                <th><strong>Edit</strong></th>
                                <th><strong>Delete</strong></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($locations as $location) : ?>
                                <tr>
                                    <td>
                                        <?php echo ($location['row']); ?>
                                    </td>
                                    <td>
                                        <?php echo (ucfirst($location['shelf'])); ?>
                                    </td>
                                    <td>
                                        <?php echo ($location['slot']); ?>
                                    </td>
                                    <td>
                                        <a class="text-center" href="/locations/edit?id=<?php echo ($location['row']); ?>"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a class="text-center" href="/locations/delete?id=<?php echo ($location['row']); ?>"><i style="color:red;" class="fas fa-trash"></i></a>

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