function open_mobile_overlay() {
    document.getElementById("mobile_overlay").style.width = "100%";
    document.getElementsByTagName("body")[0].style.overflow = "hidden";
}

function close_mobile_overlay() {
    document.getElementById("mobile_overlay").style.width = "0%";
    document.getElementsByTagName("body")[0].style.overflow = "auto";
}