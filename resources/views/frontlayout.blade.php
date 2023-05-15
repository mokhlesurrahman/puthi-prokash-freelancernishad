<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="content-language" content="en">
  <meta name="keywords" content="website, blog, foo, bar">
  <meta name="author" content="John Doe">
  <meta name="publisher" content="John Doe">
  <meta name="copyright" content="John Doe">
  <meta name="description" content="This short description describes my website.">
  <meta name="page-topic" content="Media">
  <meta name="page-type" content="Blogging">
  <meta name="audience" content="Everyone">
  <meta name="robots" content="index, follow">

  <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>:: Welcome to Sechsheba Tetulia ::</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/bangladesh-govt.png') }}" />
    <!-- <link href="https://kit-pro.fontawesome.com/releases/v5.15.2/css/pro.min.css" rel="stylesheet" onload="if(media!=='all')media='all'"> -->
    <!-- CSS only -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pro.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css?ver=1.0.0') }}">


    <script type="text/javascript" src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>

<meta name="csrf-token"             ="{{ csrf_token() }}" />
	<link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">

<style>
*{
    --defaultColor: green;
}

</style>


</head>

<body style="font-family: 'Kalpurush', sans-serif;">


    <div id="app">

        @php
        if(Auth::user()){

            $users = Auth::user();
        }else{
            $users = [];
        }

       @endphp


        <component :is="$route.meta.layout || 'div'"  :user="{{$users}}"  >
            <router-view />
          </component>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>





    <script src="{{ asset('js/frontend.js?ver=1.0.9') }}" async ></script>

<script>


if ("{{ Auth::user() }}") {
    const storeToken = localStorage.getItem('token');


    if(!storeToken){

        let data = {'_token': "{{ csrf_token() }}"};
        fetch("/logout", {
        method: "POST",
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
        }).then(res => {

        });


    }


}else{
    // User.loggedOut()



		localStorage.removeItem('token')
		localStorage.removeItem('user')
		localStorage.removeItem('userid')
		localStorage.removeItem('role')
		localStorage.removeItem('position')




}

</script>



{{--


<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>
<script  type="text/javascript">
    var firebaseConfig = {
    apiKey: "AIzaSyD_k0gk3nJNbiZm3xF4wSD1nMIT5jBDzDE",
    authDomain: "webpush2-cc9ed.firebaseapp.com",
    projectId: "webpush2-cc9ed",
    storageBucket: "webpush2-cc9ed.appspot.com",
    messagingSenderId: "16480631991",
    appId: "1:16480631991:web:db0e4adbad0ce8e475e132",
    measurementId: "G-DS86HSG4Y5"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging=firebase.messaging();

    function IntitalizeFireBaseMessaging() {
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification Permission");

                return messaging.getToken();
            })
            .then(function (token) {
                console.log("Token : "+token);


			var myHeaders = new Headers();
			var requestOptions = {
			  method: 'GET',
			  headers: myHeaders,
			  redirect: 'follow'
			};
            // console.log(window.location.origin)
            var orgin = window.location.origin;
			fetch(orgin+"/api/set/notification?key="+token, requestOptions)
			  .then(response => response.text())
			  .then(result => console.log(result))
			  .catch(error => console.log('error', error));


               // document.getElementById("token").innerHTML=token;
            })
            .catch(function (reason) {
                console.log(reason);
            });
    }

    messaging.onMessage(function (payload) {
        console.log(payload);
        const notificationOption={
            body:payload.notification.body,
            icon:payload.notification.icon
        };

        if(Notification.permission==="granted"){
            var notification=new Notification(payload.notification.title,notificationOption);

            notification.onclick=function (ev) {
                ev.preventDefault();
                window.open(payload.notification.click_action,'_blank');
                notification.close();
            }
        }

    });
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newtoken) {
                console.log("New Token : "+ newtoken);
            })
            .catch(function (reason) {
                console.log(reason);
				//alert(reason);
            })
    })
    IntitalizeFireBaseMessaging();
</script>
 --}}





</body>
</html>