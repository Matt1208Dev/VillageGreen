// Script de validation du formulaire d'inscription client

// Déclaration des variables

const mail = document.getElementById("cus_mail"); // Mail client
const pass = document.getElementById("password"); // Mot de passe client
const passConfirm = document.getElementById("passwordConfirm"); // Confirmation mot de passe client
const firstname = document.getElementById("cus_firstname"); // Prénom client
const lastname = document.getElementById("cus_lastname"); // Nom du client
const sex = document.getElementById("cus_sex"); // Sexe du client
const address = document.getElementById("cus_bil_address"); // Adresse du client
const postalcode = document.getElementById("cus_bil_postalcode"); // Code postal
const city = document.getElementById("cus_bil_city"); // Ville
const type = document.getElementById("cus_type"); // Typologie du client
const phone = document.getElementById("cus_phone"); // Numéro de mobile

const mailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/;
const passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
const firstnameRegex = /^[a-zA-Z\-èàùìòéãõäëïüöâêîôû]{1,30}$/;
const lastnameRegex = /^[a-zA-Z\-èàùìòéãõäëïüöâêîôû]{1,50}$/;
const addressRegex = /^[a-zA-Z0-9\-\' ,èàùìòéãõäëïüöâêîôû]{1,255}$/;
const postalcodeRegex = /^[0-9]{5}$/;
const cityRegex = /^[a-zA-Z\-\' ,èàùìòéãõäëïüöâêîôû]{1,50}$/;
const phoneRegex = /^0[67]{1}[0-9]{8}$/;

let error ;
let mailError = "*Vous n'avez pas saisi d'email";
let passError = "*Vous n'avez pas saisi de mot de passe";
let passConfirmError = "*Vous n'avez pas saisi de mot de passe";
let firstnameError = "*Vous n'avez pas saisi votre prénom";
let lastnameError = "*Vous n'avez pas saisi votre nom";
let sexError = "*Vous n'avez pas coché de réponse";
let addressError = "*Vous n'avez pas saisi d'adresse";
let postalcodeError = "*Vous n'avez pas saisi de code postal";
let cityError = "*Vous n'avez pas saisi la ville";
let typeError = "*Vous n'avez pas coché de réponse";
let phoneError = "*Vous n'avez pas saisi de numéro de téléphone";


//  Fonction checkForm() de vérification du formulaire
document.getElementById("form").addEventListener("submit", function checkForm(e) 
{
    error = 0;
    // Champ cus_mail
    // Si aucune saisie dans le champ
    if (mail.value == "")
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("mail-error").innerHTML = mailError;
    }
    else if (!mail.value.match(mailRegex))
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On adapte le message d'erreur
        mailError = "Merci de n'utiliser que des majuscules, minuscules et/ou les caractères suivants : .!#$%&’*+_`-";

        // On affiche le message d'erreur
        document.getElementById("mail-error").innerHTML = mailError;
    }
    else
    {

        // Sinon on laisse vide le message d'erreur
        document.getElementById("mail-error").innerHTML = "";
    }
    
    // Champ cus_pass
    // Si aucune saisie dans le champ
    if (pass.value == "")
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("pass-error").innerHTML = passError;
    }
    else if (!pass.value.match(passRegex))
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On adapte le message d'erreur
        passError = "Le mot de passe doit contenir au moins 8 caractères, 1 majuscule, 1 minuscule et un caractères spécial.";

        // On affiche le message d'erreur
        document.getElementById("pass-error").innerHTML = passError;
    }
    else
    {

        // Sinon on laisse vide le message d'erreur
        document.getElementById("pass-error").innerHTML = "";
    }

    // Champ cus_pass_confirm
    // Si aucune saisie dans le champ
    if (passConfirm.value == "")
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("pass-confirm-error").innerHTML = passConfirmError;
    }
    else if (pass.value != passConfirm.value)
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On adapte le message d'erreur
        passConfirmError = "Les mots de passe ne correspondent pas.";

        // On affiche le message d'erreur
        document.getElementById("pass-confirm-error").innerHTML = passConfirmError;
    }
    else
    {

        // Sinon on laisse vide le message d'erreur
        document.getElementById("pass-confirm-error").innerHTML = "";
    }

    // Champ cus_firstname
    // Si aucune saisie dans le champ
    if (firstname.value == "")
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("firstname-error").innerHTML = firstnameError;
    }
    else if (!firstname.value.match(firstnameRegex))
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On adapte le message d'erreur
        firstnameError = "Merci de n'utiliser que des majuscules, minuscules et/ou les caractères suivants : .!#$%&’*+_`-"

        // On affiche le message d'erreur
        document.getElementById("firstname-error").innerHTML = firstnameError;
    }
    else
    {

        // Sinon on laisse vide le message d'erreur
        document.getElementById("firstname-error").innerHTML = "";
    }

    // Champ cus_lastname
    // Si aucune saisie dans le champ
    if (lastname.value == "")
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("lastname-error").innerHTML = lastnameError;
    }
    else if (!lastname.value.match(lastnameRegex))
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On adapte le message d'erreur
        lastnameError = "Merci de n'utiliser que des majuscules, minuscules et/ou les caractères suivants : .!#$%&’*+_`-"

        // On affiche le message d'erreur
        document.getElementById("lastname-error").innerHTML = lastnameError;
    }
    else
    {

        // Sinon on laisse vide le message d'erreur
        document.getElementById("lastname-error").innerHTML = "";
    }

    // Champ cus_sex
    // Si aucune saisie dans le champ
    if ((form.woman.checked == false) && (form.man.checked == false))
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("sex-error").innerHTML = sexError;
    }
    else
    {

        // Sinon on laisse vide le message d'erreur
        document.getElementById("sex-error").innerHTML = "";
    }

    // Champ cus_address
    // Si aucune saisie dans le champ
    if (address.value == "")
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("address-error").innerHTML = addressError;
    }
    else if (!address.value.match(addressRegex))
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On adapte le message d'erreur
        addressError = "Attention, seuls les caractères spéciaux suivants sont acceptés : -\',èàùìòéãõäëïüöâêîôû. Limité à 255 caractères";

        // On affiche le message d'erreur
        document.getElementById("address-error").innerHTML = addressError;
    }
    else
    {

        // Sinon on laisse vide le message d'erreur
        document.getElementById("address-error").innerHTML = "";
    }

    // Champ cus_postalcode
    // Si aucune saisie dans le champ
    if (postalcode.value == "")
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("postalcode-error").innerHTML = postalcodeError;
    }
    else if (!postalcode.value.match(postalcodeRegex))
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On adapte le message d'erreur
        postalcodeError = "Le code postal doit comprendre 5 chiffres.";

        // On affiche le message d'erreur
        document.getElementById("postalcode-error").innerHTML = postalcodeError;
    }
    else
    {

        // Sinon on laisse vide le message d'erreur
        document.getElementById("postalcode-error").innerHTML = "";
    }

    // Champ cus_city
    // Si aucune saisie dans le champ
    if (city.value == "")
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("city-error").innerHTML = cityError;
    }
    else if (!city.value.match(cityRegex))
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On adapte le message d'erreur
        cityError = "Attention, seuls les caractères spéciaux suivants sont acceptés : -\',èàùìòéãõäëïüöâêîôû. Limité à 50 caractères";

        // On affiche le message d'erreur
        document.getElementById("city-error").innerHTML = cityError;
    }
    else
    {

        // Sinon on laisse vide le message d'erreur
        document.getElementById("city-error").innerHTML = "";
    }

    // Champ cus_type
    // Si aucune saisie dans le champ
    if ((form.part.checked == false) && (form.pro.checked == false))
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("type-error").innerHTML = typeError;
    }
    else
    {

        // Sinon on laisse vide le message d'erreur
        document.getElementById("type-error").innerHTML = "";
    }

    // Champ cus_phone
    // Si aucune saisie dans le champ
    if (phone.value == "")
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On affiche le message d'erreur
        document.getElementById("phone-error").innerHTML = phoneError;
    }
    else if (!phone.value.match(phoneRegex))
    {
        // On incrémente la valeur de la variable error
        error += 1;

        // On adapte le message d'erreur
        phoneError = "Le numéro de téléphone mobile doit être composé de 10 chiffres, commencer par 06 ou 07 et écris au format 06XXXXXXXX.";

        // On affiche le message d'erreur
        document.getElementById("phone-error").innerHTML = phoneError;
    }
    else
    {
        // On affiche le message d'erreur
        document.getElementById("phone-error").innerHTML = "";
    }
    

    // si la variable error contient une valeur > 0
    if (error > 0)
    {
        // On bloque l'envoi du formulaire au serveur
        e.preventDefault();
        
        return false;
    }
    else
    {
        return true;
    }

}
);