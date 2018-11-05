<?php
function modal($id, $header, $body, $footer)
{
	return '
	<div id="'.$id.'" class="modal">
      <div class="modal-content">
        <div class="modal-header">
			<span class="modal-close" id="modal-close-'.$id.'">
				&times;
			</span>
			<h2>
				'.$header.'
			</h2>
        </div>
        <div class="modal-body">
			'.$body.'
        </div>
        <div class="modal-footer">
        	'.$footer.'
        </div>
      </div>
    </div>';
}

?>