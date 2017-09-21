 <footer class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

 </body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>-->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-3.1.0.min.js"></script>
 <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script type="text/javascript" src="../assets/js/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
 <script src="../assets/js/sweetalert.min.js" rel="stylesheet"></script>
    <script>
         function editCategory(id){
             $.ajax({
                 url: "includes/modal.php",
                 type: "POST",
                 data: "edit="+id,
                 success: function(msg){
                     $("#modal").html(msg);
                     $("#myModal").modal('show');
                 }
             });
         }
         function editPost(id){
             $.ajax({
                 url: "includes/modal.php",
                 type: "POST",
                 data: "post="+id,
                 success: function(msg){
                     $("#modal").html(msg);
                     $("#myModal").modal('show');
                 }
             });
         }
         function update() {
             var data = $('form').serialize();
             $.ajax({
                 url: 'auth/update.php',
                 type: 'get',
                 data :data,
                 success: function (output) {
//                     alert(output);
                     swal("Added", "Category has been Updated.", "success");
                     setTimeout(reload, 1000);
                     function reload(){
                         window.location.href=output;
                     }
                 }
             });
         }
         function updatePost() {
             var data = $('form').serialize();
             $.ajax({
                 url: 'auth/update.php',
                 type: 'get',
                 data :data,
                 success: function (output) {
//                     alert(output);
                     swal("Added", "Post has been Updated.", "success");
                     setTimeout(reload, 1000);
                     function reload(){
                         window.location.href=output;
                     }
                 }
             });
         }
         function confirm(id, name) {
             swal({
                     title: "Are you sure?",
                     text: "You will not be able to recover this entry!",
                     type: "warning",
                     showCancelButton: true,
                     allowOutsideClick:true,
                     confirmButtonClass: "btn-danger",
                     confirmButtonText: "Yes, delete it!",
                     closeOnConfirm: false
                 },
                 function(){
                     confirmDelete(id, name);
                 });
         }
        function confirmDelete(id, name) {
             var values = {
                 id: id,
                 name: name
             };
             $.ajax({
                 url: 'delete.php',
                 type: 'POST',
                 data: values,
                 success: function(output){
                     console.log('output: ', output);
                     swal("Deleted!", name+" has been deleted.", "success");
                     setTimeout(function(){
                         document.location.reload();
                     }, 1000);

                    }
             });
         }

     </script>
</html>


