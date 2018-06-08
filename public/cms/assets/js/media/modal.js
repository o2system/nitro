$(document).on('click', '[data-action="media-modal"]', function(){
    var popupTemplate =
      '<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="MediaModal" aria-hidden="true">' +
      '  <div class="modal-dialog modal-dialog-centered modal-lg modal-media" role="document">' +
      '    <div class="modal-content">' +
      '      <div class="modal-body" />' +
      '      <div class="modal-footer">' +
      '        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>' +
      '        <button type="button" class="btn btn-primary">Insert</button>' +
      '      </div>' +
      '    </div>' +
      '  </div>' +
      '</div>';

    $(popupTemplate).modal('show').find('.modal-body').load($.system.url.base('media/modal'));
});