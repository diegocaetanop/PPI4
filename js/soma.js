function soma(){
    var result=$('input:checked');
    var total=$('#base').text();
    var total=parseFloat(total);
    for(var i=0; i<result.length;i++){
        total=total+parseFloat(result[i].value);
    }
    $("#result").text(total.toFixed(2));
}
soma();
$(":checkbox").click(soma);