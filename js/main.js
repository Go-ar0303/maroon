const myModal = new bootstrap.Modal('#exampleModal', {
    keyboard: false
  })
$('.buy').click(function()
{
    let price = $(this).data('price');
    let product = $(this).data('product');
   
    $('#price').val(price);
    $('#product').val(product);
    $('#exampleModal').modal();

    console.log(price, product, modal);

    return false;
   

});



function init(){
  $.getJSON("json.json", out);
}

function out(data) {
 
  console.log(data);
}
init();