<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Teste 1 Bravi</title>
</head>
<style>


</style>
<body>
    <div class="container">
        <div class="box">
            <h3>Teste de fechamento de chaves.</h3>
            <br>
            <textarea rows="6" cols="15" id="caixa_texto" placeholder="Digite seu texto com () [] ou {} ..."></textarea>
        </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    $( document ).ready(function() {
        $("#caixa_texto").on('keypress keyup keydown', function(){
            $(this).css('color', 'black');

            if(!isValidateKeysText($(this).val())){
                $(this).css('color', 'red');
            }
        });        
    });
    
    function isValidateKeysText(text){
        // console.log(text)
        var arrayCaracteresText = [];
        // valor inicial e valor correspondente
        var arrayChaves = {'{': '}', '[': ']', '(': ')'};
        var arrayChavesFechamento =  { "}": '}', "]": "]", ")": ")"};
        // varre a string letra por letra
        for(let i = 0; i < text.length; i++){
            // console.log(text[i]);
            var caractereText = text[i];
            // verifica se o caractere do index existe no array de chaves
            if(arrayChaves[caractereText]){
                // se existir, então inseri no array de caracteres o caractere encontrado
                arrayCaracteresText.push(caractereText)
            } // só acessa se o caractere for uma chave de fechamento
            else if(arrayChavesFechamento[caractereText]){
                // com o pop ele recupera o ultimo index adicionado que é uma chave aberta
                var ultimaChaveAberta = arrayCaracteresText.pop();
                // se a chave fechada não for igual a chave aberta ele retorna false
                if(caractereText  != arrayChaves[ultimaChaveAberta]){
                    return false;    
                }
            }
        }
        // se tudo ocorrer bem, ele retorna true
        return true;
    }

</script>