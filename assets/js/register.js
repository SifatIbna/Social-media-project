$(document).ready(function () {
    //on click sign up , hide login and show sign up

    $("#signup").click(function () {
        $("#first").slideUp("slow",function () {
            $("#second").slideDown("slow");
        });
    });

    //on click login, hide signup and show login

    $("#signin").click(function () {
        $("#second").slideUp("slow",function () {
            $("#first").slideDown("slow");
        });
    });
});