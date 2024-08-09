      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; INFINITY COLOMBIA OFICIAL 2024</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

 

  
    <!-- datatables JS -->
    <script type="text/javascript" src="vendor/datatables/datatables.min.js"></script>    
    <!-- código propio JS
    <script type="text/javascript" src="main.js"></script>   --> 
    
    
    
    
    
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
      <!-- Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
      <!-- Custom scripts for all pages -->
      <script src="js/sb-admin-2.min.js"></script>
    
      <!-- datatables JS básico -->
      <script type="text/javascript" src="vendor/datatables/datatables.min.js"></script>
      <!-- datatables JS bootstrap 4 -->
      <script type="text/javascript" src="vendor/datatables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
    
      <!-- Custom JavaScript for Sidebar -->
      <script>
        document.getElementById('sidebarToggleTop').addEventListener('click', function() {
            var sidebar = document.getElementById('accordionSidebar');
            if (sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                sidebar.style.transform = 'translateX(-100%)'; // Asegura que el sidebar se oculte fuera de la pantalla
            } else {
                sidebar.classList.add('show');
                sidebar.style.transform = 'translateX(0)'; // Muestra el sidebar al trasladarlo a su posición original
            }
        });
      </script>
      
      
      
      
      
      
        <script>
            $(document).ready(function() {
                // Maneja el clic en los enlaces que deben mostrar el menú colapsable
                $('[data-toggle="collapse"]').on('click', function(e) {
                    e.preventDefault(); // Evita el comportamiento predeterminado del enlace
                    var target = $(this).data('target');
                    
                    // Alterna la clase 'active' en el contenedor principal
                    $(this).closest('.nav-item').toggleClass('active');
                    
                    // Alterna el estado de visibilidad del menú colapsable
                    $(target).toggleClass('show');
                });
            });
        </script>
    

</body>

</html>