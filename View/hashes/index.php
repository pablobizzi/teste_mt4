<h1 class="page-header">Hashes</h1>

<form id="linguagem">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Texto em Linguagem Natural</label>
                <textarea name="texto" id="natural" class="form-control" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Hash para Comparar</label>
                <textarea name="hash" id="cesar" class="form-control" rows="5"></textarea>
            </div>
        </div>
    </div>

    <hr />
    <div class="text-right">
        <button type="button" onclick="getTable()" class="btn btn-success">Gerar Comparação</button>
    </div>
    <hr>
    <div class="col-md-12">
        <table id="hashes" class="table table-striped table-responsive">
            <tr>
                <th>Criptografia</th>
                <th>Hash Gerado</th>
                <th>Hash do Usuário</th>
            </tr>
        </table>
    </div>

</form>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function getTable() {
        var url = window.location.href + "&a=process";
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
                document.getElementById("texto").value = "";
                document.getElementById("hash").value = "";
            },
            success: function (data) {
                if (data.success) {

                    $("tr:has(td)").remove();

                    $.each(data.table, function (index, article) {
                        $("#hashes").append($('<tr/>')
                            .append($("<td/>").append(article.method))
                            .append($("<td/>").append(article.hash))
                            .append($("<td/>").append(article.user))
                        );
                    });

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