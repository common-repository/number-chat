jQuery(document).ready(function($){
    jQuery(document).on("click", "#send-it", function() {
        // alert('fgfgfg');
    var a = document.getElementById("chat-input");

    if ("" != a.value) {
        var b = $("#get-number").text(),
            c = document.getElementById("chat-input").value,
            d = "https://web.whatsapp.com/send",
            e = b,
            f = "&text=" + c;
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) var d = "whatsapp://send";
        var g = d + "?phone=" + e + f;
        window.open(g, '_blank')
    }
}), 
    jQuery(document).on("click", ".informasi", function() {
    document.getElementById("get-number").innerHTML = $(this).children(".my-number").text(), 
    $(".start-chat,.get-new").addClass("show").removeClass("hide"), 
    $(".home-chat,.head-home").addClass("hide").removeClass("show"), 
    document.getElementById("get-nama").innerHTML = $(this).children(".info-chat").children(".chat-nama").text(), 
    document.getElementById("get-label").innerHTML = $(this).children(".info-chat").children(".chat-label").text()
}), 
    jQuery(document).on("click", ".close-chat", function() {
    jQuery("#whatsapp-chat").addClass("hide").removeClass("show")
}), 
    jQuery(document).on("click", ".blantershow-chat", function() {
    jQuery("#whatsapp-chat").addClass("show").removeClass("hide")
});
     jQuery(document).on("click", "#back_arrow", function() {
     //jQuery("#whatsapp-chat").addClass("home-chat").removeClass("show")
     $(".start-chat").hide();
     $(".home-chat").show();
     $("#whatsapp-chat").removeClass("active-back-btn");
     //alert('yess');informasi
});
jQuery(document).on("click", ".informasi", function() {
     //jQuery("#whatsapp-chat").addClass("home-chat").removeClass("show")
     $(".start-chat").show();
     $("#whatsapp-chat").addClass("active-back-btn");
     $(".home-chat").hide();
     //alert('yess');informasi
});
});


//back_arrow