<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{url('js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{url('assets/demo/chart-area-demo.js')}}"></script>
<script src="{{url('assets/demo/chart-bar-demo.js')}}"></script>
<script src="{{url('assets/demo/chart-pie-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{url('js/datatables-simple-demo.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.js"></script>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

               

<script>
    $(document).ready( function () {
    $('#tabel').DataTable();
} );
</script>

<script>
    // Data Picker Initialization
    $('.datepicker').datepicker({
    inline: true
    });
</script>

<script>
function editInPlaceNama(element) {
    var span = element;
    var input = document.createElement("input");
    var originalText = span.textContent || span.innerText;

    input.value = originalText;
    input.className = "form-control"; // Optionally, add Bootstrap input style
    input.name = "name";

    input.onblur = function () {
        var newValue = this.value;
        span.textContent = newValue;
    }

    span.innerHTML = "";
    span.appendChild(input);
    input.focus();
}
function editInPlaceNrp(element) {
    var span = element;
    var input = document.createElement("input");
    var originalText = span.textContent || span.innerText;

    input.value = originalText;
    input.className = "form-control"; // Optionally, add Bootstrap input style
    input.name = "nrp";

    input.onblur = function () {
        var newValue = this.value;
        span.textContent = newValue;
    }

    span.innerHTML = "";
    span.appendChild(input);
    input.focus();
}
</script>