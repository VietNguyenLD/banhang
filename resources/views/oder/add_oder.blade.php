@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Oder</div>                    
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead class="thead-dark">
                            <tr>
                              <th scope="col">STT</th>
                              <th scope="col">Mã Sản Phẩm</th>
                              <th scope="col">Tên Sản Phẩm</th>
                              <th scope="col">Giá Thành</th>
                              <th scope="col">Số Lượng</th>
                              <th scope="col">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody id='tbody'>
                            
                        </tbody>
                        <tfooter>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td id ='total'></td>
                        </tfooter>
                    </table>
                </div>
                <div class="card-footer">
                    <button id ='order-create' class='btn btn-primary container-fluid'>Tạo đơn hàng</button>
                </div>
            </div>  
            <br><br>
        </div>
        <br><br>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Thêm Đơn Hàng</div>
                <div class="card-body">
                    Mã SP
                    <input id = 'product_code' class='class1'>
                    Tên SP
                    <input id = 'name' readonly class='class1'>
                    Giá 
                    <input id = 'price' readonly class='class1' >
                    Số Lượng
                    <input id = 'soluongnv' class='class1'><br><br>
                    <button id = 'add_product' class="btn btn-primary container-fluid">Nhập</button>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script>
    var soluong = 0;
    var total = 0;
    var i = 0;
    $(document).ready(function(){
        $('#product_code').on('keypress',function(e){
            if(e.which == 13){
                let pc = $('#product_code').val();
                $.ajax({
                    url : '/checkproduct',//duong dan
                    type: 'GET',  // http method
                    data: {product_code:pc},  // data to submit
                    success: function (data) {
                        $('#name').val(data.product_name);
                        $('#price').val(data.product_price);
                        //soluong la bien toan cuc khai bao o ngoai
                        soluong = data.product_sl ? data.product_sl : 0;
                        // cau o tren tuong duong voi menh de if o duoi
                        // if(data.soluong != null) {
                        //     soluong = data.soluong;
                        // }else {
                        //     soluong = 0;
                        // }
                    },
                    error: function (data) {
                        //goi ajax that bai
                            alert('error');
                    }   
                });
            }
        });
        $('#add_product').click(function(){
            let soluongnv = $('#soluongnv').val();
            // console.log(soluongnv);
            if(soluongnv > soluong){
                alert('Hang khong du');
                return false;
            }
            let product_code = $('#product_code').val();
            let name = $('#name').val();
            // console.log(name);
            let price = $('#price').val();
            // console.log(price);
            
            let chuoi = $('#tbody').html();
            chuoi += "<tr>";
            chuoi += "<th class='row'>" + i++ + "</th>"
            chuoi += "<td>" + product_code + "</td>"
            chuoi += "<td>" + name + "</td>"
            chuoi += "<td>" + price + "</td>"
            chuoi += "<td>" + soluongnv + "</td>"
            chuoi += "<td>" + soluongnv*price + "</td>"
            chuoi += "</tr>"
            total +=price*soluong;
            $('#total').html(total);
            $('#tbody').html(chuoi);  
            
        });
        $('#order-create').click(function(){
            var data = [];
            var pre = $('#tbody tr');
            for(let i = 0;i<pre.length;i++){
                let product_code = $('#tbody tr').eq(i).find('td').eq(0).html();
                let name = $('#tbody tr').eq(i).find('td').eq(1).html();
                let price = $('#tbody tr').eq(i).find('td').eq(2).html();
                let soluong = $('#tbody tr').eq(i).find('td').eq(3).html();
                data.push({product_code:product_code,name:name,price:price,soluong:soluong});
            }
            console.log(data);
            
            let CRSF = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                url : '/add-order',//duong dan
                type: 'POST',  // http method
                data: {data:data,phone:'67655477723',nguoimuahang:'Anh A',money:total},  // data to submit
                success: function (data) {
                    
                },
                error: function (data) {
                    //goi ajax that bai
                        alert('error');
                }
            });
        });
    })
</script>
@endsection
