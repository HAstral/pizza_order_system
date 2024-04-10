$(document).ready(function(){
    $('.btn-plus').click(function(){
        $parentNode=$(this).parents('tr');
        // $price=$parentNode.find('#price').val();
        $price=Number($parentNode.find('#price').text().replace("Kyats",""));
        $qty=Number($parentNode.find('#qty').val());
        $total=$price*$qty;
        $parentNode.find('#total').html(`${$total} Kyats`);
        summaryCalculation();
    })

    $('.btn-minus').click(function(){
        $parentNode=$(this).parents('tr');
        // $price=$parentNode.find('#price').val();
        $price=Number($parentNode.find('#price').text().replace("Kyats",""));
        $qty=Number($parentNode.find('#qty').val());
        $total=$price*$qty;
        $parentNode.find('#total').html(`${$total} Kyats`);
         summaryCalculation();
    })
    $('.btnRemove').click(function(){
        $parentNode=$(this).parents('tr');
        $productId=$parentNode.find(".productId").val();
        $parentNode.remove();
       summaryCalculation();
    })
    function summaryCalculation(){
        $totalPrice=0;
        $('#dataTable tbody tr').each(function(index,row){
            $totalPrice+=Number($(row).find('#total').text().replace("Kyats",""));

        });
        $('#subTotalPrice').html(`${$total} Kyats`);
        $('#finalPrice').html(`${$totalPrice+3000} Kyats`);
    }

    })
