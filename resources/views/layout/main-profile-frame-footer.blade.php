
<footer id="footer">
      <div class="copyright" style="background-color: #111314;">
        <p>Palzbum © 2018. All rights reserved</p>
      </div>
    </footer>
    
    <!--preloader
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>-->

    <!-- Scripts
    ================================================= -->
    <script src="{{asset('profile/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('profile/js/bootstrap.min.js')}}"></script>
    <!-- <script src="{{asset('profile/js/masonry.pkgd.min.js')}}"></script> -->
    <script src="{{asset('profile/js/jquery.sticky-kit.min.js')}}"></script>
    <script src="{{asset('profile/js/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('profile/js/script.js')}}"></script>
    
    <script>
function fileSelect(evt) {
     document.getElementById('filesInfo').innerHTML = "";
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        var files = evt.target.files;
 
        var result = '';
        var file;
        for (var i = 0; file = files[i]; i++) {
            // if the file is not an image, continue
            if (!file.type.match('image.*')) {
                continue;
            }
 
            reader = new FileReader();
            reader.onload = (function (tFile) {
                return function (evt) {
                    var div = document.createElement('span');
                    div.innerHTML = '<img style="width: 90px; margin-right:5px; margin-top:5px;" src="' + evt.target.result + '" />';
                    document.getElementById('filesInfo').appendChild(div);
                };
            }(file));
            reader.readAsDataURL(file);
        }
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }
}
 
document.getElementById('filesToUpload').addEventListener('change', fileSelect, false);
</script>
    
  </body>
</html>