//According to url and divPanel load the perticular page on (id=alwaysNewRefrshDivId)omHome.php file
$jsUrlDocRootPath = '/omunim/2/include/php/';
function omNavigation(url, divPanel) {
    if (divPanel != '') {
        $("#omHomePageRefreshDiv").hide();
        // alert(divPanel);
        $.ajax({
            type: "GET",
            url: $jsUrlDocRootPath + url + '?' + divPanel,
            success: function (data) {
                // alert("data==>"+data);
                $("#alwaysNewRefrshDivId").html(data);
            }
        });
    }
}

//$(document).ready(function () {
//    Bydefault Load this home page content i.e. home page
$.ajax({
    type: "GET",
    url: $jsUrlDocRootPath + "home/omPageContent.php",
    success: function (data) {
        $("#omHomePageRefreshDiv").html(data);
    }
});
//});
