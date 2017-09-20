<!DOCTYPE html>
<html>
<head>
	<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
	<script>
	  // Initialize Firebase
	  var config = {
	    apiKey: "AIzaSyDBzhDYvKaTzWDEmBNYzrWWTUkSPO0q1VU",
	    authDomain: "codedoct-v1.firebaseapp.com",
	    databaseURL: "https://codedoct-v1.firebaseio.com",
	    projectId: "codedoct-v1",
	    storageBucket: "codedoct-v1.appspot.com",
	    messagingSenderId: "894220783337"
	  };
	  firebase.initializeApp(config);
	</script>

	<title>Experiment Firebase</title>
	<script type="text/javascript">
		window.onload = function () { 
			var user = userShow();
			if (user) {
				loadMessage();
				alert('Welcome '+user.displayName+'!');
			}
		}

		function login() {
			var provider = new firebase.auth.GoogleAuthProvider();
			firebase.auth().signInWithPopup(provider).then(function(result) {
			  console.log("login");
			}).catch(function(error) {
			  // Handle Errors here.
			  var errorCode = error.code;
			  var errorMessage = error.message;
			  // The email of the user's account used.
			  var email = error.email;
			  // The firebase.auth.AuthCredential type that was used.
			  var credential = error.credential;
			  // ...
			});
		}

		function userShow() {
			var auth = localStorage['firebase:authUser:'+config.apiKey+':[DEFAULT]'] ? localStorage['firebase:authUser:'+config.apiKey+':[DEFAULT]'] : null;
			if (auth) {
				var result = JSON.parse(auth);
				console.log(result.displayName);
				return result;
			} else {
				alert('Please login first.');
			}
		}

		function logout() {
			firebase.auth().signOut().then(function() {
			  // Sign-out successful.
			  console.log("logout");
			}).catch(function(error) {
			  // An error happened.
			});
		}

		function sendMessage() {
			var messageContent = document.getElementById('message').value;
			var user = userShow();

			if (user) {
				var data = {
					name:user.displayName,
					message:messageContent
				};
				// console.log(message);
				var firebaseRef = firebase.database().ref('messages');
				firebaseRef.push(data);
				document.getElementById('message').value = '';
			}
		}

		function loadMessage() {
			var dataMessages = firebase.database().ref('messages').limitToLast(5);
			dataMessages.on('value', function(messages) {
			  	var messagesList = document.getElementById('messages-list');
			  	var boxChat = document.getElementById('box-chat');

			   	if (messages.val()) {
					messagesList.parentNode.removeChild(messagesList);
					boxChat.innerHTML = boxChat.innerHTML + '<div id="messages-list"></div>';
					var messagesList = document.getElementById('messages-list');
				  	for (var message in messages.val()) {
						messagesList.innerHTML = messagesList.innerHTML + "<p>" + messages.val()[message].name + " || " + messages.val()[message].message + "</p>"; 
					}
			   	} else {
			   		console.log('data not found');
			   	}
			});
		}
	</script>
</head>
<body>
	<button type="button" onclick="login()">Login</button> || <button type="button" onclick="userShow()">User</button> || <button type="button" onclick="logout()">Logout</button>
	<br><br>
	<div id="box-chat">
		<div id="messages-list"></div>
	</div>
	<textarea placeholder="Write the message" id="message"></textarea>
	<button type="submit" onclick="sendMessage()">Send</button>
</body>
</html>