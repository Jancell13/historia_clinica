<<<<<<< HEAD
<script>
    const formu = document.querySelector("form")

    let tel = document.getElementById("telefono");

    tel.addEventListener("input", function() {
        tel.value = tel.value.replace(/\D/g, "");
    });

    formu.addEventListener('submit', function(e) {
        const doc = document.getElementById("documento").value;
        const nom = document.getElementById("nombre").value;
        const ape = document.getElementById("apellido").value;
        e.preventDefault();
        if (doc == "" || nom == "" || ape == "") {
            alert("por favor, dijete el documento, nombre y apellido del paciente")
        } else {
            formu.submit();
        }

        console.log(doc + " " + nom + " " + ape)
    })
=======
<script>
    const formu = document.querySelector("form")

    let tel = document.getElementById("telefono");

    tel.addEventListener("input", function() {
        tel.value = tel.value.replace(/\D/g, "");
    });

    formu.addEventListener('submit', function(e) {
        const doc = document.getElementById("documento").value;
        const nom = document.getElementById("nombre").value;
        const ape = document.getElementById("apellido").value;
        e.preventDefault();
        if (doc == "" || nom == "" || ape == "") {
            alert("por favor, dijete el documento, nombre y apellido del paciente")
        } else {
            formu.submit();
        }

        console.log(doc + " " + nom + " " + ape)
    })
>>>>>>> 27205a8 (crear historia)
</script>