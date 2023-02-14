<section class="container">

    <?php $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];?>
    <table class="table table-bordered">

        <thead>

            <tr>
                <th>Ten san pham</th>
                <th>Hinh Anh</th>
                <th>So Luong</th>
                <th>Gia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $key => $value) {?>
            <tr>
                <td><?php echo $value['name'] ?></td>
                <td><img width="40" src="/../shop_xx/uploads/<?php echo $value['img'] ?>" alt=""></td>
                <td><?php echo $value['quanlity'] ?></td>
                <td><?php echo $value['price'] ?></td>

            </tr>
            <?php }?>
            <tr>
                <td colspan="3">Tong</td>
                <td colspan="1">1000</td>
            </tr>
        </tbody>



    </table>

</section>