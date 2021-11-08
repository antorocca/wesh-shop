/*user*/
$(document).ready(function(){
    $('#searchU').keyup(function(){
        $('#result-searchU').html("");

        let utilisateur = $(this).val();

        if(utilisateur != ""){
            $.ajax({
                type: 'GET',
                url: 'function/search.php',
                data: 'user=' + encodeURIComponent(utilisateur),
                success: function(data){
                    if(data != ""){
                        $('#result-searchU').append(data);
                    }else{
                        document.getElementById('result-searchU').innerHTML = '<div class="userResult">Aucun utilisateurs</div>'
                    }
                }
            })
            console.log(utilisateur);
        }
    });
});

/*article*/
const cri = document.getElementById('typeSearch');
const search = document.getElementById('searchA');

function handleChange() {
    if(search.value != "") {
                $.ajax({
                    type: 'GET',
                    url: 'function/search.php',
                    data: 'article=' + encodeURIComponent(search.value) + '&type=' + encodeURIComponent(cri.value),
                    success: function(data) {
                        if(data != ""){
                            $('#result-searchA').html(data);
                        } else {
                            $('#result-searchA').html('<div class="userResult">Aucun utilisateurs</div>');
                        }
                    },
                    error: function(err) {
                        console.error(err);
                    }
                })
    } else {
        $('#result-searchU').html('')
    }
}
cri.addEventListener('change', handleChange);
search.addEventListener('keyup', handleChange);