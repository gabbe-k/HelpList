function onSignIn(googleUser) {
    // Useful data for your client-side scripts:
    $(".g-signin2").fadeOut(0);
    $("#signout-form").fadeIn(200);
    var profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail());

    // The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;


    $.post("./php/func/sessionsetter.php",  {value: id_token, param: "idToken"}, function(data) {
        console.log(data);
    });

    $.post("./php/func/sessionsetter.php",  {value: profile.getName(), param: "userUid"}, function(data) {
        console.log(data);
    });

}

function signOut() {
    //unset sessions!!
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
    });
    $(".g-signin2").fadeIn(200);
    $("#signout-form").fadeOut(0);
    $.post("./php/func/sessionunsetter.php", {});
}

function saveUserData(userData){
    $.post('userData.php', { oauth_provider:'google', userData: JSON.stringify(userData) });
}