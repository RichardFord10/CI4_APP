
<?php 

$qty_all = 0;
$total_cost = 0;
foreach($items as $item)
{
    $qty_all += ($item['qty']);
    $total_cost += ($item['cost']);
}




?>
<!-- HTML START -->
<main>
    <div class="container-fluid px-4">
        <br><Br>
        <h1 class="mt-4">Hello, <?php echo(session('first_name'));?>!</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><?php echo(array_sum(array($qty_all))). " TOTAL ITEMS IN INVENTORY";?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right.' TOTAL ITEMS IN INVENTORY'"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Warning Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body"><?php echo(count(($unique_items)))." UNIQUE ITEMS IN INVENTORY"; ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/items">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">$<?php echo(array_sum(array($total_cost + 0))). ": CURRENT INVENTORY VALUE";?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                    </div>
                    <div class="card-body">
                    <canvas id="pie-chart" width="800" height="450"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                    </div>
                    <div class="card-body" id="chart-container">
                        <canvas id="colors-chart">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body table-responsive">
            <?php if (!empty($items) && is_array($items)) : ?>
                <div class="container-fluid">
                    <table id="myTable" class="table table-striped">
                        <thead><th><div class="text-center">
                <a href="/items/create" class="btn btn-success btn-sm">Create New</a>
            </div></th>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Color</th>
                                <th>Category</th>
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
                                        <a class="text-center" href="/items/edit?id=<?php echo ($item['id']); ?>"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a class="text-center" href="/items/delete?id=<?php echo ($item['id']); ?>"><i style="color:red;" class="fas fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
 unique_colors = <?php echo (json_encode($unique_colors));?>;
 unique_items = <?php echo (json_encode($unique_items));?>;
 items_json = <?php echo (json_encode($items_json));?>;



</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/modules/admin/js/AJAX/app.js"></script>

