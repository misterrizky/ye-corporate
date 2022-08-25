counter_notif(localStorage.getItem("route_counter_notif"));
// load_notif(localStorage.getItem("route_notification"));
$("#notification").click(function(){
    load_notif(localStorage.getItem("route_notification"));
    load_notif_log(localStorage.getItem("route_notification_log"));
    counter_notif(localStorage.getItem("route_counter_notif"));
});
setInterval(function(){
    counter_notif(localStorage.getItem("route_counter_notif"));
}, 5000);
function counter_notif(url){
    // let data = "view="+ view + "&load_keranjang=";
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function (response){
            if(response.total_notif > 0){
                $('#notification_pulse').addClass('pulse-ring');
                $('#notification_blink').removeClass('d-none');
            }else{
                $('#notification_pulse').removeClass('pulse-ring');
                $('#notification_blink').addClass('d-none');
            }
        }
    });
}

function load_notif(url){
    // let data = "view="+ view + "&load_keranjang=";
    $.get(url,{}, function(result) {
        loaded();
        $('#notification_item').html(result);
    }, "html");
}
function load_notif_log(url){
    // let data = "view="+ view + "&load_keranjang=";
    $.get(url,{}, function(result) {
        loaded();
        $('#notification_log_item').html(result);
    }, "html");
}
