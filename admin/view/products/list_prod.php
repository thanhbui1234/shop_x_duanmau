<div class="mx-4">
    <form action="#" method="post" class="">
        <div class="d-flex flex-row gap-2  ">
            <select name="option" class="form-select form-select-sm form-control w-25 mb-4" id="selectAllprod"
                aria-label="Default select example">
                <option selected>Chức năng</option>
                <option value="public">Public</option>
                <option value="private">Private</option>
                <option value="clone">Tạo bản sao</option>
                <option value="delete">Xóa</option>

            </select>

            <button id="apply_prod" type="submit" name="apply" class="btn btn-google h-25 "> Apply </button>


        </div>
        <table class="table shadow p-3 mb-5 bg-body rounded  table-condensed table-bordered  ">
            <thead class="headTable">
                <tr>
                    <th> <input id="selectAllBoxes" type="checkbox"></th>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Gía</th>
                    <th>Hỉnh ảnh</th>
                    <th>Nội Dung</th>
                    <th>Trạng thái</th>
                    <th>Giảm giá </th>
                    <th>Action </th>

                </tr>

            </thead>
            <tbody>

                <tr>
                    <td><input class="selectAllBoxesChild" name="checkBoxArr[]" value="?>" type="checkbox"> </td>
                    <td> </td>
                    <td> </td>



                    <td> </td>


                    <td> 30000000</td>
                    <td><img width="90" src="/uploads//" alt=""></td>

                    <td class="content"> substr($product['prod_content'], 0, 30) . '.......' ?></td>
                    <td> </td>
                    <td> </td>
                    <td class="action_prod"> <a class="btn btn-success" href="?product=update_product&id=">UPDATE</a>
                        <a class="btn btn-danger" href="?product=deleteProd&id=">DELETE</a>
                    </td>






                </tr>

            </tbody>

        </table>
    </form>

</div>