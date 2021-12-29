function Cheks_avant_logon(event) {
	var lancer = "oui";

	if (document.getElementById("userName").value === "") {
		alert("Veuillez saisir votre nom d'utilisateur");
		lancer = "non";
	}
	else if (document.getElementById("password").value === "") {
		alert("Veuillez saisir votre mot de passe");
		lancer = "non";
	}


	if (lancer === "oui") {
		header('Location: pages/tableau_bord.php');
		//document.getElementById("Form_Login").submit()
	}
	else {
		window.location.href = "pages/tableau_bord.php"
	}

}



// Fonction permettant de verifier et surligner les controls : il faut juste ajouter le nom du formulaire
$(function () {
	$('#Form_Logon').validate({
		rules: {
			name: {
				required: true,
				maxlength: 255,
			},
			email: {
				required: true,
				email: true,
				maxlength: 100,
			},
			tel: {
				required: true,
				tel: true,
				maxlength: 20,
			},
			userName: {
				required: true,
				maxlength: 30,
			},
			password: {
				required: true,
				minlength: 4,
				maxlength: 255,
			},
			conf_password: {
				required: true,
				minlength: 4,
				maxlength: 255,
			},
			terms: {
				required: true
			},
		},
		messages: {
			name: {
				required: "Veuillez saisir votre nom et prénoms",
				maxlength: "Veuillez saisir un nom et prénoms valide",
			},
			email: {
				required: true,
				email: "Veuillez saisir une adresse mail valide",
				maxlength: "Veuillez saisir une adresse mail valide",
			},
			tel: {
				required: true,
				tel: "Veuillez saisir un numéro de téléphone valide",
				maxlength: "Veuillez saisir un numéro de téléphone valide",
			},
			userName: {
				required: "Veuillez saisir votre nom d'utilisateur",
				maxlength: "Veuillez saisir un nom d'utilisateur valide"
			},
			password: {
				required: "Veuillez saisir votre mot de passe",
				minlength: "Votre mot de passe doit être d'au moins 4 caractères",
				maxlength: "Veuillez saisir un mot de passe valide"
			},
			conf_password: {
				required: "Veuillez saisir votre mot de passe",
				minlength: "Votre mot de passe doit être d'au moins 4 caractères",
				maxlength: "Veuillez saisir un mot de passe valide"
			},
			terms: {
				required: "Veuillez accepter les conditions d'utilisations"
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



// FONCTION SUPPLEMENTAIRES
$(function () {
	//Initialize Select2 Elements
	$('.select2').select2();

	//Initialize Select2 Elements
	$('.select2bs4').select2({
		theme: 'bootstrap4'
	})
});

// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function () {
	window.stepper = new Stepper(document.querySelector('.bs-stepper'))
});

// DropzoneJS Demo Code Start
Dropzone.autoDiscover = false;

// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);

var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
	url: "/target-url", // Set the url
	thumbnailWidth: 80,
	thumbnailHeight: 80,
	parallelUploads: 20,
	previewTemplate: previewTemplate,
	autoQueue: false, // Make sure the files aren't queued until manually added
	previewsContainer: "#previews", // Define the container to display the previews
	clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
});

myDropzone.on("addedfile", function (file) {
	// Hookup the start button
	file.previewElement.querySelector(".start").onclick = function () {
		myDropzone.enqueueFile(file)
	}
});

// Update the total progress bar
myDropzone.on("totaluploadprogress", function (progress) {
	document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
});

myDropzone.on("sending", function (file) {
	// Show the total progress bar when upload starts
	document.querySelector("#total-progress").style.opacity = "1"
	// And disable the start button
	file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
});

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function (progress) {
	document.querySelector("#total-progress").style.opacity = "0"
});

// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function () {
	myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
};
document.querySelector("#actions .cancel").onclick = function () {
	myDropzone.removeAllFiles(true)
};
// DropzoneJS Demo Code End


