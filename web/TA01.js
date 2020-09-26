function buttonClicked() {
    alert("Clicked")
}
function changeColor() {

    $("#div1").css("background-color",$("#color").value) ;
}
var hidden = false;
function fade() {
    let div3 = $("#div3");
    if (div3.is(":hidden")) {
        div3.show(1500);
    } else {
        div3.hide(1500);
    }
}
