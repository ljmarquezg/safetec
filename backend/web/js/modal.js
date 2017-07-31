$(function(){
	$('.modalButton').click(function(){
		var id = $(this).attr('id');

		$('#modal'+id).modal('show')
		.find('#modalContent'+id)
		.load($(this).attr('value'));
		$('.modal-dialog').draggable({
			handle: ".modal-header"
		});
		$('#modal'+id+ ' .modal-header .close').removeAttr('data-dismiss');
		$('#modal'+id+ ' .close').click(function () {
			var modalTitle = $('#modal'+id+' .modal-header h3').html();
			$('#modalWarningShow').append('<div id="Warning'+id+'" class="modal fade" role="dialog" data-backdrop="false"><div class="modal-dialog"><div class="modal-content "><div class="modal-header alert alert-warning"><button type="button" class="close closefirstmodal">&times;</button><!--div class="alert alert-warning alert-dismissible"--><h4><i class="icon fa fa-warning"></i> Alert!</h4><!--/div--></div><div class="modal-body"><p id="modalTitle">Close <b> '+ modalTitle + 'Form </b> without saving?</p></div><div class="modal-footer"><button type="button" class="btn btn-default confirmclosed">Yes</button><button type="button" class="btn btn-primary" data-dismiss="modal">No</button></div></div></div></div>').one()
			$('#Warning'+id+ ' button.confirmclosed').attr('id','confirmclosed'+id)
			$('#Warning'+id).modal('show');
			$('#confirmclosed'+id).click(function () {
				$('#Warning'+id).modal('hide');
				$('#modal'+id).modal('hide');
				$('#Warning'+id).remove();
				$('.modal-backdrop.fade.in').remove();
			});
		});
	})
})


