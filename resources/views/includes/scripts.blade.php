<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{url('js/scripts.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{url('assets/demo/chart-area-demo.js')}}"></script>
<script src="{{url('assets/demo/chart-bar-demo.js')}}"></script>
<script src="{{url('assets/demo/chart-pie-demo.js')}}"></script> -->
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
    var input = element;
    var originalText = input.value;

    // Hapus atribut readonly
    input.removeAttribute('readonly');

    input.onblur = function () {
        var newValue = this.value;

        // Setel kembali atribut readonly setelah blur (selesai mengedit)
        this.setAttribute('readonly', 'readonly');

        // Di sini Anda dapat melakukan apa yang diperlukan dengan newValue (misalnya, menyimpan ke server)
    }
    
    input.focus();
}

function editInPlaceNRP(element) {
    var input = element;
    var originalText = input.value;

    // Hapus atribut readonly
    input.removeAttribute('readonly');

    input.onblur = function () {
        var newValue = this.value;

        // Setel kembali atribut readonly setelah blur (selesai mengedit)
        this.setAttribute('readonly', 'readonly');

        // Di sini Anda dapat melakukan apa yang diperlukan dengan newValue (misalnya, menyimpan ke server)
    }
    
    input.focus();
}
</script>

<script>
    const buttons = document.querySelectorAll("[data-carousel-button]")

    buttons.forEach(button => {
    button.addEventListener("click", () => {
        const offset = button.dataset.carouselButton === "next" ? 1 : -1
        const slides = button
        .closest("[data-carousel]")
        .querySelector("[data-slides]")

        const activeSlide = slides.querySelector("[data-active]")
        let newIndex = [...slides.children].indexOf(activeSlide) + offset
        if (newIndex < 0) newIndex = slides.children.length - 1
        if (newIndex >= slides.children.length) newIndex = 0

        slides.children[newIndex].dataset.active = true
        delete activeSlide.dataset.active
    })
    })

</script>
