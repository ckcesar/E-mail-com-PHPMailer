<!DOCTYPE html>
<html>
<head>
    <title>Mandar E-mail</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>

<form method="post" id="formulario_contato" >
    <p class="name">
        <label for="name">Nome</label><br/>
        <input type="text" name="nome" id="nome" placeholder="Seu Nome" />
    </p>
    <p class="sobrename">
        <label for="name">SobreNome</label><br/>
        <input type="text" name="sobre" id="sobre" placeholder="Seu SobreNome" />
    </p>

    <p class="submit">
        <input type="button" value="Enviar" onclick="validaForm();" />
    </p>

</form>
<script type="text/javascript">
    function validaForm(){
        $.ajax({
            url:'enviar.php',
            type:'POST',
            data: $('#formulario_contato').serialize(),
            success: function (data) {
                alert(data);
            }
        });
    }
</script>
</body>
</html>