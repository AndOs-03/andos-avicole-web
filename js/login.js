// Festion du niveau de sécurité
function Cheks_avant_login(event) {
	var lancer = "oui";

	if (document.getElementById("userName").value == "") {
		lancer = "non";
	}else if (document.getElementById("password").value == "") {
		lancer = "non";
	}

	if (lancer == "non") {
		event.preventDefault(); return false;
	};
}


// Fonction permettant de verifier et surligner les controls : il faut juste ajouter le nom du formulaire
$(function () {
	$('#Form_Login').validate({
		rules: {
			userName: {
				required: true,
				maxlength: 30,
			},
			password: {
				required: true,
				minlength: 4,
				maxlength: 255,
			},
		},
		messages: {
			userName: {
				required: "Veuillez saisir votre nom d'utilisateur",
				maxlength: "Veuillez  saisir un nom d'utilisateur valide"
			},
			password: {
				required: "Veuillez saisir votre mot de passe",
				minlength: "Votre mot de passe doit être d'au moins 4 caractères",
				maxlength: "Veuillez  saisir un mot de passe valide"
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
			$(element).addClass('is-valid');
		}
	});
});
