function confirmarDelete(id) {
    // alert(id);
    Swal.fire({
        title: '¿Eliminar Producto?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar'
      }).then((result) => {
        if (result.isConfirmed) {
            //   Swal.fire(
            //     'Deleted!',
            //     'Your file has been deleted.',
            //     'success'
            //   )
          location.href="./borrar.php?id="+id;
        //   location.href="./index.php";
        }
      })
}