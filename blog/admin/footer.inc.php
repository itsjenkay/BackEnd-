	<div class="footer">
		<p>MyBlog Inc. &copy; <?php echo date('Y'); ?> All right Reserved</p>
	</div>
</div>
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript" src="nicEditor/nicEdit.js"></script>

<script type="text/javascript">
(function() {
	$(document).ready(function() {
		function upload(current) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#profileImg').attr('src',e.target.result);
			};
			reader.readAsDataURL(current.files[0]);
		}
	});

	//textEditor
	bkLib.onDomLoaded(function() {
	    new nicEditor({fullPanel : true}).panelInstance('post_body');
	});
})();
</script>
</body>
</html>