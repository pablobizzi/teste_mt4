<h1 class="page-header">Criptografia</h1>

<form id="linguagem">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Texto em Linguagem Natural</label>
                <textarea name="texto" id="natural" class="form-control" rows="5"></textarea>
            </div>
            <button type="button" onclick="criptografar()" class="btn btn-info">Criptografar</button>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Cifra de César</label>
                <textarea name="cesar" id="cesar" class="form-control" rows="5"></textarea>
            </div>
            <button type="button" onclick="descriptografar(1)" class="btn btn-warning">Descriptografar</button>
        </div>
        <div class="col-md-6 m-t-20">
            <div class="form-group">
                <label>AES256 com SALT</label>
                <textarea name="aes" id="aes" class="form-control" rows="5"></textarea>
            </div>
            <button type="button" onclick="descriptografar(2)" class="btn btn-warning">Descriptografar</button>
        </div>
        <div class="col-md-6 m-t-20">
            <div class="form-group">
                <label>BASE64</label>
                <textarea name="base64" id="base64" class="form-control" rows="5"></textarea>
            </div>
            <button type="button" onclick="descriptografar(3)" class="btn btn-warning">Descriptografar</button>
        </div>
    </div>

    <hr />
    <div class="text-right">
        <button type="reset" class="btn btn-success">Limpar</button>
    </div>
    <input type="hidden" name="tipo" value="" id="tipo" />
</form>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function criptografar() {
        var url = window.location.href + "&a=criptografar";
        var formulario = "#linguagem";
        $.ajax({
            type: "POST",
            url: url,
            data: $(formulario).serialize(),
            async: false,
            cache: false,
            error: function (jqXHR, textStatus, errorMessage) {
                swal({
                    icon: "error",
                    title: "Oops...",
                    text: "Há um erro no seu texto"
                });
                document.getElementById("cesar").value = "";
                document.getElementById("aes").value = "";
                document.getElementById("base64").value = "";
                document.getElementById("natural").value = "";
            },
            success: function (data) {
                if (data.success) {
                    document.getElementById("cesar").value = data.cesar;
                    document.getElementById("aes").value = data.aes;
                    document.getElementById("base64").value = data.base64;
                    document.getElementById("natural").value = data.natural;
                } else {
                    swal({
                        icon: "error",
                        title: "Oops...",
                        text: data.message
                    });
                }
            }
        });

    }

    function descriptografar(tipo) {
        var url = window.location.href + "&a=descriptografar";
        $('#tipo').val(tipo);
        var formulario = "#linguagem";
        $.ajax({
            type: "POST",
            url: url,
            data: $(formulario).serialize(),
            async: false,
            cache: false,
            error: function (jqXHR, textStatus, errorMessage) {
                swal({
                    icon: "error",
                    title: "Oops...",
                    text: "Há um erro no seu texto"
                });
                document.getElementById("cesar").value = "";
                document.getElementById("aes").value = "";
                document.getElementById("base64").value = "";
                document.getElementById("natural").value = "";
            },
            success: function (data) {
                if (data.success) {
                    document.getElementById("cesar").value = data.cesar;
                    document.getElementById("aes").value = data.aes;
                    document.getElementById("base64").value = data.base64;
                    document.getElementById("natural").value = data.natural;
                } else {
                    swal({
                        icon: "error",
                        title: "Oops...",
                        text: data.message
                    });
                }
            }
        });

    }
</script>