//On lance les fonctions qui récupere les résultats et le chat au chargement de la page
getChat();
getResult();

//On relance ces fonctions chaque 3 seconde
const chatRefresh = window.setInterval(getChat, 3000);
const resultRefresh = window.setInterval(getResult, 3000);

//Lance la fonction lors du click sur le bouton
$("#submit").click(function (e) {
    e.preventDefault();
    console.log('yes')
    //récupere les données néecessaire a la bdd
    let sondage = $('#sondage').text();
    let message = $('#chat').val();
    let user = $('#user').text();
    //Lance un fonction ajax qui envoie les message dans la bdd puis rafraichis le chat
    $.ajax({
        url: "../Public/ajaxRequest.php?task=write&user_id=" + user + "&sondage_id=" + sondage + "&text=" + message,
        dataType: "json",
        method: "POST",
        success: function (response) {
            getChat();
            $('#chat').val("");
        }
    })
})


function getChat() {
    //récupere les données néecessaire a la bdd
    let sondage = $('#sondage').text();
    //Lance un fonction ajax qui récupere les messages dans la bdd puis les affiches a l'endroit indiquée
    $.ajax({
        url: "../Public/ajaxRequest.php?task=get&sondage_id=" + sondage,
        dataType: "json",
        method: "POST",
        success: function (response) {
            $('#zoneMessage').html("");
            $('#zoneMessage').append("<div class='message'><p>Discutez avec vos amis a propos de ce sondage !</p></div>");
            response.forEach(chat => {
                $('#zoneMessage').append("<div class='message'><p><b>" + chat.user_pseudo + " : </b>" + chat.message_content + "</p></div>");
            });
        }
    })
}

function getResult() {
    //récupere les données néecessaire a la bdd
    let sondage = $('#sondage').text();
    //Lance un fonction ajax qui récupere les résultats dans la bdd puis les affiches a l'endroit indiquée
    $.ajax({
        url: "../Public/ajaxRequest.php?task=result&sondage_id=" + sondage,
        dataType: "json",
        method: "POST",
        success: function (response) {
            $('#zoneReponse').html("");
            $('#zoneReponse').append("<ul>");
            response.forEach(result => {
                $('#zoneReponse').append("<li>" + result.sondageReponse_reponse + " : " + result.sondageReponse_score + " Votes");
                
            });
            $('#zoneReponse').append("</ul>");
        }
    })
}