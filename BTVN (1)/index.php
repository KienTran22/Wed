<?php include('header.php'); ?>
<?php include('products.php'); ?>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Quản lý <b>Sản phẩm</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm sản phẩm mới</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="white-space: nowrap;">Tên</th>
                        <th style="text-align: center;">Giá Cả</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td style="white-space: nowrap;"><?= htmlspecialchars($product['name']) ?></td>
                            <td style="text-align: center;"><?= htmlspecialchars($product['price']) ?> VNĐ</td>
                            <td>
                                <a href="#editProductModal" class="edit" data-toggle="modal" data-id="<?= $product['id'] ?>" data-name="<?= htmlspecialchars($product['name']) ?>" data-price="<?= htmlspecialchars($product['price']) ?>"><i class="material-icons" data-toggle="tooltip" title="Chỉnh sửa">&#xE254;</i></a>
                                <a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?= $product['id'] ?>"><i class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<!-- Modal Thêm sản phẩm -->
<div id="addProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="index.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá Cả</label>
                        <input type="text" class="form-control" name="price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="addProduct" class="btn btn-success">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Chỉnh sửa sản phẩm -->
<div id="editProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="index.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Chỉnh sửa sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá Cả</label>
                        <input type="text" class="form-control" name="price" id="edit-price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="editProduct" class="btn btn-info">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Xóa sản phẩm -->
<div id="deleteProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="index.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="delete-id">
                    <p>Bạn có chắc chắn muốn xóa sản phẩm này không?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="deleteProduct" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Khi nhấn vào nút "Chỉnh sửa", đồng bộ dữ liệu vào modal
    $('#editProductModal').on('show.bs.modal', function (e) {
        var productId = $(e.relatedTarget).data('id');
        var productName = $(e.relatedTarget).data('name');
        var productPrice = $(e.relatedTarget).data('price');
        
        // Đặt giá trị vào các input
        $(e.currentTarget).find('#edit-id').val(productId);
        $(e.currentTarget).find('#edit-name').val(productName);
        $(e.currentTarget).find('#edit-price').val(productPrice);
    });

    // Khi nhấn vào nút "Xóa", đồng bộ dữ liệu vào modal
    $('#deleteProductModal').on('show.bs.modal', function (e) {
        var productId = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[name="id"]').val(productId);
    });
</script>