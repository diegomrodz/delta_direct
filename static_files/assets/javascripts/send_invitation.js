$(document).ready(function () {

	function getTicket(email, userType) {
		return email + "-" + userType;
	};

	function createMessage() {
		var email = $("#userEmail")[0].value;
		var userType = $("#userType")[0].value;

		$("#invitationTicket").text(getTicket(email, userType));
	};

	function sendMessage() {
		var name = $("#userName")[0].value;
		var email = $("#userEmail")[0].value;
		var userType = $("#userType")[0].value;
		var token = $("#_token")[0].value;

		$.post("/admin/send_invitation", {
			name: name,
			email: email,
			userType: userType,
			_token: token
		}).always(function (data) {
			if (data.resposeText == "1") {
				alert("Convite Enviado!");
				window.location.href = "/";
			} else {
				alert("ERRO!");
				console.log(data.resposeText);
			}
		});
	};

	$("#invitationSend").click(sendMessage);
	$("#userType").change(createMessage);
	$("#userEmail").change(createMessage);

});