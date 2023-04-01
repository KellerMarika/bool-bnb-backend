import "./bootstrap";
import "~resources/scss/app.scss";
import swal from "sweetalert";
import.meta.glob(["../img/**"]);

/* DELETE FORM CONFIRMATION ************************************************/
const deleteForms_list = document.querySelectorAll(".delete-form");
/* DELETE INDEX BUTTONS */
deleteForms_list.forEach((deleteForm) => {
    deleteForm.addEventListener("submit", function (event) {
        event.preventDefault();

        swal({
            title: `Sei sicuro di voler eliminare questo appartamento?`,
            text: "Se lo cancelli, non ci sarà più modo di recuperarlo!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal("Appartamento eliminato con successo", {
                    icon: "success",
                }).then(() => {
                    deleteForm.submit();
                });
            }
        });
    });
});
