
function onSignIn(googleUser) {
    // Useful data for your client-side scripts:
    $(".g-signin2").fadeOut(0);
    $("#signout-form").fadeIn(0);
    var profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail());

    //CHECK IF TEACHER
    var email = profile.getEmail();
    var patt = new RegExp("@ga.lbs.se");
    var res = patt.test(email);

    if (res) {
        console.log("Teacher mode");
        $.post("./php/func/sessionsetter.php", { value: 1, param: "isTeachr" }, function (data) {
        });
    }

    //PUT PROFILE IN DATABASE
    if(profile) {

        var id = profile.getId();

        $.post('../php/auth/savedata.php', {
            id: id, name: profile.getName(), email: profile.getEmail(), isteacher: false
        }).done(function (data) {
            console.log(data);
        });

    }  



    // The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;

    $.post("./php/func/sessionsetter.php",  {value: id_token, param: "idToken"}, function(data) {
    });

    $.post("./php/func/sessionsetter.php",  {value: profile.getName(), param: "uId"}, function(data) {
    });

}

function signOut() {

    var id_token;

    $.post("./php/auth/signout.php",  {param: "idToken", value: id_token}, function(data) {
    });

    $.post("../php/auth/signout.php",  {value: id_token, param: "idToken"}, function(data) {
    });

    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
    });
    $(".g-signin2").fadeIn(0);
    $("#signout-form").fadeOut(0);
    $.post("./php/func/sessionunsetter.php", {});

}

function saveUserData(userData){
    $.post('userData.php', { oauth_provider:'google', userData: JSON.stringify(userData) });
}
