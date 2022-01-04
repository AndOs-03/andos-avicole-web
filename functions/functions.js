/**
 * Vérifie qu'une chaine correspond à une adresse email.
 *
 * @param email
 * @returns {boolean}
 */
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

/**
 * Vérifie que la chaine correspond à un numéro de téléphone.
 *
 * @param phone
 * @returns {boolean}
 */
function validatePhone(phone) {
  var regex = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  return regex.test(phone);
}

/**
 * Vérifie que le mot de passe contient :
 * <ul>
 *   <li>at least one digit</li>
 *   <li>at least one lower case</li>
 *   <li>at least one upper case</li>
 *   <li>at least 6 from the mentioned characters</li>
 * </ul>
 *
 * @param password
 * @returns {boolean}
 */
function validatePassword(password) {
  var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/;
  return regex.test(password);
}