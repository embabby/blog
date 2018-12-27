<script>
  $(document).on('click', '.delete',function(e){
  e.preventDefault();
  var url = ($(this).attr('href'));
    swal({
      title: "Are you sure you want to delete?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#F5D313",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
         function(){
          window.location=url;
    });
  });
</script>