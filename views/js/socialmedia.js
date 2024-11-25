$(document).ready(function () {
  // Inicializar DataTable
  let tabla = $('#tabla_sociales').DataTable({
      "ajax": {
          url: "../controller/social_media.php?opc=listar",
          type: "GET",
          dataSrc: "aaData"
      },
      "columns": [
          { "data": 0 }, // ID
          { "data": 1 }, // Icono
          { "data": 2 }, // URL
          { "data": 3 }, // Estado
          { "data": 4 }  // Acciones (Botones)
      ],
      "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      }
  });

  // Mostrar formulario en modal para guardar/editar
  $(document).on("click", "#btnNuevo", function () {
      $("#modalSocialMedia").modal("show");
      $("#formSocialMedia")[0].reset();
      $("#socmed_id").val("");
  });

  // Guardar o editar datos
  $(document).on("submit", "#formSocialMedia", function (e) {
      e.preventDefault();
      let formData = $(this).serialize();

      $.ajax({
          url: "../controller/social_media.php?opc=guardaryeditar",
          type: "POST",
          data: formData,
          success: function (response) {
              tabla.ajax.reload();
              $("#modalSocialMedia").modal("hide");
          }
      });
  });

  // Editar red social
  $(document).on("click", ".btnEditar", function () {
      let socmed_id = $(this).attr("data-id");

      $.post("../controller/social_media.php?opc=mostrar", { socmed_id: socmed_id }, function (data) {
          let redSocial = JSON.parse(data);
          $("#socmed_id").val(redSocial.socmed_id);
          $("#socmed_icono").val(redSocial.socmed_icono);
          $("#socmed_url").val(redSocial.socmed_url);
          $("#est").val(redSocial.est);
          $("#modalSocialMedia").modal("show");
      });
  });

  // Eliminar red social
  $(document).on("click", ".btnEliminar", function () {
      let socmed_id = $(this).attr("data-id");
      if (confirm("¿Estás seguro de eliminar esta red social?")) {
          $.post("../controller/social_media.php?opc=eliminar", { socmed_id: socmed_id }, function () {
              tabla.ajax.reload();
          });
      }
  });
});
